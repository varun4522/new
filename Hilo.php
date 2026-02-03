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

// Check if user is logged in, redirect to login if not
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

// Create game settings table if not exists and get settings
$db->query("CREATE TABLE IF NOT EXISTS game_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    min_bet DECIMAL(10,2) DEFAULT 10.00,
    max_bet DECIMAL(10,2) DEFAULT 50000.00,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)");

// Insert default settings if none exist
$db->query("INSERT IGNORE INTO game_settings (id, min_bet, max_bet) VALUES (1, 10.00, 50000.00)");

// Get game settings
$settings_result = $db->query("SELECT * FROM game_settings WHERE id = 1");
$settings = $settings_result->fetch_assoc();
$minBet = $settings['min_bet'];
$maxBet = $settings['max_bet'];

// Game configuration
$gameHistory = [];
$winPopup = false;
$lossPopup = false;
$lastResult = null;
$error = null;
$showWelcomePopup = !isset($_COOKIE['hilo_welcome_shown']);
$isPremiumUser = $currentUser['premium'] ?? false;

// Card suits and values
$suits = ['hearts', 'diamonds', 'clubs', 'spades'];
$values = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

// Set welcome cookie
if ($showWelcomePopup) {
    setcookie('hilo_welcome_shown', '1', time() + (30 * 24 * 60 * 60), '/');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $error = "Invalid request";
    } else {
        $betAmount = floatval($_POST['bet_amount'] ?? $minBet);
        $action = $_POST['action'] ?? '';
        $choice = $_POST['choice'] ?? '';
        $autoCashout = floatval($_POST['auto_cashout'] ?? 0);
        
        // Validate bet amount
        if ($action === 'start' || $action === 'guess') {
            if ($betAmount < $minBet || $betAmount > $maxBet) {
                $error = "Bet amount must be between $minBet and $maxBet";
            } elseif ($action === 'start' && $betAmount > $currentUser['balance']) {
                $error = "Insufficient balance";
            } else {
                // Process game action
                if ($action === 'start') {
                    // Deduct bet amount
                    $newBalance = $currentUser['balance'] - $betAmount;
                    $update = $db->prepare("UPDATE users SET balance = ? WHERE id = ?");
                    $update->bind_param("di", $newBalance, $user_id);
                    $update->execute();
                    $currentUser['balance'] = $newBalance;
                    
                    // Generate first card
                    $firstCard = [
                        'suit' => $suits[array_rand($suits)],
                        'value' => $values[array_rand($values)],
                        'index' => array_search($values[array_rand($values)], $values)
                    ];
                    
                    // Save game state
                    $_SESSION['hilo_game'] = [
                        'bet_amount' => $betAmount,
                        'current_card' => $firstCard,
                        'current_multiplier' => 1.0,
                        'start_time' => time(),
                        'auto_cashout' => $autoCashout,
                        'history' => [$firstCard]
                    ];
                } elseif ($action === 'guess' && isset($_SESSION['hilo_game'])) {
                    $game = $_SESSION['hilo_game'];
                    $currentCardIndex = $game['current_card']['index'];
                    
                    // Generate next card (can't be same as current)
                    do {
                        $nextCardIndex = array_rand($values);
                    } while ($nextCardIndex == $currentCardIndex);
                    
                    $nextCard = [
                        'suit' => $suits[array_rand($suits)],
                        'value' => $values[$nextCardIndex],
                        'index' => $nextCardIndex
                    ];
                    
                    // Add to card history
                    $game['history'][] = $nextCard;
                    
                    // Check if guess was correct
                    $correct = false;
                    if ($choice === 'higher' && $nextCardIndex > $currentCardIndex) {
                        $correct = true;
                    } elseif ($choice === 'lower' && $nextCardIndex < $currentCardIndex) {
                        $correct = true;
                    } elseif ($choice === 'same' && $nextCardIndex == $currentCardIndex) {
                        $correct = true;
                    }
                    
                    if ($correct) {
                        // Correct guess - increase multiplier
                        $multiplierIncrement = 0.2 + (mt_rand() / mt_getrandmax() * 0.3);
                        $game['current_multiplier'] += $multiplierIncrement;
                        $game['current_card'] = $nextCard;
                        
                        // Check auto cashout
                        if ($game['auto_cashout'] > 0 && $game['current_multiplier'] >= $game['auto_cashout']) {
                            $winAmount = $game['bet_amount'] * $game['current_multiplier'];
                            $newBalance = $currentUser['balance'] + $winAmount;
                            $update = $db->prepare("UPDATE users SET balance = ? WHERE id = ?");
                            $update->bind_param("di", $newBalance, $user_id);
                            $update->execute();
                            $currentUser['balance'] = $newBalance;
                            
                            // Record bet in database
                            $insert = $db->prepare("INSERT INTO bets (user_id, amount, game_type, multiplier, win_amount, status) VALUES (?, ?, 'hilo', ?, ?, 'win')");
                            $insert->bind_param("iddd", $user_id, $game['bet_amount'], $game['current_multiplier'], $winAmount);
                            $insert->execute();
                            
                            $lastResult = [
                                'type' => 'win',
                                'amount' => $winAmount,
                                'multiplier' => $game['current_multiplier'],
                                'time' => time(),
                                'duration' => time() - $game['start_time'],
                                'cards' => $game['history'],
                                'auto_cashout' => true
                            ];
                            $winPopup = true;
                            unset($_SESSION['hilo_game']);
                        } else {
                            $_SESSION['hilo_game'] = $game;
                        }
                    } else {
                        // Wrong guess - game over
                        // Record bet in database
                        $insert = $db->prepare("INSERT INTO bets (user_id, amount, game_type, multiplier, win_amount, status) VALUES (?, ?, 'hilo', ?, 0, 'loss')");
                        $insert->bind_param("idd", $user_id, $game['bet_amount'], $game['current_multiplier']);
                        $insert->execute();
                        
                        $lastResult = [
                            'type' => 'loss',
                            'amount' => $game['bet_amount'],
                            'multiplier' => $game['current_multiplier'],
                            'time' => time(),
                            'duration' => time() - $game['start_time'],
                            'cards' => $game['history']
                        ];
                        $lossPopup = true;
                        unset($_SESSION['hilo_game']);
                    }
                } elseif ($action === 'cashout' && isset($_SESSION['hilo_game'])) {
                    $game = $_SESSION['hilo_game'];
                    $winAmount = $game['bet_amount'] * $game['current_multiplier'];
                    
                    // Add winnings
                    $newBalance = $currentUser['balance'] + $winAmount;
                    $update = $db->prepare("UPDATE users SET balance = ? WHERE id = ?");
                    $update->bind_param("di", $newBalance, $user_id);
                    $update->execute();
                    $currentUser['balance'] = $newBalance;
                    
                    // Record bet in database
                    $insert = $db->prepare("INSERT INTO bets (user_id, amount, game_type, multiplier, win_amount, status) VALUES (?, ?, 'hilo', ?, ?, 'win')");
                    $insert->bind_param("iddd", $user_id, $game['bet_amount'], $game['current_multiplier'], $winAmount);
                    $insert->execute();
                    
                    $lastResult = [
                        'type' => 'win',
                        'amount' => $winAmount,
                        'multiplier' => $game['current_multiplier'],
                        'time' => time(),
                        'duration' => time() - $game['start_time'],
                        'cards' => $game['history']
                    ];
                    $winPopup = true;
                    unset($_SESSION['hilo_game']);
                }
            }
        }
    }
}

