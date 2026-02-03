<?php
// Include config only from safe, application-relative locations. Suppress warnings when probing.
$candidates = [__DIR__ . '/../config.php', __DIR__ . '/config.php'];
$loaded = false;
foreach ($candidates as $p) { if (@file_exists($p) && @is_readable($p)) { require_once $p; $loaded = true; break; } }
if (!$loaded) { http_response_code(500); echo 'Configuration file not found.'; exit; }

try {
    $stmt = $pdo->query("SELECT DATABASE() AS db");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Connected to database: " . ($row['db'] ?? 'unknown') . "\n";
} catch (Exception $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}

?>