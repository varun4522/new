<?php
header('Content-Type: application/json');
// Include config only from safe, application-relative locations. Suppress warnings when probing.
$candidates = [__DIR__ . '/../config.php', __DIR__ . '/config.php'];
$loaded = false;
foreach ($candidates as $p) { if (@file_exists($p) && @is_readable($p)) { require_once $p; $loaded = true; break; } }
if (!$loaded) { http_response_code(500); echo json_encode(['success'=>false,'error'=>'Configuration file not found.']); exit; }

$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'];

try {
    $stmt = $pdo->prepare("SELECT setting_value FROM admin_settings WHERE setting_key = 'maintenance_mode'");
    $stmt->execute();
    $maintenance = $stmt->fetchColumn();
    $maintenance = ($maintenance === 'true');
    echo json_encode([
        'success' => true,
        'maintenance' => $maintenance,
        'is_admin' => $is_admin
    ]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => 'Failed to fetch maintenance status']);
} 