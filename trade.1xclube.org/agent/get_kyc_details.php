<?php
session_start();
// Include config only from safe, application-relative locations. Suppress warnings when probing.
$candidates = [__DIR__ . '/../config.php', __DIR__ . '/config.php'];
$loaded = false;
foreach ($candidates as $p) { if (@file_exists($p) && @is_readable($p)) { require_once $p; $loaded = true; break; } }
if (!$loaded) { http_response_code(500); echo json_encode(['success'=>false,'error'=>'Configuration file not found.']); exit; }

// Check if admin is logged in
if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'Not authenticated']);
    exit;
}

// Check if KYC ID is provided
if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'KYC ID required']);
    exit;
}

$kyc_id = $_GET['id'];

try {
    $stmt = $pdo->prepare("
        SELECT k.*, u.username, u.phone 
        FROM kyc_verification k 
        JOIN users u ON k.user_id = u.id 
        WHERE k.id = ?
    ");
    $stmt->execute([$kyc_id]);
    $kyc = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$kyc) {
        http_response_code(404);
        echo json_encode(['success' => false, 'error' => 'KYC not found']);
        exit;
    }
    
    echo json_encode([
        'success' => true,
        'kyc' => $kyc
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Database error']);
}
?> 