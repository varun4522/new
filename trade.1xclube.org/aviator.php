<?php
// Enable full error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Start session at the very top
session_start();

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'zewinsbs_chiken');
define('DB_PASS', 'zewinsbs_chiken');
define('DB_NAME', 'zewinsbs_chiken');

// Game Settings
define('WIN_CHANCE', 0.38); // 38% win chance
define('WIN_MULTIPLIER', 1.8); // 1.8x payout
define('EARLY_PENALTY', 0.2); // 20% early cashout penalty
define('VOLATILITY', 0.5); // Price movement factor

// Initialize variables
$msg = '';
$user = null;
$current_price = 27500;
$show_popup = false;
$popup_data = [];

try {
    // Database connection with error handling
    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($db->connect_error) {
        throw new Exception("Database connection failed: " . $db->connect_error);
    }

    // Set timezone
    date_default_timezone_set('Asia/Kolkata');

    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    // Get user data with prepared statement
    $user_id = (int)$_SESSION['user_id'];
    $user_stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    if (!$user_stmt) throw new Exception("Prepare failed: " . $db->error);
    $user_stmt->bind_param("i", $user_id);
    if (!$user_stmt->execute()) throw new Exception("Execute failed: " . $user_stmt->error);
    $user = $user_stmt->get_result()->fetch_assoc();

    if (!$user) {
        session_destroy();
        header("Location: login.php");
        exit();
    }

    // Create tables if they don't exist
    $tables = [
        "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            balance DECIMAL(10,2) DEFAULT 1000.00,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB",
        
        "CREATE TABLE IF NOT EXISTS trades (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            wager DECIMAL(10,2) NOT NULL,
            direction ENUM('up','down') NOT NULL,
            duration INT NOT NULL,
            start_price DECIMAL(10,2) NOT NULL,
            end_price DECIMAL(10,2) DEFAULT NULL,
            result ENUM('win','lose','pending','cashed') DEFAULT 'pending',
            payout DECIMAL(10,2) DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
        ) ENGINE=InnoDB"
    ];

    foreach ($tables as $table) {
        if (!$db->query($table)) {
            throw new Exception("Table creation failed: " . $db->error);
        }
    }

    // Handle form submissions
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Place new trade
        if (isset($_POST['direction'])) {
            $wager = (float)$_POST['wager'];
            $direction = $_POST['direction'] === 'up' ? 'up' : 'down';
            $duration = (int)$_POST['duration'];
            $current_price = (float)$_POST['current_price'];
            
            // Validation
            if ($wager < 10 || $wager > $user['balance']) {
                $msg = "Invalid wager amount!";
            } elseif (!in_array($duration, [10, 30, 60])) {
                $msg = "Invalid duration!";
            } else {
                $db->begin_transaction();
                try {
                    // Deduct balance
                    $update = $db->query("UPDATE users SET balance = balance - $wager WHERE id = $user_id AND balance >= $wager");
                    if ($db->affected_rows === 0) throw new Exception("Insufficient balance!");
                    
                    // Create trade
                    $stmt = $db->prepare("INSERT INTO trades (user_id, wager, direction, duration, start_price) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("idsid", $user_id, $wager, $direction, $duration, $current_price);
                    if (!$stmt->execute()) throw new Exception("Failed to create trade!");
                    
                    $db->commit();
                    $msg = "Trade placed successfully!";
                } catch (Exception $e) {
                    $db->rollback();
                    $msg = $e->getMessage();
                }
            }
        }
        
        // Handle cashout
        if (isset($_POST['cashout'])) {
            $trade_id = (int)$_POST['trade_id'];
            $db->begin_transaction();
            try {
                // Get trade details with lock
                $trade = $db->query("SELECT * FROM trades WHERE id = $trade_id AND user_id = $user_id AND result = 'pending' FOR UPDATE")->fetch_assoc();
                if (!$trade) throw new Exception("Invalid trade!");
                
                // Calculate price movement
                $elapsed = time() - strtotime($trade['created_at']);
                $progress = min(1, $elapsed / $trade['duration']);
                $volatility = $trade['duration'] * VOLATILITY;
                
                // Determine direction based on win chance
                $win = (mt_rand(1, 100) <= WIN_CHANCE * 100);
                $direction = $win ? ($trade['direction'] === 'up' ? 1 : -1) : ($trade['direction'] === 'up' ? -1 : 1);
                
                // Calculate final price
                $price_change = $direction * $volatility * $progress;
                $end_price = $trade['start_price'] + $price_change;
                
                // Calculate payout with penalty
                $penalty = $progress < 1 ? EARLY_PENALTY : 0;
                $payout = $win ? $trade['wager'] * (WIN_MULTIPLIER - $penalty) : 0;
                
                // Update trade
                $db->query("UPDATE trades SET end_price = $end_price, result = 'cashed', payout = $payout WHERE id = $trade_id");
                
                // Update balance if won
                if ($win) {
                    $db->query("UPDATE users SET balance = balance + $payout WHERE id = $user_id");
                }
                
                $db->commit();
                
                // Set popup data
                $popup_data = [
                    'result' => $win ? 'win' : 'lose',
                    'payout' => $payout,
                    'wager' => $trade['wager'],
                    'direction' => $trade['direction'],
                    'start_price' => $trade['start_price'],
                    'end_price' => $end_price,
                    'early' => $progress < 1,
                    'progress' => round($progress * 100)
                ];
                $show_popup = true;
                $msg = "Trade cashed out successfully!";
            } catch (Exception $e) {
                $db->rollback();
                $msg = $e->getMessage();
            }
        }
    }

    // Process expired trades
    $expired_trades = $db->query("SELECT * FROM trades WHERE user_id = $user_id AND result = 'pending' AND created_at < NOW() - INTERVAL duration SECOND");
    while ($trade = $expired_trades->fetch_assoc()) {
        $db->begin_transaction();
        try {
            // Calculate price movement
            $volatility = $trade['duration'] * VOLATILITY;
            $win = (mt_rand(1, 100) <= WIN_CHANCE * 100);
            $direction = $win ? ($trade['direction'] === 'up' ? 1 : -1) : ($trade['direction'] === 'up' ? -1 : 1);
            $price_change = $direction * $volatility;
            $end_price = $trade['start_price'] + $price_change;
            $payout = $win ? $trade['wager'] * WIN_MULTIPLIER : 0;
            
            // Update trade
            $db->query("UPDATE trades SET end_price = $end_price, result = '" . ($win ? 'win' : 'lose') . "', payout = $payout WHERE id = {$trade['id']}");
            
            // Update balance if won
            if ($win) {
                $db->query("UPDATE users SET balance = balance + $payout WHERE id = $user_id");
            }
            
            $db->commit();
            
            // Set popup for most recent trade
            if (!$show_popup) {
                $popup_data = [
                    'result' => $win ? 'win' : 'lose',
                    'payout' => $payout,
                    'wager' => $trade['wager'],
                    'direction' => $trade['direction'],
                    'start_price' => $trade['start_price'],
                    'end_price' => $end_price,
                    'early' => false
                ];
                $show_popup = true;
            }
        } catch (Exception $e) {
            $db->rollback();
            error_log("Error processing trade: " . $e->getMessage());
        }
    }

    // Get active trades
    $active_trades = $db->query("SELECT * FROM trades WHERE user_id = $user_id AND result = 'pending' ORDER BY created_at DESC");

    // Get trade history
    $history = $db->query("SELECT * FROM trades WHERE user_id = $user_id AND result != 'pending' ORDER BY created_at DESC LIMIT 10");

    // Generate realistic price
    $base_price = 27500;
    $time_factor = time() / 300;
    $price_variation = (sin($time_factor) + 0.5 * sin($time_factor * 3)) * 200;
    $current_price = $base_price + $price_variation + (rand(-50, 50) / 10);

    // Refresh user data
    $user_stmt->execute();
    $user = $user_stmt->get_result()->fetch_assoc();

} catch (Exception $e) {
    $msg = "System error: " . $e->getMessage();
    error_log($msg);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Trading Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --dark: #1e293b;
            --darker: #0f172a;
            --light: #f8fafc;
            --card-bg: #1e293b;
            --card-border: #334155;
            --glass-bg: rgba(30, 41, 59, 0.7);
            --glass-border: rgba(255, 255, 255, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background: var(--darker);
            color: var(--light);
            min-height: 100vh;
            padding-bottom: 80px;
            overflow-x: hidden;
            background-image: 
                radial-gradient(at 80% 0%, hsla(189, 100%, 56%, 0.1) 0px, transparent 50%),
                radial-gradient(at 0% 50%, hsla(355, 100%, 93%, 0.1) 0px, transparent 50%);
        }
        
        .container {
            max-width: 480px;
            margin: 0 auto;
            padding: 1rem;
            position: relative;
        }
        
        /* Header Styles */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-top: 0.5rem;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-shadow: 0 0 10px rgba(99, 102, 241, 0.3);
        }
        
        .logo i {
            font-size: 1.8rem;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .user-id {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 0.5rem 0.8rem;
            border-radius: 2rem;
            font-size: 0.9rem;
            font-weight: 500;
            border: 1px solid var(--glass-border);
        }
        
        /* Balance Card */
        .balance-card {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.3);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .balance-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 70%);
            transform: rotate(30deg);
            pointer-events: none;
        }
        
        .balance-title {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .balance-amount {
            font-size: 2rem;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }
        
        /* Chart Container */
        .chart-container {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 1rem;
            padding: 1.25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }
        
        .chart-title {
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .chart-price {
            font-size: 1.1rem;
            font-weight: 700;
            transition: color 0.3s ease;
        }
        
        .chart {
            height: 160px;
            width: 100%;
            position: relative;
        }
        
        /* Trade Form */
        .trade-form {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .form-group {
            margin-bottom: 1.2rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: rgba(248, 250, 252, 0.8);
        }
        
        .form-input {
            width: 100%;
            padding: 1rem;
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid var(--glass-border);
            border-radius: 0.75rem;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.3);
        }
        
        .duration-selector {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 1.2rem;
        }
        
        .duration-btn {
            flex: 1;
            padding: 0.75rem;
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid var(--glass-border);
            border-radius: 0.75rem;
            color: white;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .duration-btn:hover {
            border-color: var(--primary);
        }
        
        .duration-btn.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
            box-shadow: 0 0 10px rgba(99, 102, 241, 0.5);
        }
        
        .trade-buttons {
            display: flex;
            gap: 0.75rem;
        }
        
        .trade-btn {
            flex: 1;
            padding: 1rem;
            border: none;
            border-radius: 0.75rem;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }
        
        .trade-btn:active {
            transform: scale(0.98);
        }
        
        .trade-btn.up {
            background: linear-gradient(135deg, var(--success), #0d9d6e);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        
        .trade-btn.up:hover {
            background: linear-gradient(135deg, #0ea371, #0c8a60);
        }
        
        .trade-btn.down {
            background: linear-gradient(135deg, var(--danger), #dc2626);
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        }
        
        .trade-btn.down:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
        }
        
        .trade-btn .shine {
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: linear-gradient(
                to right,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.3) 100%
            );
            transform: skewX(-25deg);
            transition: all 0.5s ease;
        }
        
        .trade-btn:hover .shine {
            left: 150%;
        }
        
        /* Active Trades & History */
        .section-container {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
        
        .section-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(248, 250, 252, 0.9);
        }
        
        .trade-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid rgba(51, 65, 85, 0.5);
        }
        
        .trade-item:last-child {
            border-bottom: none;
        }
        
        .trade-direction {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .trade-direction.up {
            background: rgba(16, 185, 129, 0.15);
            color: var(--success);
        }
        
        .trade-direction.down {
            background: rgba(239, 68, 68, 0.15);
            color: var(--danger);
        }
        
        .trade-details {
            flex: 1;
            padding: 0 1rem;
        }
        
        .trade-amount {
            font-weight: 600;
            margin-bottom: 0.2rem;
        }
        
        .trade-time {
            font-size: 0.8rem;
            color: rgba(248, 250, 252, 0.6);
        }
        
        .progress-container {
            margin-top: 0.5rem;
        }
        
        .progress-bar {
            height: 4px;
            background: rgba(248, 250, 252, 0.1);
            border-radius: 2px;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            transition: width 0.5s ease;
        }
        
        .trade-action {
            display: flex;
            gap: 0.5rem;
        }
        
        .cashout-btn {
            padding: 0.5rem 1rem;
            background: var(--warning);
            border: none;
            border-radius: 0.5rem;
            color: var(--darker);
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .cashout-btn:hover {
            background: #e69009;
            box-shadow: 0 0 10px rgba(245, 158, 11, 0.3);
        }
        
        .trade-result {
            font-weight: 600;
            font-size: 0.9rem;
            text-align: right;
            min-width: 80px;
        }
        
        .text-success {
            color: var(--success);
        }
        
        .text-danger {
            color: var(--danger);
        }
        
        .text-warning {
            color: var(--warning);
        }
        
        /* Message Alerts */
        .alert {
            padding: 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: 500;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .alert-success {
            background: rgba(16, 185, 129, 0.15);
            color: var(--success);
            border: 1px solid rgba(16, 185, 129, 0.3);
        }
        
        .alert-error {
            background: rgba(239, 68, 68, 0.15);
            color: var(--danger);
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        
        /* Result Popup */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            display: none;
            backdrop-filter: blur(5px);
        }
        
        .result-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: var(--card-bg);
            border-radius: 1.25rem;
            padding: 2rem;
            width: 90%;
            max-width: 360px;
            text-align: center;
            z-index: 1001;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            display: none;
            animation: popupFadeIn 0.3s ease-out;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        @keyframes popupFadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -40%);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }
        
        .result-popup.win {
            border: 1px solid var(--success);
            box-shadow: 0 0 30px rgba(16, 185, 129, 0.3);
        }
        
        .result-popup.lose {
            border: 1px solid var(--danger);
            box-shadow: 0 0 30px rgba(239, 68, 68, 0.3);
        }
        
        .result-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
        }
        
        .result-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .result-subtitle {
            font-size: 0.9rem;
            color: rgba(248, 250, 252, 0.7);
            margin-bottom: 1.5rem;
        }
        
        .result-amount {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }
        
        .result-details {
            background: rgba(15, 23, 42, 0.5);
            border-radius: 0.75rem;
            padding: 1.25rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .result-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            font-size: 0.9rem;
        }
        
        .result-row:last-child {
            margin-bottom: 0;
        }
        
        .result-label {
            color: rgba(248, 250, 252, 0.7);
        }
        
        .result-value {
            font-weight: 500;
        }
        
        .close-btn {
            width: 100%;
            padding: 1rem;
            background: var(--primary);
            border: none;
            border-radius: 0.75rem;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease;
        }
        
        .close-btn:hover {
            background: var(--primary-dark);
            box-shadow: 0 0 10px rgba(99, 102, 241, 0.5);
        }
        
        /* Bottom Navigation */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-top: 1px solid var(--glass-border);
            display: flex;
            justify-content: space-around;
            padding: 0.75rem 0;
            z-index: 999;
        }
        
        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            color: rgba(248, 250, 252, 0.6);
            text-decoration: none;
            font-size: 0.8rem;
            transition: all 0.2s ease;
        }
        
        .nav-item i {
            font-size: 1.2rem;
            margin-bottom: 0.25rem;
        }
        
        .nav-item.active {
            color: var(--primary);
            transform: translateY(-5px);
        }
        
        .nav-item.active i {
            color: var(--primary);
        }
        
        /* History Button */
        .history-btn {
            position: fixed;
            bottom: 80px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
            cursor: pointer;
            z-index: 998;
            transition: all 0.3s ease;
            border: none;
            animation: float 3s ease-in-out infinite;
        }
        
        .history-btn:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 15px 30px rgba(79, 70, 229, 0.4);
        }
        
        /* History Panel */
        .history-panel {
            position: fixed;
            bottom: 150px;
            right: 20px;
            width: 320px;
            max-height: 400px;
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            z-index: 997;
            transform: translateY(20px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            border: 1px solid var(--glass-border);
            overflow-y: auto;
        }
        
        .history-panel.show {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }
        
        .history-panel .section-title {
            margin-bottom: 1rem;
        }
        
        /* Animations */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
            100% { transform: translateY(0px); }
        }
        
        .floating {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }
        
        .pulse {
            animation: pulse 2s ease-in-out infinite;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 400px) {
            .container {
                padding: 0.75rem;
            }
            
            .balance-card, 
            .chart-container,
            .trade-form,
            .section-container {
                padding: 1.25rem;
            }
            
            .trade-buttons {
                flex-direction: column;
            }
            
            .history-panel {
                width: calc(100% - 40px);
                right: 20px;
                left: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <i class="fas fa-chart-line"></i>
                <span>CRYPTOFX</span>
            </div>
            <div class="user-info">
                <div class="user-id">ID: <?= $user_id ?></div>
            </div>
        </div>
        
        <?php if ($msg): ?>
            <div class="alert <?= strpos($msg, 'successfully') !== false ? 'alert-success' : 'alert-error' ?>">
                <?= htmlspecialchars($msg) ?>
            </div>
        <?php endif; ?>
        
        <div class="balance-card floating">
            <div class="balance-title">
                <i class="fas fa-wallet"></i>
                YOUR BALANCE
            </div>
            <div class="balance-amount" id="userBalance">₹<?= number_format($user['balance'], 2) ?></div>
        </div>
        
        <div class="chart-container">
            <div class="chart-header">
                <div class="chart-title">
                    <i class="fab fa-bitcoin"></i>
                    BTC/USDT
                </div>
                <div class="chart-price" id="currentPrice">₹<?= number_format($current_price, 2) ?></div>
            </div>
            <div class="chart" id="priceChart"></div>
        </div>
        
        <form method="POST" class="trade-form">
            <input type="hidden" name="current_price" id="tradePrice" value="<?= $current_price ?>">
            
            <div class="form-group">
                <label class="form-label">Trade Amount (₹)</label>
                <input type="number" name="wager" class="form-input" placeholder="100" min="10" max="<?= $user['balance'] ?>" step="10" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Trade Duration</label>
                <div class="duration-selector">
                    <div class="duration-btn active" data-duration="10">10 Seconds</div>
                    <div class="duration-btn" data-duration="30">30 Seconds</div>
                    <div class="duration-btn" data-duration="60">60 Seconds</div>
                </div>
                <input type="hidden" name="duration" id="durationInput" value="10">
            </div>
            
            <div class="trade-buttons">
                <button type="submit" name="direction" value="up" class="trade-btn up pulse">
                    <i class="fas fa-arrow-up"></i> UP TRADE
                    <span class="shine"></span>
                </button>
                <button type="submit" name="direction" value="down" class="trade-btn down pulse">
                    <i class="fas fa-arrow-down"></i> DOWN TRADE
                    <span class="shine"></span>
                </button>
            </div>
        </form>
        
        <?php if ($active_trades && $active_trades->num_rows > 0): ?>
            <div class="section-container">
                <div class="section-title">
                    <i class="fas fa-clock"></i>
                    ACTIVE TRADES
                </div>
                
                <?php while ($trade = $active_trades->fetch_assoc()): 
                    $elapsed = time() - strtotime($trade['created_at']);
                    $progress = min(100, ($elapsed / $trade['duration']) * 100);
                    $remaining = max(0, $trade['duration'] - $elapsed);
                ?>
                    <div class="trade-item" data-trade-id="<?= $trade['id'] ?>">
                        <div class="trade-direction <?= $trade['direction'] ?>">
                            <?= $trade['direction'] === 'up' ? '↑' : '↓' ?>
                        </div>
                        <div class="trade-details">
                            <div class="trade-amount">₹<?= number_format($trade['wager'], 2) ?></div>
                            <div class="trade-time">
                                <?= date('H:i', strtotime($trade['created_at'])) ?> • 
                                <span class="trade-remaining"><?= $remaining ?></span>s remaining
                            </div>
                            <div class="progress-container">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width:<?= $progress ?>%; background:<?= $trade['direction'] === 'up' ? 'var(--success)' : 'var(--danger)' ?>"></div>
                                </div>
                            </div>
                        </div>
                        <div class="trade-action">
                            <form method="POST">
                                <input type="hidden" name="trade_id" value="<?= $trade['id'] ?>">
                                <button type="submit" name="cashout" value="1" class="cashout-btn">
                                    CASHOUT
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- Floating History Button -->
    <button class="history-btn" id="historyBtn">
        <i class="fas fa-history"></i>
    </button>
    
    <!-- History Panel -->
    <div class="history-panel" id="historyPanel">
        <div class="section-title">
            <i class="fas fa-history"></i>
            TRADE HISTORY
        </div>
        
        <?php if ($history && $history->num_rows > 0): ?>
            <?php while ($trade = $history->fetch_assoc()): ?>
                <div class="trade-item">
                    <div class="trade-direction <?= $trade['direction'] ?>">
                        <?= $trade['direction'] === 'up' ? '↑' : '↓' ?>
                    </div>
                    <div class="trade-details">
                        <div class="trade-amount">₹<?= number_format($trade['wager'], 2) ?></div>
                        <div class="trade-time">
                            <?= date('H:i', strtotime($trade['created_at'])) ?> • 
                            <?= $trade['duration'] ?>s
                        </div>
                    </div>
                    <div class="trade-result <?= 
                        $trade['result'] === 'win' || $trade['result'] === 'cashed' ? 'text-success' : 
                        ($trade['result'] === 'lose' ? 'text-danger' : 'text-warning') 
                    ?>">
                        <?php 
                            if ($trade['result'] === 'win') echo '+' . number_format($trade['payout'], 2);
                            elseif ($trade['result'] === 'cashed') echo '₹' . number_format($trade['payout'], 2);
                            elseif ($trade['result'] === 'lose') echo '-₹' . number_format($trade['wager'], 2);
                            else echo 'Pending';
                        ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div style="text-align: center; padding: 1rem; color: rgba(248, 250, 252, 0.6);">
                No trade history yet
            </div>
        <?php endif; ?>
    </div>
    
    <!-- Bottom Navigation -->
    <div class="bottom-nav">
        <a href="index.php" class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
            <i class="fas fa-home"></i>
            <span>Main</span>
        </a>
        
        <a href="deposit.html" class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'deposit.html' ? 'active' : ''; ?>">
            <i class="fas fa-money-bill-wave"></i>
            <span>Deposit</span>
        </a>
        
        <a href="refer.php" class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'refer.php' ? 'active' : ''; ?>">
            <i class="fas fa-bullhorn"></i>
            <span>Promotion</span>
        </a>
        
        <a href="withdraw.html" class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'withdraw.html' ? 'active' : ''; ?>">
            <i class="fas fa-wallet"></i>
            <span>Withdraw</span>
        </a>
    </div>

    <script src="assets/js/shared_bottom_nav.js"></script>
        
        <a href="kyc.html" class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'kyc.html' ? 'active' : ''; ?>">
            <i class="fas fa-id-card"></i>
            <span>KYC</span>
        </a>
    </div>
    
    <?php if ($show_popup): ?>
        <div class="overlay" id="overlay"></div>
        <div class="result-popup <?= $popup_data['result'] ?>" id="resultPopup">
            <div class="result-icon">
                <?php if ($popup_data['result'] === 'win'): ?>
                    <i class="fas fa-trophy text-success"></i>
                <?php else: ?>
                    <i class="fas fa-times-circle text-danger"></i>
                <?php endif; ?>
            </div>
            
            <div class="result-title">
                <?= strtoupper($popup_data['result']) ?>!
            </div>
            
            <?php if ($popup_data['early']): ?>
                <div class="result-subtitle">
                    Early cashout at <?= $popup_data['progress'] ?>%
                </div>
            <?php endif; ?>
            
            <div class="result-amount <?= $popup_data['result'] === 'win' ? 'text-success' : 'text-danger' ?>">
                <?php if ($popup_data['result'] === 'win'): ?>
                    +₹<?= number_format($popup_data['payout'], 2) ?>
                <?php else: ?>
                    -₹<?= number_format($popup_data['wager'], 2) ?>
                <?php endif; ?>
            </div>
            
            <div class="result-details">
                <div class="result-row">
                    <span class="result-label">Direction:</span>
                    <span class="result-value <?= $popup_data['direction'] === 'up' ? 'text-success' : 'text-danger' ?>">
                        <?= strtoupper($popup_data['direction']) ?>
                    </span>
                </div>
                <div class="result-row">
                    <span class="result-label">Start Price:</span>
                    <span class="result-value">₹<?= number_format($popup_data['start_price'], 2) ?></span>
                </div>
                <div class="result-row">
                    <span class="result-label">End Price:</span>
                    <span class="result-value">₹<?= number_format($popup_data['end_price'], 2) ?></span>
                </div>
                <div class="result-row">
                    <span class="result-label">Wager:</span>
                    <span class="result-value">₹<?= number_format($popup_data['wager'], 2) ?></span>
                </div>
                <?php if ($popup_data['result'] === 'win'): ?>
                <div class="result-row">
                    <span class="result-label">Multiplier:</span>
                    <span class="result-value"><?= $popup_data['early'] ? '1.6x' : '1.8x' ?></span>
                </div>
                <?php endif; ?>
            </div>
            
            <button class="close-btn" onclick="closeResult()">
                CONTINUE TRADING
            </button>
        </div>
    <?php endif; ?>
    
    <script>
        // Duration selector
        document.querySelectorAll('.duration-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.duration-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                document.getElementById('durationInput').value = this.dataset.duration;
            });
        });

        // Price simulation
        let currentPrice = <?= $current_price ?>;
        const priceElement = document.getElementById('currentPrice');
        const tradePriceInput = document.getElementById('tradePrice');
        const chartData = Array(50).fill(currentPrice);
        
        function updatePrice() {
            // More realistic price movement with multiple time factors
            const time = Date.now() / 1000;
            const base = 27500;
            const variation1 = Math.sin(time / 30) * 200;
            const variation2 = Math.sin(time / 10) * 80;
            const variation3 = Math.sin(time / 5) * 30;
            const noise = (Math.random() - 0.5) * 20;
            
            currentPrice = base + variation1 + variation2 + variation3 + noise;
            
            // Update display
            priceElement.textContent = '₹' + currentPrice.toFixed(2);
            tradePriceInput.value = currentPrice.toFixed(2);
            
            // Price color animation
            const lastPrice = parseFloat(priceElement.dataset.lastPrice) || currentPrice;
            priceElement.style.color = currentPrice > lastPrice ? 'var(--success)' : 
                                     currentPrice < lastPrice ? 'var(--danger)' : 'inherit';
            priceElement.dataset.lastPrice = currentPrice.toFixed(2);
            
            // Update chart
            updateChart();
        }
        
        function updateChart() {
            // Update data
            chartData.shift();
            chartData.push(currentPrice);
            
            // Get chart element
            const chart = document.getElementById('priceChart');
            chart.innerHTML = '';
            
            // Calculate dimensions
            const width = chart.offsetWidth;
            const height = chart.offsetHeight;
            const min = Math.min(...chartData);
            const max = Math.max(...chartData);
            const range = Math.max(1, max - min);
            
            // Create SVG
            const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
            svg.setAttribute('width', '100%');
            svg.setAttribute('height', '100%');
            svg.setAttribute('viewBox', `0 0 ${width} ${height}`);
            
            // Create path
            const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
            let d = '';
            
            chartData.forEach((price, i) => {
                const x = (i / (chartData.length - 1)) * width;
                const y = height - ((price - min) / range * height);
                
                if (i === 0) d += `M ${x} ${y}`;
                else d += ` L ${x} ${y}`;
            });
            
            path.setAttribute('d', d);
            path.setAttribute('fill', 'none');
            path.setAttribute('stroke', currentPrice >= chartData[chartData.length - 2] ? 
                'var(--success)' : 'var(--danger)');
            path.setAttribute('stroke-width', '2');
            path.setAttribute('stroke-linejoin', 'round');
            
            svg.appendChild(path);
            chart.appendChild(svg);
        }
        
        // Auto-update active trades
        function updateActiveTrades() {
            const tradeItems = document.querySelectorAll('.trade-item[data-trade-id]');
            
            tradeItems.forEach(item => {
                const remainingElement = item.querySelector('.trade-remaining');
                const progressFill = item.querySelector('.progress-fill');
                const tradeId = item.dataset.tradeId;
                let remaining = parseInt(remainingElement.textContent);
                
                if (remaining > 0) {
                    remaining--;
                    remainingElement.textContent = remaining;
                    
                    // Update progress bar
                    const duration = parseInt(item.querySelector('.trade-time').textContent.match(/(\d+)s/)[1]);
                    const elapsed = duration - remaining;
                    const progress = (elapsed / duration) * 100;
                    progressFill.style.width = `${progress}%`;
                } else {
                    // Trade expired - check result
                    checkTradeResult(tradeId, item);
                }
            });
        }
        
        // Check trade result via AJAX
        function checkTradeResult(tradeId, item) {
            fetch(`check_trade.php?id=${tradeId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.completed) {
                        // Show result popup
                        showTradeResult(data);
                        // Remove the expired trade from active list
                        item.remove();
                    }
                })
                .catch(error => console.error('Error checking trade:', error));
        }
        
        // Show trade result popup
        function showTradeResult(data) {
            const overlay = document.getElementById('overlay');
            const popup = document.getElementById('resultPopup');
            
            if (!overlay || !popup) {
                // Create elements if they don't exist
                const newOverlay = document.createElement('div');
                newOverlay.id = 'overlay';
                newOverlay.style.display = 'block';
                
                const newPopup = document.createElement('div');
                newPopup.id = 'resultPopup';
                newPopup.className = `result-popup ${data.result}`;
                newPopup.style.display = 'block';
                
                // Build popup content
                newPopup.innerHTML = `
                    <div class="result-icon">
                        <i class="fas ${data.result === 'win' ? 'fa-trophy text-success' : 'fa-times-circle text-danger'}"></i>
                    </div>
                    <div class="result-title">${data.result.toUpperCase()}!</div>
                    ${data.early ? `
                    <div class="result-subtitle">
                        Early cashout at ${data.progress}%
                    </div>
                    ` : ''}
                    <div class="result-amount ${data.result === 'win' ? 'text-success' : 'text-danger'}">
                        ${data.result === 'win' ? '+' : '-'}₹${data.payout.toFixed(2)}
                    </div>
                    <div class="result-details">
                        <div class="result-row">
                            <span class="result-label">Direction:</span>
                            <span class="result-value ${data.direction === 'up' ? 'text-success' : 'text-danger'}">
                                ${data.direction.toUpperCase()}
                            </span>
                        </div>
                        <div class="result-row">
                            <span class="result-label">Start Price:</span>
                            <span class="result-value">₹${data.start_price.toFixed(2)}</span>
                        </div>
                        <div class="result-row">
                            <span class="result-label">End Price:</span>
                            <span class="result-value">₹${data.end_price.toFixed(2)}</span>
                        </div>
                        <div class="result-row">
                            <span class="result-label">Wager:</span>
                            <span class="result-value">₹${data.wager.toFixed(2)}</span>
                        </div>
                        ${data.result === 'win' ? `
                        <div class="result-row">
                            <span class="result-label">Multiplier:</span>
                            <span class="result-value">${data.early ? '1.6x' : '1.8x'}</span>
                        </div>
                        ` : ''}
                    </div>
                    <button class="close-btn" onclick="closeResult()">
                        CONTINUE TRADING
                    </button>
                `;
                
                document.body.appendChild(newOverlay);
                document.body.appendChild(newPopup);
                
                // Update balance
                updateUserBalance();
            } else {
                overlay.style.display = 'block';
                popup.style.display = 'block';
            }
        }
        
        // Update user balance via AJAX
        function updateUserBalance() {
            fetch('get_balance.php')
                .then(response => response.json())
                .then(data => {
                    if (data.balance !== undefined) {
                        document.getElementById('userBalance').textContent = '₹' + parseFloat(data.balance).toFixed(2);
                    }
                })
                .catch(error => console.error('Error updating balance:', error));
        }
        
        // Close result popup
        function closeResult() {
            const overlay = document.getElementById('overlay');
            const popup = document.getElementById('resultPopup');
            
            if (overlay) overlay.style.display = 'none';
            if (popup) popup.style.display = 'none';
        }
        
        // History button functionality
        const historyBtn = document.getElementById('historyBtn');
        const historyPanel = document.getElementById('historyPanel');
        
        historyBtn.addEventListener('click', function() {
            historyPanel.classList.toggle('show');
        });
        
        // Close history panel when clicking outside
        document.addEventListener('click', function(event) {
            if (!historyPanel.contains(event.target) && event.target !== historyBtn) {
                historyPanel.classList.remove('show');
            }
        });
        
        // Initialize
        updateChart();
        setInterval(updatePrice, 1000);
        setInterval(updateActiveTrades, 1000);
        
        // Show popup if exists
        <?php if ($show_popup): ?>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('overlay').style.display = 'block';
                document.getElementById('resultPopup').style.display = 'block';
                
                // Close popup when clicking outside
                document.getElementById('overlay').addEventListener('click', closeResult);
            });
        <?php endif; ?>
    </script>
</body>
</html>