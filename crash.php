<?php
session_start();

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'zewinsbs_chiken');
define('DB_PASS', 'zewinsbs_chiken');
define('DB_NAME', 'zewinsbs_chiken');

// Connect to database
try {
    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($db->connect_error) {
        throw new Exception("Connection failed: " . $db->connect_error);
    }
} catch (Exception $e) {
    die("Database connection error: " . $e->getMessage());
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Get user data
$user_id = $_SESSION['user_id'];
$user_query = $db->prepare("SELECT * FROM users WHERE id = ?");
$user_query->bind_param("i", $user_id);
$user_query->execute();
$user_result = $user_query->get_result();
$currentUser = $user_result->fetch_assoc();

if (!$currentUser) {
    session_destroy();
    header("Location: login.html");
    exit();
}

// Create game tables if not exists
$db->query("CREATE TABLE IF NOT EXISTS crash_games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    bet_amount DECIMAL(15,2) NOT NULL,
    cashout_multiplier DECIMAL(10,2) DEFAULT NULL,
    result_multiplier DECIMAL(10,2) DEFAULT NULL,
    win_amount DECIMAL(15,2) DEFAULT 0,
    seed VARCHAR(64) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)");

$db->query("CREATE TABLE IF NOT EXISTS crash_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    min_bet DECIMAL(15,2) DEFAULT 1000.00,
    max_bet DECIMAL(15,2) DEFAULT 1500000.00,
    house_edge DECIMAL(5,2) DEFAULT 2.00,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)");

// Insert default settings
$db->query("INSERT IGNORE INTO crash_settings (id) VALUES (1)");

// Get settings
$settings = $db->query("SELECT * FROM crash_settings WHERE id = 1")->fetch_assoc();

// Handle game actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'place_bet':
                $betAmount = (float)$_POST['amount'];
                
                // Validate bet amount
                if ($betAmount < $settings['min_bet'] || $betAmount > $settings['max_bet']) {
                    echo json_encode(['error' => 'Invalid bet amount']);
                    exit();
                }
                
                if ($betAmount > $currentUser['balance']) {
                    echo json_encode(['error' => 'Insufficient balance']);
                    exit();
                }
                
                // Generate predictable random seed
                $seed = md5(microtime() . $user_id . $betAmount);
                srand(crc32($seed));
                
                // Generate crash point with 20% win chance
                $rand = rand(1, 100);
                $willCrash = $rand <= 80; // 80% chance to crash (20% win chance)
                
                // If it will crash, generate crash multiplier between 1.00-100.00
                if ($willCrash) {
                    $crashMultiplier = max(1.00, round(1 + (rand(1, 9900) / 100), 2));
                } else {
                    $crashMultiplier = 0; // No crash (player wins)
                }
                
                // Deduct balance
                $db->begin_transaction();
                try {
                    $db->query("UPDATE users SET balance = balance - $betAmount WHERE id = $user_id");
                    
                    // Record game
                    $stmt = $db->prepare("INSERT INTO crash_games (user_id, bet_amount, seed) VALUES (?, ?, ?)");
                    $stmt->bind_param("ids", $user_id, $betAmount, $seed);
                    $stmt->execute();
                    $game_id = $db->insert_id;
                    
                    $db->commit();
                    
                    echo json_encode([
                        'success' => true,
                        'game_id' => $game_id,
                        'seed' => $seed,
                        'will_crash' => $willCrash,
                        'crash_multiplier' => $crashMultiplier,
                        'new_balance' => $currentUser['balance'] - $betAmount
                    ]);
                } catch (Exception $e) {
                    $db->rollback();
                    echo json_encode(['error' => 'Transaction failed']);
                }
                exit();
                
            case 'cash_out':
                $game_id = (int)$_POST['game_id'];
                $multiplier = (float)$_POST['multiplier'];
                
                // Validate
                if ($multiplier < 1.00) {
                    echo json_encode(['error' => 'Invalid multiplier']);
                    exit();
                }
                
                // Get game data
                $game = $db->query("SELECT * FROM crash_games WHERE id = $game_id AND user_id = $user_id")->fetch_assoc();
                if (!$game) {
                    echo json_encode(['error' => 'Game not found']);
                    exit();
                }
                
                if ($game['cashout_multiplier'] !== NULL) {
                    echo json_encode(['error' => 'Already cashed out']);
                    exit();
                }
                
                // Calculate win amount (apply house edge)
                $winAmount = $game['bet_amount'] * $multiplier * (1 - ($settings['house_edge'] / 100));
                
                // Update game and user balance
                $db->begin_transaction();
                try {
                    $db->query("UPDATE crash_games SET cashout_multiplier = $multiplier, win_amount = $winAmount WHERE id = $game_id");
                    $db->query("UPDATE users SET balance = balance + $winAmount WHERE id = $user_id");
                    
                    $db->commit();
                    
                    // Get updated balance
                    $newBalance = $db->query("SELECT balance FROM users WHERE id = $user_id")->fetch_assoc()['balance'];
                    
                    echo json_encode([
                        'success' => true,
                        'win_amount' => $winAmount,
                        'new_balance' => $newBalance
                    ]);
                } catch (Exception $e) {
                    $db->rollback();
                    echo json_encode(['error' => 'Cashout failed']);
                }
                exit();
                
            case 'get_history':
                $limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 10;
                $history = $db->query("
                    SELECT *, 
                    IF(cashout_multiplier IS NOT NULL, cashout_multiplier, result_multiplier) as display_multiplier
                    FROM crash_games 
                    WHERE user_id = $user_id 
                    ORDER BY created_at DESC 
                    LIMIT $limit
                ")->fetch_all(MYSQLI_ASSOC);
                echo json_encode($history);
                exit();
                
            case 'get_stats':
                $stats = $db->query("
                    SELECT 
                        COUNT(*) as total_games,
                        SUM(bet_amount) as total_bet,
                        SUM(win_amount) as total_won,
                        SUM(CASE WHEN win_amount > 0 THEN 1 ELSE 0 END) as wins,
                        MAX(win_amount) as biggest_win,
                        MAX(IF(cashout_multiplier IS NOT NULL, cashout_multiplier, result_multiplier)) as highest_multiplier
                    FROM crash_games 
                    WHERE user_id = $user_id
                ")->fetch_assoc();
                echo json_encode($stats);
                exit();
        }
    }
}

