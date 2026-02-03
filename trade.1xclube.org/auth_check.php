<?php
// Include config only from safe, application-relative locations. Suppress warnings when probing.
$candidates = [__DIR__ . '/../config.php', __DIR__ . '/config.php'];
$loaded = false;
foreach ($candidates as $p) { if (@file_exists($p) && @is_readable($p)) { require_once $p; $loaded = true; break; } }
if (!$loaded) { http_response_code(500); echo json_encode(['success'=>false,'error'=>'Configuration file not found.']); exit; }

// Check if user is logged in
if (!isLoggedIn()) {
    echo json_encode(['success' => false, 'error' => 'Not logged in']);
    exit;
}

// Get user data
try {
    $user_id = getCurrentUserId();
    $stmt = $pdo->prepare("SELECT id, username, phone, balance, avatar, referral_code, is_admin FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();
    
    if ($user) {
        echo json_encode([
            'success' => true,
            'user' => $user
        ]);
    } else {
        echo json_encode(['success' => false, 'error' => 'User not found']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => 'Database error']);
}
?> 