// Get game history from database
$history_query = $db->prepare("SELECT * FROM bets WHERE user_id = ? AND game_type = 'hilo' ORDER BY created_at DESC LIMIT 50");
$history_query->bind_param("i", $user_id);
$history_query->execute();
$history_result = $history_query->get_result();
while ($row = $history_result->fetch_assoc()) {
    $gameHistory[] = [
        'type' => $row['status'],
        'amount' => $row['status'] === 'win' ? $row['win_amount'] : $row['amount'],
        'multiplier' => $row['multiplier'],
        'time' => strtotime($row['created_at']),
        'duration' => 0 // Not stored in database
    ];
}

// Get current game state
$gameState = $_SESSION['hilo_game'] ?? null;
$currentMultiplier = $gameState['current_multiplier'] ?? 1.0;
$currentCard = $gameState['current_card'] ?? null;
$gameDuration = isset($gameState['start_time']) ? time() - $gameState['start_time'] : 0;
$cardHistory = $gameState['history'] ?? [];

// Generate CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi-Lo Game | Chiken Road</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --neon-primary: #00f3ff;
            --neon-secondary: #ff00e6;
            --neon-tertiary: #9600ff;
            --neon-quaternary: #ffcc00;
            --bg-dark: #0f0f1a;
            --bg-darker: #0a0a12;
            --text-light: #f0f0f0;
            --text-lighter: #ffffff;
            --text-dim: rgba(255, 255, 255, 0.7);
            --glass-bg: rgba(15, 15, 26, 0.8);
            --glass-border: rgba(255, 255, 255, 0.15);
            --glass-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            --success: #4dff4d;
            --warning: #ffcc00;
            --danger: #ff4d4d;
            --positive: #4dff4d;
            --negative: #ff4d4d;
            --card-gradient: linear-gradient(135deg, rgba(0,243,255,0.1) 0%, rgba(150,0,255,0.1) 100%);
            --transition-speed: 0.4s;
            --card-red: #ff3e3e;
            --card-black: #222;
            --premium-gold: #FFD700;
            --premium-glow: 0 0 15px rgba(255, 215, 0, 0.7);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
        
        body {
            background: var(--bg-dark);
            color: var(--text-light);
            min-height: 100vh;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(0, 243, 255, 0.1) 0%, transparent 20%),
                radial-gradient(circle at 80% 70%, rgba(255, 0, 230, 0.1) 0%, transparent 20%);
            overflow-x: hidden;
            padding-bottom: 80px;
        }
        
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
        }
        
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            position: relative;
            z-index: 10;
            padding-top: 10px;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--neon-primary), var(--neon-secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 0 15px rgba(0, 243, 255, 0.5);
            letter-spacing: 1px;
        }
        
        .balance-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: var(--glass-shadow);
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: float 6s ease-in-out infinite;
        }
        
        .balance-label {
            font-size: 0.9rem;
            color: var(--text-dim);
        }
        
        .balance-amount {
            font-size: 1.3rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--neon-primary), var(--neon-secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .premium-badge {
            background: linear-gradient(90deg, var(--premium-gold), #FFA500);
            color: var(--bg-darker);
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: bold;
            margin-left: 10px;
            box-shadow: var(--premium-glow);
            display: inline-flex;
            align-items: center;
        }
        
        .premium-badge i {
            margin-right: 5px;
        }
        
        .game-controls {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: var(--glass-shadow);
        }
        
        .control-group {
            margin-bottom: 15px;
        }
        
        .control-label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            color: var(--text-dim);
        }
        
        .input-group {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .input-group input {
            flex: 1;
            background: transparent;
            border: none;
            padding: 12px 15px;
            color: var(--text-light);
            font-size: 1rem;
        }
        
        .input-group .btn {
            background: rgba(0, 243, 255, 0.2);
            border: none;
            color: var(--neon-primary);
            padding: 0 15px;
            height: 100%;
            cursor: pointer;
            transition: var(--transition-speed);
        }
        
        .input-group .btn:hover {
            background: rgba(0, 243, 255, 0.3);
        }
        
        .quick-bet-buttons {
            display: flex;
            gap: 8px;
            margin-top: 10px;
            flex-wrap: wrap;
        }
        
        .quick-bet-btn {
            flex: 1;
            min-width: calc(25% - 6px);
            padding: 8px 5px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-light);
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.2s ease;
            text-align: center;
        }
        
        .quick-bet-btn:hover {
            background: rgba(0, 243, 255, 0.2);
            border-color: rgba(0, 243, 255, 0.3);
        }
        
        .quick-bet-btn.premium {
            background: rgba(255, 215, 0, 0.1);
            border-color: rgba(255, 215, 0, 0.3);
            color: var(--premium-gold);
        }
        
        .quick-bet-btn.premium:hover {
            background: rgba(255, 215, 0, 0.2);
        }
        
        .game-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        
        .game-btn {
            flex: 1;
            padding: 15px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            position: relative;
            overflow: hidden;
        }
        
        .game-btn::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                transparent 0%,
                rgba(255, 255, 255, 0.2) 50%,
                transparent 100%
            );
            transform: rotate(30deg);
            animation: shine 3s infinite;
            opacity: 0.5;
        }
        
        .btn-start {
            background: linear-gradient(90deg, var(--neon-primary), var(--neon-tertiary));
            color: var(--bg-dark);
        }
        
        .btn-start:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 243, 255, 0.3);
        }
        
        .btn-cashout {
            background: linear-gradient(90deg, var(--neon-quaternary), var(--neon-secondary));
            color: var(--bg-dark);
            display: none;
            animation: pulse-glow 1.5s infinite alternate;
        }
        
        .btn-cashout:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 204, 0, 0.5);
            animation: none;
        }
        
        .cashout-value {
            position: absolute;
            top: -25px;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--neon-quaternary);
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
            text-shadow: 0 0 5px rgba(255, 204, 0, 0.5);
        }
        
        .btn-cashout:hover .cashout-value {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Card Styles */
        .card-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .card-row {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            justify-content: center;
            width: 100%;
            overflow-x: auto;
            padding: 10px 0;
        }
        
        .card {
            width: 80px;
            height: 120px;
            background: white;
            border-radius: 8px;
            position: relative;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            flex-shrink: 0;
        }
        
        .card.active {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 243, 255, 0.3);
        }
        
        .card.red {
            color: var(--card-red);
        }
        
        .card.black {
            color: var(--card-black);
        }
        
        .card-value {
            position: absolute;
            font-size: 1rem;
            font-weight: bold;
        }
        
        .card-value.top {
            top: 5px;
            left: 5px;
        }
        
        .card-value.bottom {
            bottom: 5px;
            right: 5px;
            transform: rotate(180deg);
        }
        
        .card-suit {
            position: absolute;
            font-size: 2rem;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .card-back {
            background: linear-gradient(135deg, var(--neon-primary), var(--neon-secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }
        
        .guess-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
            justify-content: center;
        }
        
        .guess-btn {
            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .guess-btn.higher {
            background: linear-gradient(90deg, var(--success), #2ecc71);
            color: white;
        }
        
        .guess-btn.lower {
            background: linear-gradient(90deg, var(--danger), #e74c3c);
            color: white;
        }
        
        .guess-btn.same {
            background: linear-gradient(90deg, var(--warning), #f39c12);
            color: white;
        }
        
        .guess-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .guess-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
        }
        
        .multiplier-display {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 20px 0;
            background: linear-gradient(90deg, var(--neon-primary), var(--neon-secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
        }
        
        .multiplier-display.active {
            opacity: 1;
            transform: translateY(0);
            animation: pulse-text 1.5s infinite alternate;
        }
        
        .timer-display {
            text-align: center;
            font-size: 0.9rem;
            color: var(--text-dim);
            margin-bottom: 10px;
        }
        
        /* Auto Cashout Controls */
        .auto-cashout-container {
            margin-top: 15px;
            display: <?php echo $gameState ? 'none' : 'block'; ?>;
        }
        
        .auto-cashout-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        
        .auto-cashout-value {
            font-weight: bold;
            color: var(--neon-quaternary);
        }
        
        .auto-cashout-slider {
            width: 100%;
            -webkit-appearance: none;
            height: 6px;
            border-radius: 3px;
            background: rgba(255, 255, 255, 0.1);
            outline: none;
        }
        
        .auto-cashout-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: var(--neon-quaternary);
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        
        .auto-cashout-presets {
            display: flex;
            gap: 8px;
            margin-top: 10px;
        }
        
        .auto-cashout-preset {
            flex: 1;
            padding: 5px;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .auto-cashout-preset:hover {
            background: rgba(255, 204, 0, 0.1);
            border-color: rgba(255, 204, 0, 0.3);
        }
        
        .auto-cashout-preset.active {
            background: rgba(255, 204, 0, 0.2);
            border-color: var(--neon-quaternary);
            color: var(--neon-quaternary);
        }
        
        /* History Panel */
        .history-btn {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--neon-primary), var(--neon-secondary));
            color: var(--bg-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 5px 20px rgba(0, 243, 255, 0.3);
            cursor: pointer;
            z-index: 50;
            transition: all 0.3s ease;
            animation: pulse 2s infinite;
        }
        
        .history-panel {
            position: fixed;
            top: 0;
            right: -100%;
            width: 100%;
            max-width: 350px;
            height: 100%;
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-left: 1px solid var(--glass-border);
            z-index: 100;
            transition: all 0.5s ease;
            padding: 20px;
            overflow-y: auto;
        }
        
        .history-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .history-title {
            font-size: 1.2rem;
            font-weight: 600;
            background: linear-gradient(90deg, var(--neon-primary), var(--neon-secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .close-history {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .close-history:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(90deg);
        }
        
        .history-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .history-details {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .history-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .history-icon.win {
            background: rgba(77, 255, 77, 0.1);
            color: var(--success);
        }
        
        .history-icon.loss {
            background: rgba(255, 77, 77, 0.1);
            color: var(--danger);
        }
        
        .history-info {
            display: flex;
            flex-direction: column;
        }
        
        .history-type {
            font-weight: 600;
            margin-bottom: 2px;
        }
        
        .history-time {
            font-size: 0.8rem;
            color: var(--text-dim);
        }
        
        .history-duration {
            font-size: 0.7rem;
            color: var(--text-dim);
        }
        
        .history-amount {
            font-weight: 700;
        }
        
        .history-amount.win {
            color: var(--success);
        }
        
        .history-amount.loss {
            color: var(--danger);
        }
        
        /* Result Popups */
        .result-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 200;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s ease;
        }
        
        .result-popup.active {
            opacity: 1;
            visibility: visible;
        }
        
        .result-content {
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 30px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            position: relative;
            animation: popIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .result-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2.5rem;
        }
        
        .result-popup.win .result-icon {
            background: rgba(77, 255, 77, 0.1);
            color: var(--success);
            box-shadow: 0 0 30px rgba(77, 255, 77, 0.2);
        }
        
        .result-popup.loss .result-icon {
            background: rgba(255, 77, 77, 0.1);
            color: var(--danger);
            box-shadow: 0 0 30px rgba(255, 77, 77, 0.2);
        }
        
        .result-title {
            font-size: 1.8rem;
            margin-bottom: 10px;
            background: linear-gradient(90deg, var(--neon-primary), var(--neon-secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .result-amount {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .result-popup.win .result-amount {
            color: var(--success);
        }
        
        .result-popup.loss .result-amount {
            color: var(--danger);
        }
        
        .result-multiplier {
            font-size: 1.2rem;
            margin-bottom: 5px;
            color: var(--neon-quaternary);
        }
        
        .result-duration {
            font-size: 0.9rem;
            color: var(--text-dim);
            margin-bottom: 20px;
        }
        
        .result-cards {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .result-card {
            width: 60px;
            height: 90px;
            background: white;
            border-radius: 5px;
            position: relative;
        }
        
        .result-card.red {
            color: var(--card-red);
        }
        
        .result-card.black {
            color: var(--card-black);
        }
        
        .result-card-value {
            position: absolute;
            font-size: 0.9rem;
            font-weight: bold;
        }
        
        .result-card-value.top {
            top: 5px;
            left: 5px;
        }
        
        .result-card-value.bottom {
            bottom: 5px;
            right: 5px;
            transform: rotate(180deg);
        }
        
        .result-card-suit {
            position: absolute;
            font-size: 1.5rem;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .result-btn {
            background: linear-gradient(90deg, var(--neon-primary), var(--neon-tertiary));
            color: var(--bg-dark);
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 1rem;
        }
        
        .result-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 243, 255, 0.3);
        }
        
        .auto-cashout-badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background: var(--neon-quaternary);
            color: var(--bg-dark);
            font-size: 0.7rem;
            font-weight: bold;
            padding: 3px 8px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(255, 204, 0, 0.5);
        }
        
        /* Welcome Popup */
        .welcome-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s ease;
        }
        
        .welcome-popup.active {
            opacity: 1;
            visibility: visible;
        }
        
        .welcome-container {
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 25px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            position: relative;
            animation: popIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .welcome-close {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .welcome-close:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: rotate(90deg);
        }
        
        .welcome-header {
            margin-bottom: 20px;
        }
        
        .welcome-title {
            font-size: 1.5rem;
            margin-bottom: 5px;
            background: linear-gradient(90deg, var(--neon-primary), var(--neon-secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .welcome-subtitle {
            font-size: 0.9rem;
            color: var(--text-dim);
        }
        
        .welcome-image {
            width: 100%;
            height: 150px;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        
        .welcome-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .welcome-content {
            margin-bottom: 20px;
            font-size: 0.9rem;
            line-height: 1.5;
            color: var(--text-dim);
        }
        
        .welcome-bonus {
            background: rgba(0, 243, 255, 0.1);
            border: 1px solid rgba(0, 243, 255, 0.3);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .welcome-bonus-title {
            font-size: 0.8rem;
            color: var(--neon-primary);
            margin-bottom: 5px;
        }
        
        .welcome-bonus-amount {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--neon-primary), var(--neon-secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .welcome-btn {
            background: linear-gradient(90deg, var(--neon-primary), var(--neon-tertiary));
            color: var(--bg-dark);
            border: none;
            padding: 15px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 1rem;
        }
        
        .welcome-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 243, 255, 0.3);
        }
        
        /* Bottom Navbar */
        .bottom-navbar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-top: 1px solid var(--glass-border);
            display: flex;
            justify-content: space-around;
            padding: 12px 0;
            z-index: 50;
        }
        
        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--text-dim);
            text-decoration: none;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }
        
        .nav-item i {
            font-size: 1.2rem;
            margin-bottom: 3px;
        }
        
        .nav-item.active {
            color: var(--neon-primary);
        }
        
        .nav-item:hover {
            color: var(--text-light);
        }
        
        /* Animations */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(0, 243, 255, 0.4); }
            70% { box-shadow: 0 0 0 15px rgba(0, 243, 255, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 243, 255, 0); }
        }
        
        @keyframes pulse-glow {
            0% { box-shadow: 0 0 10px rgba(255, 204, 0, 0.5); transform: scale(1); }
            100% { box-shadow: 0 0 20px rgba(255, 204, 0, 0.8); transform: scale(1.02); }
        }
        
        @keyframes pulse-text {
            0% { text-shadow: 0 0 5px rgba(0, 243, 255, 0.5); }
            100% { text-shadow: 0 0 15px rgba(0, 243, 255, 0.8); }
        }
        
        @keyframes bounce {
            from { transform: translateY(0); }
            to { transform: translateY(-20px); }
        }
        
        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            50% { transform: translateX(10px); }
            75% { transform: translateX(-10px); }
            100% { transform: translateX(0); }
        }
        
        @keyframes shine {
            0% { transform: translateX(-100%) rotate(30deg); }
            100% { transform: translateX(100%) rotate(30deg); }
        }
        
        @keyframes popIn {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        
        /* Responsive adjustments */
        @media (max-width: 480px) {
            .card {
                width: 70px;
                height: 105px;
            }
            
            .card-suit {
                font-size: 1.8rem;
            }
            
            .guess-buttons {
                flex-direction: column;
            }
            
            .guess-btn {
                width: 100%;
            }
            
            .quick-bet-buttons {
                gap: 5px;
            }
            
            .quick-bet-btn {
                min-width: calc(33% - 4px);
                font-size: 0.7rem;
                padding: 6px 3px;
            }
        }
    </style>
</head>
<body>
    <!-- Welcome Popup -->
    <div class="welcome-popup <?php echo $showWelcomePopup ? 'active' : ''; ?>">
        <div class="welcome-container">
            <div class="welcome-close" id="welcomeClose">
                <i class="fas fa-times"></i>
            </div>
            <div class="welcome-header">
                <h2 class="welcome-title">Welcome to Hi-Lo!</h2>
                <p class="welcome-subtitle">Guess if the next card will be higher or lower</p>
            </div>
            <div class="welcome-image">
                <img src="https://images.unsplash.com/photo-1503551723145-6c040742065b?q=80&w=2370&auto=format&fit=crop" alt="Welcome">
            </div>
            <div class="welcome-content">
                <p>Test your intuition and prediction skills with this classic card game. Guess whether the next card will be higher, lower, or the same value as the current card.</p>
                <p>Each correct guess increases your multiplier - cash out anytime to secure your winnings!</p>
            </div>
            <div class="welcome-bonus">
                <div class="welcome-bonus-title">NEW PLAYER BONUS</div>
                <div class="welcome-bonus-amount">$10 FREE</div>
            </div>
            <button class="welcome-btn" id="closeWelcomePopup">LET'S PLAY</button>
        </div>
    </div>
    
    <div class="container">
        <header>
            <div class="logo">Chiken Road</div>
            <div class="balance-card">
                <div class="balance-label">BALANCE <?php if($isPremiumUser): ?><span class="premium-badge"><i class="fas fa-crown"></i> PREMIUM</span><?php endif; ?></div>
                <div class="balance-amount">$<?php echo number_format($currentUser['balance'], 2); ?></div>
            </div>
        </header>
        
        <?php if ($error): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" id="gameForm">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <input type="hidden" name="action" id="actionInput" value="start">
            <input type="hidden" name="choice" id="choiceInput" value="">
            <input type="hidden" name="auto_cashout" id="autoCashoutInput" value="0">
            
            <div class="game-controls">
                <div class="control-group">
                    <label class="control-label">BET AMOUNT</label>
                    <div class="input-group">
                        <input type="number" id="bet_amount" name="bet_amount" min="<?php echo $minBet; ?>" max="<?php echo $maxBet; ?>" value="<?php echo $minBet; ?>" step="0.01">
                        <button type="button" class="btn" onclick="document.getElementById('bet_amount').value = <?php echo $minBet; ?>">MIN</button>
                        <button type="button" class="btn" onclick="document.getElementById('bet_amount').value = <?php echo $maxBet; ?>">MAX</button>
                    </div>
                    
                    <div class="quick-bet-buttons">
                        <button type="button" class="quick-bet-btn" onclick="setBetAmount(10)">$10</button>
                        <button type="button" class="quick-bet-btn" onclick="setBetAmount(50)">$50</button>
                        <button type="button" class="quick-bet-btn" onclick="setBetAmount(100)">$100</button>
                        <button type="button" class="quick-bet-btn" onclick="setBetAmount(500)">$500</button>
                        <button type="button" class="quick-bet-btn <?php echo $isPremiumUser ? 'premium' : ''; ?>" onclick="setBetAmount(1000)" <?php echo !$isPremiumUser ? 'disabled title="Premium feature"' : ''; ?>>$1K</button>
                        <button type="button" class="quick-bet-btn <?php echo $isPremiumUser ? 'premium' : ''; ?>" onclick="setBetAmount(5000)" <?php echo !$isPremiumUser ? 'disabled title="Premium feature"' : ''; ?>>$5K</button>
                        <button type="button" class="quick-bet-btn <?php echo $isPremiumUser ? 'premium' : ''; ?>" onclick="setBetAmount(10000)" <?php echo !$isPremiumUser ? 'disabled title="Premium feature"' : ''; ?>>$10K</button>
                        <button type="button" class="quick-bet-btn <?php echo $isPremiumUser ? 'premium' : ''; ?>" onclick="setBetAmount(25000)" <?php echo !$isPremiumUser ? 'disabled title="Premium feature"' : ''; ?>>$25K</button>
                    </div>
                </div>
                
                <!-- Auto Cashout Controls -->
                <div class="auto-cashout-container" id="autoCashoutContainer">
                    <div class="control-label">
                        <span>AUTO CASHOUT</span>
                        <span class="auto-cashout-value" id="autoCashoutValue">OFF</span>
                    </div>
                    <input type="range" min="0" max="10" step="0.5" value="0" class="auto-cashout-slider" id="autoCashoutSlider">
                    <div class="auto-cashout-presets">
                        <div class="auto-cashout-preset" data-value="0">OFF</div>
                        <div class="auto-cashout-preset" data-value="2">2x</div>
                        <div class="auto-cashout-preset" data-value="5">5x</div>
                        <div class="auto-cashout-preset" data-value="10">10x</div>
                    </div>
                </div>
                
                <div class="game-buttons">
                    <button type="submit" class="game-btn btn-start" id="startBtn" <?php echo $gameState ? 'style="display:none;"' : ''; ?>>
                        <i class="fas fa-play"></i> START
                    </button>
                    <button type="button" class="game-btn btn-cashout" id="cashoutBtn" <?php echo !$gameState ? 'style="display:none;"' : ''; ?>>
                        <i class="fas fa-money-bill-wave"></i> CASHOUT
                        <div class="cashout-value" id="cashoutValue">$<?php echo isset($gameState) ? number_format($gameState['bet_amount'] * $gameState['current_multiplier'], 2) : '0.00'; ?></div>
                    </button>
                </div>
            </div>
        </form>
        
        <?php if ($gameState): ?>
            <div class="timer-display" id="timerDisplay">
                Game duration: <span id="gameTimer"><?php echo gmdate("i:s", $gameDuration); ?></span>
            </div>
        <?php endif; ?>
        
        <div class="multiplier-display <?php echo $gameState ? 'active' : ''; ?>" id="multiplierDisplay">
            Multiplier: <span id="currentMultiplier"><?php echo number_format($currentMultiplier, 2); ?>x</span>
        </div>
        
        <div class="card-container">
            <!-- Card History Row -->
            <?php if (!empty($cardHistory)): ?>
                <div class="card-row">
                    <?php foreach ($cardHistory as $index => $card): ?>
                        <div class="card <?php echo ($card['suit'] === 'hearts' || $card['suit'] === 'diamonds') ? 'red' : 'black'; ?> <?php echo $index === count($cardHistory) - 1 ? 'active' : ''; ?>">
                            <div class="card-value top"><?php echo $card['value']; ?></div>
                            <div class="card-suit">
                                <?php 
                                $suitSymbol = '';
                                switch($card['suit']) {
                                    case 'hearts': $suitSymbol = '♥'; break;
                                    case 'diamonds': $suitSymbol = '♦'; break;
                                    case 'clubs': $suitSymbol = '♣'; break;
                                    case 'spades': $suitSymbol = '♠'; break;
                                }
                                echo $suitSymbol;
                                ?>
                            </div>
                            <div class="card-value bottom"><?php echo $card['value']; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($gameState && $currentCard): ?>
                <div class="guess-buttons">
                    <button type="button" class="guess-btn lower" onclick="makeGuess('lower')">
                        <i class="fas fa-arrow-down"></i> LOWER
                    </button>
                    <button type="button" class="guess-btn same" onclick="makeGuess('same')">
                        <i class="fas fa-equals"></i> SAME
                    </button>
                    <button type="button" class="guess-btn higher" onclick="makeGuess('higher')">
                        <i class="fas fa-arrow-up"></i> HIGHER
                    </button>
                </div>
            <?php elseif (!$gameState): ?>
                <div class="card card-back">
                    <i class="fas fa-question"></i>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Floating History Button -->
    <div class="history-btn" id="historyBtn">
        <i class="fas fa-history"></i>
    </div>
    
    <!-- History Panel -->
    <div class="history-panel" id="historyPanel">
        <div class="history-header">
            <div class="history-title">GAME HISTORY</div>
            <div class="close-history" id="closeHistory">
                <i class="fas fa-times"></i>
            </div>
        </div>
        
        <div id="historyItems">
            <?php foreach (array_reverse($gameHistory) as $item): ?>
                <div class="history-item">
                    <div class="history-details">
                        <div class="history-icon <?php echo $item['type']; ?>">
                            <i class="fas fa-<?php echo $item['type'] === 'win' ? 'trophy' : 'bomb'; ?>"></i>
                        </div>
                        <div class="history-info">
                            <div class="history-type"><?php echo ucfirst($item['type']); ?></div>
                            <div class="history-time"><?php echo date('M d, H:i', $item['time']); ?></div>
                            <div class="history-duration"><?php echo gmdate("i:s", $item['duration']); ?></div>
                        </div>
                    </div>
                    <div class="history-amount <?php echo $item['type']; ?>">
                        <?php echo $item['type'] === 'win' ? '+' : '-'; ?>$<?php echo number_format($item['amount'], 2); ?>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <?php if (empty($gameHistory)): ?>
                <div style="text-align: center; padding: 40px 0; color: var(--text-dim);">
                    <i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 10px;"></i>
                    <p>No game history yet</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Win/Loss Popups -->
    <?php if ($winPopup): ?>
        <div class="result-popup win active" id="winPopup">
            <div class="result-content">
                <div class="result-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <h2 class="result-title">YOU WON!</h2>
                <div class="result-amount">+$<?php echo number_format($lastResult['amount'], 2); ?></div>
                <div class="result-multiplier"><?php echo number_format($lastResult['multiplier'], 2); ?>x Multiplier</div>
                <div class="result-duration">Game duration: <?php echo gmdate("i:s", $lastResult['duration']); ?></div>
                
                <?php if (isset($lastResult['auto_cashout']) && $lastResult['auto_cashout']): ?>
                    <div class="auto-cashout-badge">AUTO CASHOUT</div>
                <?php endif; ?>
                
                <?php if (!empty($lastResult['cards'])): ?>
                    <div class="result-cards">
                        <?php foreach ($lastResult['cards'] as $card): ?>
                            <div class="result-card <?php echo ($card['suit'] === 'hearts' || $card['suit'] === 'diamonds') ? 'red' : 'black'; ?>">
                                <div class="result-card-value top"><?php echo $card['value']; ?></div>
                                <div class="result-card-suit">
                                    <?php 
                                    $suitSymbol = '';
                                    switch($card['suit']) {
                                        case 'hearts': $suitSymbol = '♥'; break;
                                        case 'diamonds': $suitSymbol = '♦'; break;
                                        case 'clubs': $suitSymbol = '♣'; break;
                                        case 'spades': $suitSymbol = '♠'; break;
                                    }
                                    echo $suitSymbol;
                                    ?>
                                </div>
                                <div class="result-card-value bottom"><?php echo $card['value']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <button class="result-btn" id="closeWinPopup">CONTINUE</button>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if ($lossPopup): ?>
        <div class="result-popup loss active" id="lossPopup">
            <div class="result-content">
                <div class="result-icon">
                    <i class="fas fa-bomb"></i>
                </div>
                <h2 class="result-title">GAME OVER!</h2>
                <div class="result-amount">-$<?php echo number_format($lastResult['amount'], 2); ?></div>
                <div class="result-multiplier"><?php echo number_format($lastResult['multiplier'], 2); ?>x Multiplier</div>
                <div class="result-duration">Game duration: <?php echo gmdate("i:s", $lastResult['duration']); ?></div>
                
                <?php if (!empty($lastResult['cards'])): ?>
                    <div class="result-cards">
                        <?php 
                        // Show first and last cards
                        $cardsToShow = [$lastResult['cards'][0], end($lastResult['cards'])]; 
                        foreach ($cardsToShow as $card): ?>
                            <div class="result-card <?php echo ($card['suit'] === 'hearts' || $card['suit'] === 'diamonds') ? 'red' : 'black'; ?>">
                                <div class="result-card-value top"><?php echo $card['value']; ?></div>
                                <div class="result-card-suit">
                                    <?php 
                                    $suitSymbol = '';
                                    switch($card['suit']) {
                                        case 'hearts': $suitSymbol = '♥'; break;
                                        case 'diamonds': $suitSymbol = '♦'; break;
                                        case 'clubs': $suitSymbol = '♣'; break;
                                        case 'spades': $suitSymbol = '♠'; break;
                                    }
                                    echo $suitSymbol;
                                    ?>
                                </div>
                                <div class="result-card-value bottom"><?php echo $card['value']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <button class="result-btn" id="closeLossPopup">TRY AGAIN</button>
            </div>
        </div>
    <?php endif; ?>
    
    <!-- Bottom Navbar -->
    <div class="bottom-navbar">
        <a href="index.php" class="nav-item">
            <i class="fas fa-home"></i>
            <span>Home</span>
        </a>
       
        </a>
        <a href="refer.php" class="nav-item">
            <i class="fas fa-chart-line"></i>
            <span>Trading</span>
        </a>
        <a href="kyc.php" class="nav-item active">
            <i class="fas fa-user"></i>
            <span>Account</span>
        </a>
        <a href="main.php" class="nav-item">
            <i class="fas fa-gamepad"></i>
            <span>Games</span>
        </a>
    </div>
    
    <script>
        // Game variables
        let gameActive = <?php echo $gameState ? 'true' : 'false'; ?>;
        let multiplierUpdateInterval;
        let timerInterval;
        
        // DOM elements
        const gameForm = document.getElementById('gameForm');
        const actionInput = document.getElementById('actionInput');
        const choiceInput = document.getElementById('choiceInput');
        const startBtn = document.getElementById('startBtn');
        const cashoutBtn = document.getElementById('cashoutBtn');
        const cashoutValue = document.getElementById('cashoutValue');
        const multiplierDisplay = document.getElementById('multiplierDisplay');
        const currentMultiplierSpan = document.getElementById('currentMultiplier');
        const historyBtn = document.getElementById('historyBtn');
        const historyPanel = document.getElementById('historyPanel');
        const closeHistory = document.getElementById('closeHistory');
        const winPopup = document.getElementById('winPopup');
        const lossPopup = document.getElementById('lossPopup');
        const closeWinPopup = document.getElementById('closeWinPopup');
        const closeLossPopup = document.getElementById('closeLossPopup');
        const welcomePopup = document.getElementById('welcomeClose');
        const closeWelcomePopup = document.getElementById('closeWelcomePopup');
        const timerDisplay = document.getElementById('timerDisplay');
        const gameTimer = document.getElementById('gameTimer');
        const betAmountInput = document.getElementById('bet_amount');
        const autoCashoutContainer = document.getElementById('autoCashoutContainer');
        const autoCashoutSlider = document.getElementById('autoCashoutSlider');
        const autoCashoutValue = document.getElementById('autoCashoutValue');
        const autoCashoutInput = document.getElementById('autoCashoutInput');
        const autoCashoutPresets = document.querySelectorAll('.auto-cashout-preset');
        
        // Initialize game
        initGame();
        
        function initGame() {
            // Bet amount validation
            betAmountInput.addEventListener('input', () => {
                let value = parseFloat(betAmountInput.value);
                if (isNaN(value)) value = <?php echo $minBet; ?>;
                if (value < <?php echo $minBet; ?>) value = <?php echo $minBet; ?>;
                if (value > <?php echo $maxBet; ?>) value = <?php echo $maxBet; ?>;
                betAmountInput.value = value.toFixed(2);
                
                // Update cashout value if game is active
                if (gameActive) {
                    updateCashoutValue();
                }
            });
            
            // Cashout button
            cashoutBtn.addEventListener('click', () => {
                if (gameActive) {
                    actionInput.value = 'cashout';
                    gameForm.submit();
                }
            });
            
            // History panel toggle
            historyBtn.addEventListener('click', toggleHistory);
            closeHistory.addEventListener('click', toggleHistory);
            
            // Close popups
            if (closeWinPopup) {
                closeWinPopup.addEventListener('click', () => {
                    winPopup.classList.remove('active');
                });
            }
            
            if (closeLossPopup) {
                closeLossPopup.addEventListener('click', () => {
                    lossPopup.classList.remove('active');
                });
            }
            
            if (closeWelcomePopup) {
                closeWelcomePopup.addEventListener('click', () => {
                    document.querySelector('.welcome-popup').classList.remove('active');
                });
            }
            
            if (welcomePopup) {
                welcomePopup.addEventListener('click', () => {
                    document.querySelector('.welcome-popup').classList.remove('active');
                });
            }
            
            // Auto cashout slider
            autoCashoutSlider.addEventListener('input', function() {
                const value = parseFloat(this.value);
                autoCashoutInput.value = value;
                
                if (value === 0) {
                    autoCashoutValue.textContent = 'OFF';
                } else {
                    autoCashoutValue.textContent = value.toFixed(1) + 'x';
                }
                
                // Update active preset
                autoCashoutPresets.forEach(preset => {
                    preset.classList.remove('active');
                    if (parseFloat(preset.dataset.value) === value) {
                        preset.classList.add('active');
                    }
                });
            });
            
            // Auto cashout presets
            autoCashoutPresets.forEach(preset => {
                preset.addEventListener('click', function() {
                    const value = parseFloat(this.dataset.value);
                    autoCashoutSlider.value = value;
                    autoCashoutInput.value = value;
                    
                    if (value === 0) {
                        autoCashoutValue.textContent = 'OFF';
                    } else {
                        autoCashoutValue.textContent = value.toFixed(1) + 'x';
                    }
                    
                    // Update active preset
                    autoCashoutPresets.forEach(p => p.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Start multiplier update interval if game is active
            if (gameActive) {
                autoCashoutContainer.style.display = 'none';
                startMultiplierUpdate();
                startGameTimer();
            }
        }
        
        function makeGuess(choice) {
            if (gameActive) {
                choiceInput.value = choice;
                actionInput.value = 'guess';
                gameForm.submit();
            }
        }
        
        function setBetAmount(amount) {
            betAmountInput.value = amount;
            updateCashoutValue();
        }
        
        function startMultiplierUpdate() {
            // Clear any existing interval
            if (multiplierUpdateInterval) {
                clearInterval(multiplierUpdateInterval);
            }
            
            // Update cashout value every 100ms for smooth animation
            multiplierUpdateInterval = setInterval(() => {
                updateCashoutValue();
            }, 100);
        }
        
        function startGameTimer() {
            let seconds = <?php echo $gameDuration; ?>;
            if (timerInterval) clearInterval(timerInterval);
            
            timerInterval = setInterval(() => {
                seconds++;
                const minutes = Math.floor(seconds / 60);
                const remainingSeconds = seconds % 60;
                gameTimer.textContent = `${minutes.toString().padStart(2, '0')}:${remainingSeconds.toString().padStart(2, '0')}`;
            }, 1000);
        }
        
        function updateCashoutValue() {
            const betAmount = parseFloat(betAmountInput.value) || <?php echo $minBet; ?>;
            const multiplier = parseFloat(currentMultiplierSpan.textContent) || 1.0;
            const cashoutAmount = betAmount * multiplier;
            cashoutValue.textContent = '$' + cashoutAmount.toFixed(2);
        }
        
        function toggleHistory() {
            historyPanel.classList.toggle('active');
        }
        
        // Clean up intervals when leaving page
        window.addEventListener('beforeunload', () => {
            if (multiplierUpdateInterval) {
                clearInterval(multiplierUpdateInterval);
            }
            if (timerInterval) {
                clearInterval(timerInterval);
            }
        });
        
        // Auto-close welcome popup after 10 seconds
        setTimeout(() => {
            const welcome = document.querySelector('.welcome-popup');
            if (welcome && welcome.classList.contains('active')) {
                welcome.classList.remove('active');
            }
        }, 10000);
    </script>
</body>
</html>