// Get user data for display
$recentHistory = $db->query("
    SELECT *, 
    IF(cashout_multiplier IS NOT NULL, cashout_multiplier, result_multiplier) as display_multiplier
    FROM crash_games 
    WHERE user_id = $user_id 
    ORDER BY created_at DESC 
    LIMIT 5
")->fetch_all(MYSQLI_ASSOC);

$stats = $db->query("
    SELECT 
        COUNT(*) as total_games,
        SUM(bet_amount) as total_bet,
        SUM(win_amount) as total_won,
        SUM(CASE WHEN win_amount > 0 THEN 1 ELSE 0 END) as wins,
        MAX(win_amount) as biggest_win,
        MAX(IF(cashout_multiplier IS NOT NULL, cashout_multiplier, result_multiplier)) as highest_multiplier
    FROM crash_games 
    WHERE user_id = $user_id
")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRASH Game</title>
    <style>
        :root {
            --primary: #ff4757;
            --secondary: #2f3542;
            --accent: #1e90ff;
            --dark: #1e272e;
            --light: #f1f2f6;
            --win: #2ed573;
            --lose: #ff4757;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--dark);
            color: var(--light);
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding: 15px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .header h1 {
            font-size: 28px;
            font-weight: bold;
            color: white;
        }
        
        .user-panel {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .balance {
            font-size: 20px;
            font-weight: bold;
        }
        
        .balance-amount {
            color: var(--accent);
        }
        
        .stats-btn {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .stats-btn:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .game-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .game-display {
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            min-height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .multiplier-display {
            font-size: 72px;
            font-weight: bold;
            margin: 20px 0;
            transition: all 0.1s;
            color: var(--win);
        }
        
        .graph {
            width: 100%;
            height: 150px;
            position: relative;
            margin: 20px 0;
        }
        
        .graph-line {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .graph-path {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            stroke: var(--primary);
            stroke-width: 2;
            fill: none;
        }
        
        .bet-panel {
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 20px;
        }
        
        .bet-controls {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .bet-input {
            flex: 1;
            padding: 12px 15px;
            border-radius: 5px;
            border: none;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 16px;
        }
        
        .bet-btn {
            padding: 12px 25px;
            border-radius: 5px;
            border: none;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            text-transform: uppercase;
            transition: all 0.3s;
        }
        
        .bet-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .bet-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .quick-bets {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }
        
        .quick-bet {
            padding: 8px 15px;
            border-radius: 20px;
            border: none;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .quick-bet:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .auto-panel {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        
        .auto-btn {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            cursor: pointer;
            text-align: center;
        }
        
        .history-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            z-index: 100;
            font-size: 24px;
            transition: all 0.3s;
        }
        
        .history-btn:hover {
            transform: scale(1.1);
        }
        
        .history-panel {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 320px;
            max-height: 400px;
            background-color: rgba(30, 30, 30, 0.95);
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
            overflow-y: auto;
            display: none;
            z-index: 100;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .history-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .history-item {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 8px;
            background-color: rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s;
        }
        
        .history-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .history-item.win {
            border-left: 3px solid var(--win);
        }
        
        .history-item.lose {
            border-left: 3px solid var(--lose);
        }
        
        .history-multiplier {
            font-weight: bold;
            color: var(--win);
        }
        
        .history-lose {
            color: var(--lose);
        }
        
        .stats-panel {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            max-width: 500px;
            max-height: 80vh;
            background-color: rgba(30, 30, 30, 0.98);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            overflow-y: auto;
            display: none;
            z-index: 200;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .stats-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 20px;
        }
        
        .stat-card {
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 15px;
            text-align: center;
        }
        
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            margin: 10px 0;
            color: var(--accent);
        }
        
        .stat-label {
            font-size: 12px;
            opacity: 0.7;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 150;
            display: none;
        }
        
        .cashout-btn {
            background: linear-gradient(135deg, var(--win), #7bed9f);
            color: white;
            font-weight: bold;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 15px;
            transition: all 0.3s;
        }
        
        .cashout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .cashout-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .game-status {
            font-size: 18px;
            margin-bottom: 10px;
            color: var(--accent);
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .pulse {
            animation: pulse 1s infinite;
        }
        
        .auto-input {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .auto-start {
            background: linear-gradient(135deg, var(--accent), #3742fa);
        }
        
        .auto-stop {
            background: linear-gradient(135deg, var(--lose), #ff6b81);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CRASH</h1>
        </div>
        
        <div class="user-panel">
            <div class="balance">Balance: <span class="balance-amount">Rp <?= number_format($currentUser['balance'], 2) ?></span></div>
            <button class="stats-btn" id="statsBtn">Stats</button>
        </div>
        
        <div class="game-container">
            <div class="game-display">
                <div class="game-status" id="gameStatus">Place your bet to start</div>
                <div class="multiplier-display" id="multiplierDisplay">1.00x</div>
                <div class="graph">
                    <div class="graph-line"></div>
                    <svg class="graph-svg" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <path id="graphPath" class="graph-path" d="M 0 100" stroke="var(--primary)" stroke-width="2" fill="none"></path>
                    </svg>
                </div>
                <button class="cashout-btn" id="cashoutBtn" disabled>CASHOUT</button>
            </div>
            
            <div class="bet-panel">
                <div class="bet-controls">
                    <input type="number" id="betAmount" class="bet-input" min="<?= $settings['min_bet'] ?>" max="<?= $settings['max_bet'] ?>" step="1000" placeholder="Enter bet amount">
                    <button id="placeBet" class="bet-btn">PASANG TARUHAN</button>
                </div>
                
                <div class="quick-bets">
                    <button class="quick-bet" data-amount="1000">1K</button>
                    <button class="quick-bet" data-amount="5000">5K</button>
                    <button class="quick-bet" data-amount="10000">10K</button>
                    <button class="quick-bet" data-amount="50000">50K</button>
                    <button class="quick-bet" data-amount="100000">100K</button>
                    <button class="quick-bet" data-amount="500000">500K</button>
                    <button class="quick-bet" data-amount="1000000">1.0M</button>
                    <button class="quick-bet" data-amount="1500000">1.5M</button>
                    <button class="quick-bet" id="halfBet">1/2</button>
                    <button class="quick-bet" id="doubleBet">2x</button>
                    <button class="quick-bet" id="maxBet">MAX</button>
                </div>
                
                <div class="auto-panel">
                    <input type="number" id="autoCashout" class="auto-input" min="1.01" max="1000" step="0.01" placeholder="Auto cashout at">
                    <button class="auto-btn auto-start" id="autoStart">Otomatis</button>
                    <button class="auto-btn auto-stop" id="autoStop" disabled>Stop</button>
                </div>
            </div>
        </div>
    </div>
    
    <button class="history-btn" id="historyBtn">📜</button>
    <div class="history-panel" id="historyPanel">
        <div class="history-header">
            <h3>Game History</h3>
            <button id="clearHistory">Clear</button>
        </div>
        <?php foreach ($recentHistory as $game): ?>
            <div class="history-item <?= $game['win_amount'] > 0 ? 'win' : 'lose' ?>">
                <div>
                    <div>Rp <?= number_format($game['bet_amount'], 0) ?></div>
                    <small><?= date('H:i', strtotime($game['created_at'])) ?></small>
                </div>
                <div>
                    <?php if ($game['display_multiplier']): ?>
                        <span class="history-multiplier"><?= number_format($game['display_multiplier'], 2) ?>x</span>
                        <div>Rp <?= number_format($game['win_amount'], 0) ?></div>
                    <?php else: ?>
                        <span class="history-lose">CRASHED</span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="overlay" id="overlay"></div>
    
    <div class="stats-panel" id="statsPanel">
        <button class="stats-close" id="statsClose">✕</button>
        <h2>Your Statistics</h2>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Games</div>
                <div class="stat-value"><?= $stats['total_games'] ?? 0 ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Bet</div>
                <div class="stat-value">Rp <?= number_format($stats['total_bet'] ?? 0, 0) ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Won</div>
                <div class="stat-value">Rp <?= number_format($stats['total_won'] ?? 0, 0) ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Win Rate</div>
                <div class="stat-value"><?= $stats['total_games'] ? round(($stats['wins'] / $stats['total_games']) * 100, 2) : 0 ?>%</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Biggest Win</div>
                <div class="stat-value">Rp <?= number_format($stats['biggest_win'] ?? 0, 0) ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Highest Multiplier</div>
                <div class="stat-value"><?= number_format($stats['highest_multiplier'] ?? 0, 2) ?>x</div>
            </div>
        </div>
    </div>
    
    <script>
        // Game configuration
        const config = {
            minBet: <?= $settings['min_bet'] ?>,
            maxBet: <?= $settings['max_bet'] ?>,
            winChance: 20, // 20% win chance
            houseEdge: <?= $settings['house_edge'] ?>
        };
        
        // Game state
        let gameState = {
            balance: <?= $currentUser['balance'] ?>,
            currentBet: <?= $settings['min_bet'] ?>,
            gameActive: false,
            currentGameId: null,
            currentMultiplier: 1.00,
            crashMultiplier: null,
            autoCashout: null,
            autoMode: false,
            graphPoints: []
        };
        
        // DOM elements
        const elements = {
            betAmount: document.getElementById('betAmount'),
            placeBet: document.getElementById('placeBet'),
            cashoutBtn: document.getElementById('cashoutBtn'),
            multiplierDisplay: document.getElementById('multiplierDisplay'),
            gameStatus: document.getElementById('gameStatus'),
            graphPath: document.getElementById('graphPath'),
            historyBtn: document.getElementById('historyBtn'),
            historyPanel: document.getElementById('historyPanel'),
            statsBtn: document.getElementById('statsBtn'),
            statsPanel: document.getElementById('statsPanel'),
            overlay: document.getElementById('overlay'),
            statsClose: document.getElementById('statsClose'),
            autoCashout: document.getElementById('autoCashout'),
            autoStart: document.getElementById('autoStart'),
            autoStop: document.getElementById('autoStop')
        };
        
        // Initialize game
        function initGame() {
            // Set initial bet amount
            elements.betAmount.value = config.minBet;
            updateBalanceDisplay();
            
            // Event listeners for quick bets
            document.querySelectorAll('.quick-bet').forEach(btn => {
                if (btn.id === 'halfBet') {
                    btn.addEventListener('click', () => {
                        elements.betAmount.value = Math.max(config.minBet, Math.floor(gameState.currentBet / 2 / 1000) * 1000);
                        elements.betAmount.dispatchEvent(new Event('input'));
                    });
                } else if (btn.id === 'doubleBet') {
                    btn.addEventListener('click', () => {
                        elements.betAmount.value = Math.min(config.maxBet, Math.floor(gameState.currentBet * 2 / 1000) * 1000);
                        elements.betAmount.dispatchEvent(new Event('input'));
                    });
                } else if (btn.id === 'maxBet') {
                    btn.addEventListener('click', () => {
                        elements.betAmount.value = Math.min(config.maxBet, Math.floor(gameState.balance / 1000) * 1000);
                        elements.betAmount.dispatchEvent(new Event('input'));
                    });
                } else {
                    btn.addEventListener('click', () => {
                        elements.betAmount.value = btn.dataset.amount;
                        elements.betAmount.dispatchEvent(new Event('input'));
                    });
                }
            });
            
            // Bet amount input
            elements.betAmount.addEventListener('input', function() {
                const value = parseInt(this.value) || 0;
                gameState.currentBet = Math.max(config.minBet, Math.min(config.maxBet, Math.floor(value / 1000) * 1000));
                this.value = gameState.currentBet;
            });
            
            // Place bet
            elements.placeBet.addEventListener('click', placeBet);
            
            // Cashout
            elements.cashoutBtn.addEventListener('click', cashout);
            
            // History button
            elements.historyBtn.addEventListener('click', function() {
                elements.historyPanel.style.display = elements.historyPanel.style.display === 'block' ? 'none' : 'block';
                elements.overlay.style.display = elements.historyPanel.style.display === 'block' ? 'block' : 'none';
                
                if (elements.historyPanel.style.display === 'block') {
                    fetchHistory();
                }
            });
            
            // Clear history
            document.getElementById('clearHistory').addEventListener('click', function() {
                if (confirm('Clear your local game history?')) {
                    elements.historyPanel.innerHTML = `
                        <div class="history-header">
                            <h3>Game History</h3>
                            <button id="clearHistory">Clear</button>
                        </div>
                        <div style="padding: 20px; text-align: center; color: rgba(255,255,255,0.5);">
                            No history available
                        </div>
                    `;
                }
            });
            
            // Stats button
            elements.statsBtn.addEventListener('click', function() {
                elements.statsPanel.style.display = 'block';
                elements.overlay.style.display = 'block';
            });
            
            // Stats close
            elements.statsClose.addEventListener('click', function() {
                elements.statsPanel.style.display = 'none';
                elements.overlay.style.display = 'none';
            });
            
            // Overlay click
            elements.overlay.addEventListener('click', function() {
                elements.historyPanel.style.display = 'none';
                elements.statsPanel.style.display = 'none';
                this.style.display = 'none';
            });
            
            // Auto cashout
            elements.autoStart.addEventListener('click', function() {
                const cashoutValue = parseFloat(elements.autoCashout.value);
                if (isNaN(cashoutValue)) {
                    alert('Please enter a valid auto cashout value');
                    return;
                }

                gameState.autoCashout = cashoutValue;
                elements.autoStart.disabled = true;
                elements.autoStop.disabled = false;
            });
            
            elements.autoStop.addEventListener('click', function() {
                gameState.autoCashout = null;
                elements.autoStart.disabled = false;
                elements.autoStop.disabled = true;
            });
        }
        
        // Place bet function
        function placeBet() {
            if (gameState.gameActive) return;
            
            const betAmount = parseInt(elements.betAmount.value);
            if (isNaN(betAmount) || betAmount < config.minBet || betAmount > config.maxBet) {
                alert(`Please enter a bet between Rp ${config.minBet.toLocaleString()} and Rp ${config.maxBet.toLocaleString()}`);
                return;
            }
            
            if (betAmount > gameState.balance) {
                alert('Insufficient balance');
                return;
            }
            
            // Disable bet button
            elements.placeBet.disabled = true;
            
            // Send request to server
            fetch(window.location.href, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=place_bet&amount=${betAmount}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                    elements.placeBet.disabled = false;
                    return;
                }
                
                // Update game state
                gameState.gameActive = true;
                gameState.currentGameId = data.game_id;
                gameState.crashMultiplier = data.crash_multiplier;
                gameState.balance = data.new_balance;
                gameState.graphPoints = [];
                
                // Update UI
                updateBalanceDisplay();
                elements.gameStatus.textContent = 'Game in progress...';
                elements.multiplierDisplay.textContent = '1.00x';
                elements.multiplierDisplay.style.color = '#ffffff';
                elements.cashoutBtn.disabled = false;
                
                // Start game loop
                startGameLoop();
            })
            .catch(error => {
                console.error('Error:', error);
                elements.placeBet.disabled = false;
            });
        }
        
        // Game loop
        function startGameLoop() {
            gameState.currentMultiplier = 1.00;
            gameState.graphPoints = [{x: 0, y: 100}];
            const startTime = Date.now();
            
            const gameInterval = setInterval(() => {
                // Calculate elapsed time in seconds
                const elapsed = (Date.now() - startTime) / 1000;
                
                // Calculate multiplier growth (exponential)
                const growthRate = 0.05 + Math.random() * 0.05;
                gameState.currentMultiplier = parseFloat((gameState.currentMultiplier * (1 + growthRate * 0.1)).toFixed(2));
                
                // Add point to graph
                gameState.graphPoints.push({
                    x: (elapsed / 10) * 100,
                    y: 100 - Math.min(99, gameState.currentMultiplier * 2)
                });
                
                // Update UI
                elements.multiplierDisplay.textContent = gameState.currentMultiplier.toFixed(2) + 'x';
                updateGraph();
                
                // Check for auto cashout
                if (gameState.autoCashout && gameState.currentMultiplier >= gameState.autoCashout) {
                    cashout();
                    return;
                }
                
                // Check for crash
                if (gameState.crashMultiplier > 0 && gameState.currentMultiplier >= gameState.crashMultiplier) {
                    endGame(false);
                    clearInterval(gameInterval);
                }
                
                // Limit game duration
                if (elapsed >= 15) {
                    endGame(true);
                    clearInterval(gameInterval);
                }
            }, 100);
        }
        
        // Update graph
        function updateGraph() {
            let pathData = 'M 0 100 ';
            
            gameState.graphPoints.forEach((point, index) => {
                if (index === 0) return;
                pathData += `L ${point.x} ${point.y} `;
            });
            
            elements.graphPath.setAttribute('d', pathData);
        }
        
        // Cashout function
        function cashout() {
            if (!gameState.gameActive || !gameState.currentGameId) return;
            
            // Disable cashout button
            elements.cashoutBtn.disabled = true;
            
            // Send request to server
            fetch(window.location.href, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=cash_out&game_id=${gameState.currentGameId}&multiplier=${gameState.currentMultiplier}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                    elements.cashoutBtn.disabled = false;
                    return;
                }
                
                // Update game state
                gameState.balance = data.new_balance;
                
                // Update UI
                updateBalanceDisplay();
                elements.multiplierDisplay.style.color = '#2ed573';
                elements.gameStatus.textContent = `Cashed out at ${gameState.currentMultiplier.toFixed(2)}x!`;
                
                // Add to history
                addToHistory({
                    bet_amount: gameState.currentBet,
                    win_amount: data.win_amount,
                    multiplier: gameState.currentMultiplier,
                    created_at: new Date().toISOString()
                }, true);
                
                // Reset game after delay
                setTimeout(() => {
                    resetGame();
                }, 3000);
            })
            .catch(error => {
                console.error('Error:', error);
                elements.cashoutBtn.disabled = false;
            });
        }
        
        // End game (crashed)
        function endGame(manualEnd) {
            gameState.gameActive = false;
            
            if (!manualEnd) {
                // Game crashed
                elements.multiplierDisplay.textContent = 'CRASHED';
                elements.multiplierDisplay.style.color = '#ff4757';
                elements.gameStatus.textContent = `Crashed at ${gameState.currentMultiplier.toFixed(2)}x`;
                
                // Add to history
                addToHistory({
                    bet_amount: gameState.currentBet,
                    win_amount: 0,
                    multiplier: gameState.currentMultiplier,
                    created_at: new Date().toISOString()
                }, false);
            } else {
                // Game ended without crash (max multiplier)
                elements.multiplierDisplay.textContent = gameState.currentMultiplier.toFixed(2) + 'x';
                elements.multiplierDisplay.style.color = '#2ed573';
                elements.gameStatus.textContent = `Max multiplier reached!`;
            }
            
            elements.cashoutBtn.disabled = true;
            
            // Reset game after delay
            setTimeout(() => {
                resetGame();
            }, 3000);
        }
        
        // Reset game
        function resetGame() {
            gameState.gameActive = false;
            gameState.currentGameId = null;
            gameState.currentMultiplier = 1.00;
            gameState.crashMultiplier = null;
            gameState.graphPoints = [];
            
            // Update UI
            elements.multiplierDisplay.textContent = '1.00x';
            elements.multiplierDisplay.style.color = '#ffffff';
            elements.gameStatus.textContent = 'Place your bet to start';
            elements.placeBet.disabled = false;
            elements.cashoutBtn.disabled = true;
            
            // Clear graph
            elements.graphPath.setAttribute('d', 'M 0 100');
        }
        
        // Update balance display
        function updateBalanceDisplay() {
            document.querySelector('.balance-amount').textContent = `Rp ${gameState.balance.toLocaleString()}`;
        }
        
        // Add to history
        function addToHistory(game, isWin) {
            const historyItem = document.createElement('div');
            historyItem.className = `history-item ${isWin ? 'win' : 'lose'}`;
            historyItem.innerHTML = `
                <div>
                    <div>Rp ${parseInt(game.bet_amount).toLocaleString()}</div>
                    <small>${new Date(game.created_at).toLocaleTimeString()}</small>
                </div>
                <div>
                    ${isWin ? `
                        <span class="history-multiplier">${parseFloat(game.multiplier).toFixed(2)}x</span>
                        <div>+Rp ${parseInt(game.win_amount).toLocaleString()}</div>
                    ` : `
                        <span class="history-lose">CRASHED</span>
                    `}
                </div>
            `;
            
            const historyPanel = document.getElementById('historyPanel');
            if (historyPanel.firstChild) {
                historyPanel.insertBefore(historyItem, historyPanel.firstChild.nextSibling);
            }
        }
        
        // Fetch history
        function fetchHistory() {
            fetch(window.location.href, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=get_history&limit=20'
            })
            .then(response => response.json())
            .then(history => {
                const panel = document.getElementById('historyPanel');
                panel.innerHTML = `
                    <div class="history-header">
                        <h3>Game History</h3>
                        <button id="clearHistory">Clear</button>
                    </div>
                `;
                
                history.forEach(game => {
                    const item = document.createElement('div');
                    item.className = `history-item ${game.win_amount > 0 ? 'win' : 'lose'}`;
                    item.innerHTML = `
                        <div>
                            <div>Rp ${parseInt(game.bet_amount).toLocaleString()}</div>
                            <small>${new Date(game.created_at).toLocaleTimeString()}</small>
                        </div>
                        <div>
                            ${game.display_multiplier ? `
                                <span class="history-multiplier">${parseFloat(game.display_multiplier).toFixed(2)}x</span>
                                <div>+Rp ${parseInt(game.win_amount).toLocaleString()}</div>
                            ` : `
                                <span class="history-lose">CRASHED</span>
                            `}
                        </div>
                    `;
                    panel.appendChild(item);
                });
                
                // Re-attach clear history event
                document.getElementById('clearHistory').addEventListener('click', function() {
                    if (confirm('Clear your local game history?')) {
                        panel.innerHTML = `
                            <div class="history-header">
                                <h3>Game History</h3>
                                <button id="clearHistory">Clear</button>
                            </div>
                            <div style="padding: 20px; text-align: center; color: rgba(255,255,255,0.5);">
                                No history available
                            </div>
                        `;
                    }
                });
            });
        }
        
        // Initialize the game
        initGame();
    </script>
</body>
</html>