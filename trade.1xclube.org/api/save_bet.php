<?php
// Include config only from safe, application-relative locations. Suppress warnings when probing.
$candidates = [__DIR__ . '/../config.php', __DIR__ . '/config.php'];
$loaded = false;
foreach ($candidates as $p) { if (@file_exists($p) && @is_readable($p)) { require_once $p; $loaded = true; break; } }
if (!$loaded) { http_response_code(500); echo json_encode(['success'=>false,'error'=>'Configuration file not found.']); exit; }

header('Content-Type: application/json');

if (!isLoggedIn()) {
    echo json_encode(['success' => false, 'error' => 'Not logged in']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

$bet_amount = floatval($input['bet_amount'] ?? 0);
$difficulty = sanitize($input['difficulty'] ?? 'Normal');
$result = sanitize($input['result'] ?? '');
$multiplier = floatval($input['multiplier'] ?? 0);
$profit_loss = floatval($input['profit_loss'] ?? 0);
$game_data = $input['game_data'] ?? null;

// Validation
if ($bet_amount <= 0 || empty($result)) {
    echo json_encode(['success' => false, 'error' => 'Invalid bet data']);
    exit;
}

if (!in_array($result, ['cashout', 'crash'])) {
    echo json_encode(['success' => false, 'error' => 'Invalid result']);
    exit;
}

try {
    $user_id = getCurrentUserId();
    
    // Insert bet history (balance is already handled in frontend)
    $stmt = $pdo->prepare("INSERT INTO bet_history (user_id, bet_amount, difficulty, result, multiplier, profit_loss, game_data) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$user_id, $bet_amount, $difficulty, $result, $multiplier, $profit_loss, json_encode($game_data)]);
    
    // Get current user data (balance is already updated in frontend)
    $stmt = $pdo->prepare("SELECT id, username, phone, balance, avatar, referral_code, total_referrals, referral_earnings FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode([
        'success' => true, 
        'message' => 'Bet saved successfully',
        'user' => $user
    ]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => 'Failed to save bet']);
}
?> 