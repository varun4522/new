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
        throw new Exception("Connection failed");
    }
} catch (Exception $e) {
    die("Database connection error");
}

// Check login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get user data
$user_id = $_SESSION['user_id'];
$user_query = $db->prepare("SELECT id, username, balance, avatar FROM users WHERE id = ?");
$user_query->bind_param("i", $user_id);
$user_query->execute();
$user_result = $user_query->get_result();
$currentUser = $user_result->fetch_assoc();

if (!$currentUser) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Handle game actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $response = ['status' => 'error', 'message' => 'Invalid action'];
    
    switch ($action) {
        case 'place_bet':
            $betAmount = floatval($_POST['amount'] ?? 0);
            $choice = $_POST['choice'] ?? '';
            $autoCashout = floatval($_POST['auto_cashout'] ?? 0);
            
            if ($betAmount < 10 || $betAmount > 50000) {
                $response['message'] = 'Bet amount must be between 10 and 50000';
                break;
            }
            
            if ($betAmount > $currentUser['balance']) {
                $response['message'] = 'Insufficient balance';
                break;
            }
            
            if (!in_array($choice, ['heads', 'tails'])) {
                $response['message'] = 'Invalid choice';
                break;
            }
            
            // Simulate coin flip with 49.5% win chance (house edge)
            $result = rand(1, 1000) <= 495 ? $choice : ($choice === 'heads' ? 'tails' : 'heads');
            $winAmount = $result === $choice ? $betAmount * 1.98 : 0;
            $newBalance = $result === $choice ? $currentUser['balance'] + $winAmount : $currentUser['balance'] - $betAmount;
            
            // Update balance
            $update = $db->prepare("UPDATE users SET balance = ? WHERE id = ?");
            $update->bind_param("di", $newBalance, $user_id);
            $update->execute();
            
            // Record game history
            $history = $db->prepare("INSERT INTO game_history (user_id, bet_amount, choice, result, win_amount, auto_cashout) VALUES (?, ?, ?, ?, ?, ?)");
            $history->bind_param("idssdd", $user_id, $betAmount, $choice, $result, $winAmount, $autoCashout);
            $history->execute();
            
            $response = [
                'status' => 'success',
                'result' => $result,
                'winAmount' => $winAmount,
                'newBalance' => $newBalance,
                'winChance' => 49.5
            ];
            break;
            
        case 'get_history':
            $history_query = $db->prepare("SELECT created_at, bet_amount, choice, result, win_amount FROM game_history WHERE user_id = ? ORDER BY created_at DESC LIMIT 10");
            $history_query->bind_param("i", $user_id);
            $history_query->execute();
            $history = $history_query->get_result()->fetch_all(MYSQLI_ASSOC);
            $response = ['status' => 'success', 'history' => $history];
            break;
            
        case 'get_stats':
            $stats_query = $db->prepare("
                SELECT 
                    COUNT(*) as total_games,
                    SUM(CASE WHEN result = choice THEN 1 ELSE 0 END) as wins,
                    SUM(CASE WHEN result != choice THEN 1 ELSE 0 END) as losses,
                    SUM(win_amount) as total_won,
                    SUM(CASE WHEN result != choice THEN bet_amount ELSE 0 END) as total_lost
                FROM game_history 
                WHERE user_id = ?
            ");
            $stats_query->bind_param("i", $user_id);
            $stats_query->execute();
            $stats = $stats_query->get_result()->fetch_assoc();
            $response = ['status' => 'success', 'stats' => $stats];
            break;
            
        case 'get_user':
            $response = ['status' => 'success', 'user' => $currentUser];
            break;
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

// Create tables if they don't exist
$db->query("
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        balance DECIMAL(10,2) DEFAULT 1000.00,
        avatar VARCHAR(255) DEFAULT 'default.png',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

$db->query("
    CREATE TABLE IF NOT EXISTS game_history (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        bet_amount DECIMAL(10,2) NOT NULL,
        choice ENUM('heads', 'tails') NOT NULL,
        result ENUM('heads', 'tails') NOT NULL,
        win_amount DECIMAL(10,2) NOT NULL,
        auto_cashout DECIMAL(10,2) DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Premium Coin Flip</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #2a2e3f;
            --secondary: #1e2132;
            --accent: #6c5ce7;
            --accent-light: #a29bfe;
            --text: #f5f6fa;
            --text-secondary: #b2bec3;
            --win: #00b894;
            --loss: #d63031;
            --coin-gold: #ffd700;
            --coin-silver: #c0c0c0;
            --nav-bg: #1a1d2b;
            --nav-active: #6c5ce7;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--primary);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }
        
        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        
        .bg-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(108, 92, 231, 0.1);
            animation: float 15s infinite linear;
        }
        
        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-1000px) rotate(720deg); opacity: 0; }
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            flex: 1;
            padding-bottom: 80px; /* Space for bottom nav */
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 30px;
        }
        
        .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--accent);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo i {
            font-size: 28px;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .balance {
            background-color: var(--secondary);
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .balance-amount {
            color: var(--accent-light);
        }
        
        .game-area {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }
        
        @media (max-width: 768px) {
            .game-area {
                grid-template-columns: 1fr;
            }
        }
        
        .coin-container {
            background-color: var(--secondary);
            border-radius: 15px;
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            position: relative;
            overflow: hidden;
        }
        
        .coin {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            position: relative;
            transform-style: preserve-3d;
            cursor: pointer;
            margin: 30px 0;
        }
        
        .coin-front, .coin-back {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            backface-visibility: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            box-shadow: inset 0 0 20px rgba(0,0,0,0.3);
        }
        
        .coin-front {
            background: linear-gradient(135deg, var(--coin-gold), #daa520);
            transform: rotateY(0deg);
        }
        
        .coin-back {
            background: linear-gradient(135deg, var(--coin-silver), #a9a9a9);
            transform: rotateY(180deg);
        }
        
        .coin-edge {
            position: absolute;
            width: 100%;
            height: 20px;
            background: linear-gradient(90deg, #daa520, #ffd700, #daa520);
            border-radius: 10px;
            top: 50%;
            transform: translateY(-50%) rotateX(90deg);
        }
        
        .flipping {
            animation: flip-coin 3s cubic-bezier(0.4, 2.5, 0.6, 0.5) forwards;
        }
        
        @keyframes flip-coin {
            0% { transform: rotateY(0); }
            20% { transform: rotateY(180deg); }
            40% { transform: rotateY(360deg); }
            60% { transform: rotateY(540deg); }
            80% { transform: rotateY(720deg); }
            100% { transform: rotateY(calc(var(--final-rotation, 0) * 180deg)); }
        }
        
        .win-chance {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: rgba(0,0,0,0.3);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
        
        .bet-controls {
            background-color: var(--secondary);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .bet-amount {
            margin-bottom: 20px;
        }
        
        .bet-amount label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-secondary);
            font-size: 14px;
        }
        
        .bet-input {
            display: flex;
            align-items: center;
            background-color: rgba(0,0,0,0.2);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .bet-input input {
            flex: 1;
            padding: 15px;
            background: transparent;
            border: none;
            color: var(--text);
            font-size: 16px;
            outline: none;
        }
        
        .bet-input .currency {
            padding: 0 15px;
            background-color: rgba(0,0,0,0.3);
            height: 100%;
            display: flex;
            align-items: center;
        }
        
        .quick-bets {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .quick-bet {
            padding: 10px;
            background-color: rgba(0,0,0,0.2);
            border: none;
            border-radius: 8px;
            color: var(--text);
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
        }
        
        .quick-bet:hover {
            background-color: var(--accent);
        }
        
        .choice-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 25px;
        }
        
        .choice-btn {
            padding: 15px;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .choice-btn.heads {
            background-color: rgba(0, 184, 148, 0.2);
            color: var(--win);
        }
        
        .choice-btn.heads.active {
            background-color: var(--win);
            color: white;
        }
        
        .choice-btn.tails {
            background-color: rgba(214, 48, 49, 0.2);
            color: var(--loss);
        }
        
        .choice-btn.tails.active {
            background-color: var(--loss);
            color: white;
        }
        
        .choice-btn .odds {
            font-size: 12px;
            margin-top: 5px;
            font-weight: 400;
        }
        
        .auto-cashout {
            margin-bottom: 25px;
        }
        
        .auto-cashout label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-secondary);
            font-size: 14px;
        }
        
        .auto-cashout-input {
            display: flex;
            align-items: center;
            background-color: rgba(0,0,0,0.2);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .auto-cashout-input input {
            flex: 1;
            padding: 15px;
            background: transparent;
            border: none;
            color: var(--text);
            font-size: 16px;
            outline: none;
        }
        
        .auto-cashout-input .percent {
            padding: 0 15px;
            background-color: rgba(0,0,0,0.3);
            height: 100%;
            display: flex;
            align-items: center;
        }
        
        .place-bet-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, var(--accent), var(--accent-light));
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .place-bet-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.4);
        }
        
        .place-bet-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 30px;
        }
        
        .stat-card {
            background-color: var(--secondary);
            border-radius: 10px;
            padding: 15px;
            text-align: center;
        }
        
        .stat-card .value {
            font-size: 24px;
            font-weight: 700;
            margin: 5px 0;
        }
        
        .stat-card .label {
            font-size: 12px;
            color: var(--text-secondary);
        }
        
        /* Win/Loss popups */
        .result-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 30px 50px;
            border-radius: 15px;
            font-size: 28px;
            font-weight: 700;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 15px 30px rgba(0,0,0,0.3);
            opacity: 0;
            transition: all 0.3s;
            pointer-events: none;
        }
        
        .result-popup.show {
            opacity: 1;
            transform: translate(-50%, -60%);
        }
        
        .result-popup.win {
            background: linear-gradient(135deg, var(--win), #55efc4);
            color: white;
        }
        
        .result-popup.loss {
            background: linear-gradient(135deg, var(--loss), #ff7675);
            color: white;
        }
        
        .result-popup .amount {
            font-size: 36px;
            margin-top: 10px;
        }
        
        /* History panel */
        .history-btn {
            position: fixed;
            bottom: 90px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), var(--accent-light));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(108, 92, 231, 0.5);
            z-index: 100;
            font-size: 20px;
            transition: all 0.3s;
        }
        
        .history-btn:hover {
            transform: translateY(-5px) scale(1.1);
        }
        
        .history-panel {
            position: fixed;
            bottom: 160px;
            right: 30px;
            width: 350px;
            max-height: 500px;
            background-color: var(--secondary);
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            z-index: 99;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s;
            pointer-events: none;
            overflow-y: auto;
        }
        
        .history-panel.show {
            opacity: 1;
            transform: translateY(0);
            pointer-events: all;
        }
        
        .history-panel h3 {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .history-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            font-size: 14px;
        }
        
        .history-item:last-child {
            border-bottom: none;
        }
        
        .history-item .time {
            color: var(--text-secondary);
            width: 50px;
        }
        
        .history-item .choice {
            flex: 1;
            text-align: center;
        }
        
        .history-item .choice.heads {
            color: var(--win);
        }
        
        .history-item .choice.tails {
            color: var(--loss);
        }
        
        .history-item .result {
            flex: 1;
            text-align: center;
            font-weight: 600;
        }
        
        .history-item .amount {
            width: 80px;
            text-align: right;
        }
        
        .history-item .win {
            color: var(--win);
        }
        
        .history-item .loss {
            color: var(--loss);
        }
        
        /* Mobile Bottom Navigation */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: var(--nav-bg);
            display: flex;
            justify-content: space-around;
            padding: 10px 0;
            box-shadow: 0 -5px 15px rgba(0,0,0,0.2);
            z-index: 1000;
        }
        
        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 12px;
            transition: all 0.3s;
            padding: 5px 10px;
            border-radius: 10px;
        }
        
        .nav-item i {
            font-size: 20px;
            margin-bottom: 5px;
        }
        
        .nav-item.active {
            color: var(--accent-light);
            transform: translateY(-5px);
        }
        
        .nav-item.active i {
            color: var(--nav-active);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .coin {
                width: 150px;
                height: 150px;
            }
            
            .stats {
                grid-template-columns: 1fr 1fr;
            }
            
            .history-panel {
                width: 300px;
                right: 15px;
            }
            
            .bottom-nav {
                padding: 8px 0;
            }
            
            .nav-item {
                font-size: 10px;
                padding: 5px;
            }
            
            .nav-item i {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="bg-animation" id="bgAnimation"></div>
    
    <div class="container">
        <header>
            <div class="logo">
                <i class="fas fa-coins"></i>
                <span>PREMIUM COIN FLIP</span>
            </div>
            <div class="user-info">
                <div class="balance">Balance: <span class="balance-amount">₹<?= number_format($currentUser['balance'], 2) ?></span></div>
                <div class="user-avatar" id="userAvatar">
                  
                </div>
            </div>
        </header>
        
        <div class="game-area">
            <div class="coin-container">
                <div class="win-chance">Win Chance: <span id="winChance">49.5%</span></div>
                <div class="coin" id="coin">
                    <div class="coin-front">HEADS</div>
                    <div class="coin-back">TAILS</div>
                    <div class="coin-edge"></div>
                </div>
                <div class="coin-shadow"></div>
            </div>
            
            <div class="bet-controls">
                <div class="bet-amount">
                    <label>Bet Amount (₹)</label>
                    <div class="bet-input">
                        <input type="number" id="betAmount" min="10" max="50000" value="100" step="10">
                        <div class="currency">₹</div>
                    </div>
                </div>
                
                <div class="quick-bets">
                    <button class="quick-bet" data-amount="10">10</button>
                    <button class="quick-bet" data-amount="100">100</button>
                    <button class="quick-bet" data-amount="500">500</button>
                    <button class="quick-bet" data-amount="1000">1K</button>
                </div>
                
                <div class="choice-buttons">
                    <button class="choice-btn heads active" data-choice="heads">
                        HEADS
                        <span class="odds">1.98x</span>
                    </button>
                    <button class="choice-btn tails" data-choice="tails">
                        TAILS
                        <span class="odds">1.98x</span>
                    </button>
                </div>
                
                <div class="auto-cashout">
                    <label>Auto Cashout (optional)</label>
                    <div class="auto-cashout-input">
                        <input type="number" id="autoCashout" min="0" max="100" placeholder="0" step="0.1">
                        <div class="percent">%</div>
                    </div>
                </div>
                
                <button class="place-bet-btn" id="placeBet">FLIP COIN</button>
            </div>
        </div>
        
        <div class="stats" id="stats">
            <div class="stat-card">
                <div class="value" id="totalGames">0</div>
                <div class="label">Total Games</div>
            </div>
            <div class="stat-card">
                <div class="value" id="wins">0</div>
                <div class="label">Wins</div>
            </div>
            <div class="stat-card">
                <div class="value" id="losses">0</div>
                <div class="label">Losses</div>
            </div>
            <div class="stat-card">
                <div class="value" id="profit">₹0.00</div>
                <div class="label">Profit</div>
            </div>
        </div>
    </div>
    
    <!-- Result Popups -->
    <div class="result-popup win" id="winPopup">
        <div>YOU WON!</div>
        <div class="amount">+₹<span id="winAmount">0.00</span></div>
    </div>
    
    <div class="result-popup loss" id="lossPopup">
        <div>YOU LOST!</div>
        <div class="amount">-₹<span id="lossAmount">0.00</span></div>
    </div>
    
    <!-- History Button and Panel -->
    <div class="history-btn" id="historyBtn">📜</div>
    <div class="history-panel" id="historyPanel">
        <h3>Game History</h3>
        <div id="historyItems"></div>
    </div>
    
    <!-- Mobile Bottom Navigation -->
    <div class="bottom-nav">
        <a href="index.php" class="nav-item active">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
        
        <a href="kyc.html" class="nav-item">
            <i class="fas fa-gamepad"></i>
            <span>Kyc</span>
        </a>
        
        <a href="deposit.html" class="nav-item">
            <i class="fas fa-wallet"></i>
            <span>Deposit</span>
        </a>
        
        <a href="refer.php" class="nav-item">
            <i class="fas fa-gift"></i>
            <span>Promos</span>
        </a>
        
        <a href="profile.php" class="nav-item">
            <i class="fas fa-user"></i>
            <span>Profile</span>
        </a>
    </div>
    
    <!-- Sound Effects -->
    <audio id="flipSound" src="sounds/flip.mp3" preload="auto"></audio>
    <audio id="winSound" src="sounds/win.mp3" preload="auto"></audio>
    <audio id="lossSound" src="sounds/loss.mp3" preload="auto"></audio>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const coin = document.getElementById('coin');
            const betAmount = document.getElementById('betAmount');
            const placeBet = document.getElementById('placeBet');
            const quickBets = document.querySelectorAll('.quick-bet');
            const choiceBtns = document.querySelectorAll('.choice-btn');
            const autoCashout = document.getElementById('autoCashout');
            const balanceDisplay = document.querySelector('.balance-amount');
            const winPopup = document.getElementById('winPopup');
            const lossPopup = document.getElementById('lossPopup');
            const winAmountDisplay = document.getElementById('winAmount');
            const lossAmountDisplay = document.getElementById('lossAmount');
            const winChanceDisplay = document.getElementById('winChance');
            const historyBtn = document.getElementById('historyBtn');
                // load shared bottom nav
                (function(){
                    var s = document.createElement('script'); s.src = 'assets/js/shared_bottom_nav.js'; document.body.appendChild(s);
                })();
            const historyPanel = document.getElementById('historyPanel');
            const historyItems = document.getElementById('historyItems');
            const totalGamesDisplay = document.getElementById('totalGames');
            const winsDisplay = document.getElementById('wins');
            const lossesDisplay = document.getElementById('losses');
            const profitDisplay = document.getElementById('profit');
            const bgAnimation = document.getElementById('bgAnimation');
            const userAvatar = document.getElementById('userAvatar');
            
            // Sound Effects
            const flipSound = document.getElementById('flipSound');
            const winSound = document.getElementById('winSound');
            const lossSound = document.getElementById('lossSound');
            
            // Game State
            let currentChoice = 'heads';
            let gameInProgress = false;
            let currentAutoCashout = 0;
            
            // Create animated background circles
            function createBackground() {
                const colors = ['rgba(108, 92, 231, 0.1)', 'rgba(162, 155, 254, 0.1)', 'rgba(100, 255, 218, 0.1)'];
                
                for (let i = 0; i < 15; i++) {
                    const circle = document.createElement('div');
                    circle.classList.add('bg-circle');
                    
                    // Random properties
                    const size = Math.random() * 200 + 50;
                    const posX = Math.random() * window.innerWidth;
                    const posY = Math.random() * window.innerHeight;
                    const color = colors[Math.floor(Math.random() * colors.length)];
                    const duration = Math.random() * 20 + 10;
                    const delay = Math.random() * 5;
                    
                    // Apply styles
                    circle.style.width = `${size}px`;
                    circle.style.height = `${size}px`;
                    circle.style.left = `${posX}px`;
                    circle.style.top = `${posY}px`;
                    circle.style.background = color;
                    circle.style.animationDuration = `${duration}s`;
                    circle.style.animationDelay = `${delay}s`;
                    
                    bgAnimation.appendChild(circle);
                }
            }
            
            // Initialize
            createBackground();
            loadStats();
            loadHistory();
            loadUserData();
            
            // Quick bet buttons
            quickBets.forEach(button => {
                button.addEventListener('click', function() {
                    betAmount.value = this.dataset.amount;
                });
            });
            
            // Choice selection
            choiceBtns.forEach(button => {
                button.addEventListener('click', function() {
                    choiceBtns.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    currentChoice = this.dataset.choice;
                });
            });
            
            // Auto cashout input
            autoCashout.addEventListener('input', function() {
                currentAutoCashout = parseFloat(this.value) || 0;
            });
            
            // Place bet
            placeBet.addEventListener('click', function() {
                if (gameInProgress) return;
                
                const amount = parseFloat(betAmount.value);
                if (isNaN(amount) || amount < 10 || amount > 50000) {
                    alert('Please enter a valid bet amount between 10 and 50000');
                    return;
                }
                
                if (amount > parseFloat(balanceDisplay.textContent.replace(/[^0-9.]/g, ''))) {
                    alert('Insufficient balance');
                    return;
                }
                
                gameInProgress = true;
                placeBet.disabled = true;
                flipCoin(amount, currentChoice, currentAutoCashout);
            });
            
            // Flip coin animation and logic
            function flipCoin(amount, choice, autoCashout) {
                // Play flip sound
                flipSound.currentTime = 0;
                flipSound.play();
                
                // Start flip animation
                coin.classList.add('flipping');
                
                // Send bet to server
                fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `action=place_bet&amount=${amount}&choice=${choice}&auto_cashout=${autoCashout}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Set final rotation based on result
                        const finalRotation = data.result === 'heads' ? 0 : 1;
                        coin.style.setProperty('--final-rotation', finalRotation);
                        
                        // Update balance
                        balanceDisplay.textContent = data.newBalance.toLocaleString('en-IN', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                        
                        // Show result after animation completes
                        setTimeout(() => {
                            if (data.result === choice) {
                                // Win
                                winAmountDisplay.textContent = data.winAmount.toLocaleString('en-IN', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                                winSound.play();
                                winPopup.classList.add('show');
                                
                                setTimeout(() => {
                                    winPopup.classList.remove('show');
                                }, 3000);
                            } else {
                                // Loss
                                lossAmountDisplay.textContent = amount.toLocaleString('en-IN', {
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                });
                                lossSound.play();
                                lossPopup.classList.add('show');
                                
                                setTimeout(() => {
                                    lossPopup.classList.remove('show');
                                }, 3000);
                            }
                            
                            // Update stats and history
                            loadStats();
                            loadHistory();
                            
                            // Reset for next bet
                            setTimeout(() => {
                                coin.classList.remove('flipping');
                                placeBet.disabled = false;
                                gameInProgress = false;
                            }, 500);
                        }, 3000);
                    } else {
                        alert(data.message);
                        coin.classList.remove('flipping');
                        placeBet.disabled = false;
                        gameInProgress = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    coin.classList.remove('flipping');
                    placeBet.disabled = false;
                    gameInProgress = false;
                });
            }
            
            // History button
            historyBtn.addEventListener('click', function() {
                historyPanel.classList.toggle('show');
            });
            
            // Load game history
            function loadHistory() {
                fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'action=get_history'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        historyItems.innerHTML = '';
                        data.history.forEach(item => {
                            const historyItem = document.createElement('div');
                            historyItem.className = 'history-item';
                            
                            const time = document.createElement('div');
                            time.className = 'time';
                            time.textContent = new Date(item.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
                            
                            const choice = document.createElement('div');
                            choice.className = `choice ${item.choice}`;
                            choice.textContent = item.choice.toUpperCase();
                            
                            const result = document.createElement('div');
                            result.className = 'result';
                            result.textContent = item.result.toUpperCase();
                            
                            const amount = document.createElement('div');
                            amount.className = `amount ${item.result === item.choice ? 'win' : 'loss'}`;
                            amount.textContent = item.result === item.choice 
                                ? `+₹${parseFloat(item.win_amount).toFixed(2)}` 
                                : `-₹${parseFloat(item.bet_amount).toFixed(2)}`;
                            
                            historyItem.appendChild(time);
                            historyItem.appendChild(choice);
                            historyItem.appendChild(result);
                            historyItem.appendChild(amount);
                            historyItems.appendChild(historyItem);
                        });
                    }
                });
            }
            
            // Load user stats
            function loadStats() {
                fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'action=get_stats'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        const stats = data.stats;
                        totalGamesDisplay.textContent = stats.total_games || 0;
                        winsDisplay.textContent = stats.wins || 0;
                        lossesDisplay.textContent = stats.losses || 0;
                        
                        const profit = (stats.total_won || 0) - (stats.total_lost || 0);
                        profitDisplay.textContent = `₹${profit.toFixed(2)}`;
                    }
                });
            }
            
            // Load user data
            function loadUserData() {
                fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'action=get_user'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Update avatar if needed
                        const avatarImg = userAvatar.querySelector('img');
                        if (avatarImg.src !== `avatars/${data.user.avatar}`) {
                            avatarImg.src = `avatars/${data.user.avatar}`;
                        }
                    }
                });
            }
            
            // Handle navigation active state
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    navItems.forEach(nav => nav.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>