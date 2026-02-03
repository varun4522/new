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
            
            if ($betAmount < 10 || $betAmount > 50000) {
                $response['message'] = 'Bet amount must be between 10 and 50000';
                break;
            }
            
            if ($betAmount > $currentUser['balance']) {
                $response['message'] = 'Insufficient balance';
                break;
            }
            
            // Generate random glass with coin (1-3)
            $coinPosition = rand(1, 3);
            
            $response = [
                'status' => 'success',
                'coinPosition' => $coinPosition,
                'winChance' => 33.33
            ];
            break;
            
        case 'check_result':
            $betAmount = floatval($_POST['amount'] ?? 0);
            $coinPosition = intval($_POST['coinPosition'] ?? 0);
            $choice = intval($_POST['choice'] ?? 0);
            
            if ($betAmount < 10 || $betAmount > 50000) {
                $response['message'] = 'Invalid bet amount';
                break;
            }
            
            if ($coinPosition < 1 || $coinPosition > 3) {
                $response['message'] = 'Invalid game state';
                break;
            }
            
            if ($choice < 1 || $choice > 3) {
                $response['message'] = 'Invalid choice';
                break;
            }
            
            // Check if user won (33.33% chance)
            $win = ($choice === $coinPosition);
            $winAmount = $win ? $betAmount * 2.85 : 0; // 2.85x payout for ~33% chance
            $newBalance = $win ? $currentUser['balance'] + $winAmount : $currentUser['balance'] - $betAmount;
            
            // Update balance
            $update = $db->prepare("UPDATE users SET balance =  WHERE id = ?");
            $update->bind_param("di", $newBalance, $user_id);
            $update->execute();
            
            // Record game history
            $history = $db->prepare("INSERT INTO game_history (user_id, bet_amount, choice, result, win_amount) VALUES (?, ?, ?, ?, ?)");
            $result = $win ? 'win' : 'loss';
            $history->bind_param("idisd", $user_id, $betAmount, $choice, $result, $winAmount);
            $history->execute();
            
            $response = [
                'status' => 'success',
                'result' => $result,
                'winAmount' => $winAmount,
                'newBalance' => $newBalance,
                'coinPosition' => $coinPosition
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
                    SUM(CASE WHEN result = 'win' THEN 1 ELSE 0 END) as wins,
                    SUM(CASE WHEN result = 'loss' THEN 1 ELSE 0 END) as losses,
                    SUM(win_amount) as total_won,
                    SUM(CASE WHEN result = 'loss' THEN bet_amount ELSE 0 END) as total_lost
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
        balance DECIMAL(10,2) DEFAULT NOT NULL,
        avatar VARCHAR(255) DEFAULT 'default.png',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

$db->query("
    CREATE TABLE IF NOT EXISTS game_history (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        bet_amount DECIMAL(10,2) NOT NULL,
        choice INT NOT NULL,
        result ENUM('win', 'loss') NOT NULL,
        win_amount DECIMAL(10,2) NOT NULL,
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
    <title>Premium 3-Glass Game</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #1a1e2b;
            --secondary: #252b3a;
            --accent: #6c5ce7;
            --accent-light: #a29bfe;
            --text: #f5f6fa;
            --text-secondary: #b2bec3;
            --win: #00b894;
            --loss: #d63031;
            --glass-color: rgba(255, 255, 255, 0.8);
            --glass-border: rgba(255, 255, 255, 0.2);
            --coin-gold: #ffd700;
            --nav-bg: #141824;
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
        
        .bg-glass {
            position: absolute;
            background: rgba(108, 92, 231, 0.05);
            border: 1px solid rgba(108, 92, 231, 0.1);
            border-radius: 50%;
            animation: float 20s infinite linear;
            opacity: 0.7;
        }
        
        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); opacity: 0; }
            10% { opacity: 0.7; }
            100% { transform: translateY(-1000px) rotate(360deg); opacity: 0; }
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            flex: 1;
            padding-bottom: 80px;
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
            border: 2px solid var(--accent);
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
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }
        
        .game-board {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 40px;
            width: 100%;
        }
        
        .glasses-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            width: 100%;
            perspective: 1000px;
        }
        
        @media (max-width: 768px) {
            .glasses-container {
                gap: 15px;
            }
        }
        
        .glass {
            width: 120px;
            height: 180px;
            background: var(--glass-color);
            border-radius: 10px 10px 50px 50px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            position: relative;
            overflow: hidden;
            transform-style: preserve-3d;
            cursor: pointer;
            transition: all 0.3s;
            border: 2px solid var(--glass-border);
        }
        
        .glass::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.3), rgba(255,255,255,0.1));
            border-radius: inherit;
        }
        
        .glass .coin {
            position: absolute;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--coin-gold), #daa520);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        
        .glass .coin::after {
            content: '₹';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 20px;
            font-weight: bold;
            color: rgba(0,0,0,0.7);
        }
        
        .glass.shaking {
            animation: shake 0.5s ease-in-out;
        }
        
        @keyframes shake {
            0%, 100% { transform: rotate(0); }
            20% { transform: rotate(-5deg); }
            40% { transform: rotate(5deg); }
            60% { transform: rotate(-5deg); }
            80% { transform: rotate(5deg); }
        }
        
        .glass.flipping {
            animation: flip-glass 1s forwards;
        }
        
        @keyframes flip-glass {
            0% { transform: rotateY(0); }
            50% { transform: rotateY(90deg); }
            100% { transform: rotateY(180deg); }
        }
        
        .glass.showing-coin .coin {
            display: block;
        }
        
        .choice-buttons {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        
        .choice-btn {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: var(--secondary);
            border: 3px solid var(--accent);
            color: var(--text);
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .choice-btn:hover {
            transform: translateY(-5px);
            background: var(--accent);
            color: white;
        }
        
        .choice-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }
        
        .bet-controls {
            background-color: var(--secondary);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
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
        
        .win-chance {
            background-color: rgba(0,0,0,0.3);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            margin-top: 10px;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 30px;
            width: 100%;
        }
        
        @media (max-width: 768px) {
            .stats {
                grid-template-columns: 1fr 1fr;
            }
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
        
        .history-items {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .history-item {
            display: flex;
            justify-content: space-between;
            padding: 12px;
            border-radius: 8px;
            background-color: rgba(0,0,0,0.1);
            font-size: 14px;
            transition: all 0.2s;
        }
        
        .history-item:hover {
            background-color: rgba(0,0,0,0.2);
        }
        
        .history-item .time {
            color: var(--text-secondary);
            width: 50px;
        }
        
        .history-item .choice {
            flex: 1;
            text-align: center;
        }
        
        .history-item .result {
            flex: 1;
            text-align: center;
            font-weight: 600;
        }
        
        .history-item.win .result {
            color: var(--win);
        }
        
        .history-item.loss .result {
            color: var(--loss);
        }
        
        .history-item .amount {
            width: 80px;
            text-align: right;
        }
        
        .history-item.win .amount {
            color: var(--win);
        }
        
        .history-item.loss .amount {
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
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="bg-animation" id="bgAnimation"></div>
    
    <div class="container">
        <header>
            <div class="logo">
                <i class="fas fa-glass-whiskey"></i>
                <span>PREMIUM GLASS GAME</span>
            </div>
            <div class="user-info">
                <div class="balance">Balance: <span class="balance-amount">₹<?= number_format($currentUser['balance'], 2) ?></span></div>
                <div class="user-avatar" id="userAvatar">
                    <img src="avatars/<?= htmlspecialchars($currentUser['avatar']) ?>" alt="User Avatar">
                </div>
            </div>
        </header>
        
        <div class="game-area">
            <div class="game-board">
                <div class="glasses-container" id="glassesContainer">
                    <div class="glass" id="glass1" data-number="1">
                        <div class="coin"></div>
                    </div>
                    <div class="glass" id="glass2" data-number="2">
                        <div class="coin"></div>
                    </div>
                    <div class="glass" id="glass3" data-number="3">
                        <div class="coin"></div>
                    </div>
                </div>
                
                <div class="choice-buttons" id="choiceButtons" style="display: none;">
                    <button class="choice-btn" data-choice="1">1</button>
                    <button class="choice-btn" data-choice="2">2</button>
                    <button class="choice-btn" data-choice="3">3</button>
                </div>
                
                <div class="win-chance">Win Chance: <span id="winChance">33.33%</span></div>
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
                
                <button class="place-bet-btn" id="placeBet">START GAME</button>
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
        <div class="history-items" id="historyItems"></div>
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
    <audio id="glassSound" src="sounds/glass.mp3" preload="auto"></audio>
    <audio id="winSound" src="sounds/win.mp3" preload="auto"></audio>
    <audio id="lossSound" src="sounds/loss.mp3" preload="auto"></audio>
    <audio id="coinSound" src="sounds/coin.mp3" preload="auto"></audio>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const glassesContainer = document.getElementById('glassesContainer');
            const glasses = document.querySelectorAll('.glass');
            const choiceButtons = document.getElementById('choiceButtons');
            const choiceBtns = document.querySelectorAll('.choice-btn');
            const betAmount = document.getElementById('betAmount');
            const placeBet = document.getElementById('placeBet');
            const quickBets = document.querySelectorAll('.quick-bet');
            const balanceDisplay = document.querySelector('.balance-amount');
            const winPopup = document.getElementById('winPopup');
            const lossPopup = document.getElementById('lossPopup');
            const winAmountDisplay = document.getElementById('winAmount');
            const lossAmountDisplay = document.getElementById('lossAmount');

                // load shared bottom nav
                (function(){
                    var s = document.createElement('script'); s.src = 'assets/js/shared_bottom_nav.js'; document.body.appendChild(s);
                })();
            const winChanceDisplay = document.getElementById('winChance');
            const historyBtn = document.getElementById('historyBtn');
            const historyPanel = document.getElementById('historyPanel');
            const historyItems = document.getElementById('historyItems');
            const totalGamesDisplay = document.getElementById('totalGames');
            const winsDisplay = document.getElementById('wins');
            const lossesDisplay = document.getElementById('losses');
            const profitDisplay = document.getElementById('profit');
            const bgAnimation = document.getElementById('bgAnimation');
            const userAvatar = document.getElementById('userAvatar');
            
            // Sound Effects
            const glassSound = document.getElementById('glassSound');
            const winSound = document.getElementById('winSound');
            const lossSound = document.getElementById('lossSound');
            const coinSound = document.getElementById('coinSound');
            
            // Game State
            let gameInProgress = false;
            let currentCoinPosition = 0;
            let currentBetAmount = 0;
            
            // Create animated background glasses
            function createBackground() {
                for (let i = 0; i < 8; i++) {
                    const glass = document.createElement('div');
                    glass.classList.add('bg-glass');
                    
                    // Random properties
                    const size = Math.random() * 100 + 50;
                    const posX = Math.random() * window.innerWidth;
                    const posY = Math.random() * window.innerHeight;
                    const duration = Math.random() * 20 + 10;
                    const delay = Math.random() * 5;
                    
                    // Apply styles
                    glass.style.width = `${size}px`;
                    glass.style.height = `${size * 1.5}px`;
                    glass.style.left = `${posX}px`;
                    glass.style.top = `${posY}px`;
                    glass.style.animationDuration = `${duration}s`;
                    glass.style.animationDelay = `${delay}s`;
                    glass.style.borderRadius = `${size/10}px ${size/10}px ${size/3}px ${size/3}px`;
                    
                    bgAnimation.appendChild(glass);
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
                currentBetAmount = amount;
                placeBet.disabled = true;
                
                // Hide choice buttons
                choiceButtons.style.display = 'none';
                
                // Reset glasses
                glasses.forEach(glass => {
                    glass.classList.remove('showing-coin', 'flipping', 'shaking');
                    glass.style.cursor = 'default';
                });
                
                // Start game
                startGame(amount);
            });
            
            // Start game animation and logic
            function startGame(amount) {
                // Play glass sound
                glassSound.currentTime = 0;
                glassSound.play();
                
                // Shake glasses
                glasses.forEach(glass => {
                    glass.classList.add('shaking');
                });
                
                // Send bet to server to get coin position
                fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `action=place_bet&amount=${amount}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        currentCoinPosition = data.coinPosition;
                        
                        // After shaking, show choice buttons
                        setTimeout(() => {
                            glasses.forEach(glass => {
                                glass.classList.remove('shaking');
                            });
                            
                            // Show choice buttons
                            choiceButtons.style.display = 'flex';
                            placeBet.textContent = 'Waiting for choice...';
                            
                            // Enable choice buttons
                            choiceBtns.forEach(btn => {
                                btn.disabled = false;
                                btn.style.cursor = 'pointer';
                            });
                        }, 1500);
                    } else {
                        alert(data.message);
                        resetGame();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    resetGame();
                });
            }
            
            // Handle glass choice
            choiceBtns.forEach(button => {
                button.addEventListener('click', function() {
                    if (!gameInProgress) return;
                    
                    const choice = parseInt(this.dataset.choice);
                    
                    // Disable all choice buttons
                    choiceBtns.forEach(btn => {
                        btn.disabled = true;
                        btn.style.cursor = 'default';
                    });
                    
                    // Flip all glasses
                    glasses.forEach(glass => {
                        glass.classList.add('flipping');
                        glass.style.cursor = 'default';
                    });
                    
                    // Play coin sound
                    coinSound.currentTime = 0;
                    coinSound.play();
                    
                    // After flipping, show the coin
                    setTimeout(() => {
                        // Show coin in the correct glass
                        const winningGlass = document.getElementById(`glass${currentCoinPosition}`);
                        winningGlass.classList.add('showing-coin');
                        
                        // Check result after short delay
                        setTimeout(() => {
                            checkResult(choice, currentBetAmount);
                        }, 1000);
                    }, 1000);
                });
            });
            
            // Check game result
            function checkResult(choice, amount) {
                fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `action=check_result&amount=${amount}&coinPosition=${currentCoinPosition}&choice=${choice}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Update balance
                        balanceDisplay.textContent = data.newBalance.toLocaleString('en-IN', {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                        
                        if (data.result === 'win') {
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
                        
                        // Reset game after delay
                        setTimeout(resetGame, 2000);
                    } else {
                        alert(data.message);
                        resetGame();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    resetGame();
                });
            }
            
            // Reset game state
            function resetGame() {
                glasses.forEach(glass => {
                    glass.classList.remove('showing-coin', 'flipping', 'shaking');
                    glass.style.cursor = 'pointer';
                });
                
                choiceButtons.style.display = 'none';
                placeBet.textContent = 'START GAME';
                placeBet.disabled = false;
                gameInProgress = false;
                currentCoinPosition = 0;
                
                // Enable choice buttons for next game
                choiceBtns.forEach(btn => {
                    btn.disabled = false;
                });
            }
            
            // History button
            historyBtn.addEventListener('click', function() {
                historyPanel.classList.toggle('show');
                if (historyPanel.classList.contains('show')) {
                    loadHistory();
                }
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
                            historyItem.className = `history-item ${item.result}`;
                            
                            const time = document.createElement('div');
                            time.className = 'time';
                            time.textContent = new Date(item.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
                            
                            const choice = document.createElement('div');
                            choice.className = 'choice';
                            choice.textContent = `Glass ${item.choice}`;
                            
                            const result = document.createElement('div');
                            result.className = 'result';
                            result.textContent = item.result.toUpperCase();
                            
                            const amount = document.createElement('div');
                            amount.className = 'amount';
                            amount.textContent = item.result === 'win' 
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
                
                // Set active based on current page
                if (item.getAttribute('href') === window.location.pathname) {
                    item.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>