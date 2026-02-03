<?php
// Simple test to check if admin panel is working
echo "<h1>Admin Panel Test</h1>";

// Check if config file exists
if (file_exists('config.php')) {
    echo "<p>✅ Config file exists</p>";
    
    // Try to include config safely
    try {
        $candidates = [__DIR__ . '/../config.php', __DIR__ . '/config.php'];
        $loaded = false;
        foreach ($candidates as $p) { if (@file_exists($p) && @is_readable($p)) { require_once $p; $loaded = true; break; } }
        if (!$loaded) { throw new Exception('Configuration file not found'); }
        echo "<p>✅ Config loaded successfully</p>";
        
        // Test database connection
        try {
            $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p>✅ Database connection successful</p>";
            
            // Check if tables exist
            $tables = ['users', 'transactions', 'bets'];
            foreach ($tables as $table) {
                try {
                    $stmt = $pdo->query("SELECT COUNT(*) FROM $table");
                    $count = $stmt->fetchColumn();
                    echo "<p>✅ Table '$table' exists with $count records</p>";
                } catch (Exception $e) {
                    echo "<p>❌ Table '$table' error: " . $e->getMessage() . "</p>";
                }
            }
            
        } catch (Exception $e) {
            echo "<p>❌ Database connection failed: " . $e->getMessage() . "</p>";
        }
        
    } catch (Exception $e) {
        echo "<p>❌ Config loading failed: " . $e->getMessage() . "</p>";
    }
    
} else {
    echo "<p>❌ Config file not found</p>";
}

// Check admin files
$admin_files = ['admin/index.php', 'admin/login.php', 'admin/transactions.php', 'admin/users.php', 'admin/bets.php', 'admin/settings.php', 'admin/logout.php'];
foreach ($admin_files as $file) {
    if (file_exists($file)) {
        echo "<p>✅ $file exists</p>";
    } else {
        echo "<p>❌ $file missing</p>";
    }
}

// Check API files
$api_files = ['api/login.php', 'api/register.php', 'api/logout.php', 'api/user.php', 'api/deposit.php', 'api/withdraw.php', 'api/transactions.php', 'api/bet_history.php', 'api/save_bet.php', 'api/update_balance.php'];
foreach ($api_files as $file) {
    if (file_exists($file)) {
        echo "<p>✅ $file exists</p>";
    } else {
        echo "<p>❌ $file missing</p>";
    }
}

echo "<h2>Admin Panel Links:</h2>";
echo "<p><a href='admin/login.php' target='_blank'>Admin Login</a></p>";
echo "<p><a href='admin/index.php' target='_blank'>Admin Dashboard</a></p>";
echo "<p><a href='login.html' target='_blank'>User Login</a></p>";
echo "<p><a href='index.html' target='_blank'>Main Game</a></p>";
?> 