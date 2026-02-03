<?php
header('Content-Type: application/json');
// Include config only from safe, application-relative locations. Suppress warnings when probing.
$candidates = [__DIR__ . '/../config.php', __DIR__ . '/config.php'];
$loaded = false;
foreach ($candidates as $p) { if (@file_exists($p) && @is_readable($p)) { require_once $p; $loaded = true; break; } }
if (!$loaded) { http_response_code(500); echo json_encode(['success'=>false,'error'=>'Configuration file not found.']); exit; }

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

$username = sanitize($input['username'] ?? '');
$password = $input['password'] ?? '';

// Validation
if (empty($username) || empty($password)) {
    echo json_encode(['success' => false, 'error' => 'Username and password are required']);
    exit;
}

try {
    // Check if user exists (by username or phone)
    $stmt = $pdo->prepare("SELECT id, username, phone, password, balance, avatar, referral_code, is_admin FROM users WHERE username = ? OR phone = ?");
    $stmt->execute([$username, $username]);
    $user = $stmt->fetch();

    if (!$user) {
        echo json_encode(['success' => false, 'error' => 'Invalid username or password']);
        exit;
    }

    // Verify password
    $is_valid = false;
    if (password_verify($password, $user['password'])) {
        $is_valid = true;
    } elseif ($password === $user['password']) {
        // Upgrade plain text password to hash
        $new_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute([$new_hash, $user['id']]);
        $is_valid = true;
    }
    if (!$is_valid) {
        echo json_encode(['success' => false, 'error' => 'Invalid username or password']);
        exit;
    }

    // Log in the user
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['is_admin'] = $user['is_admin'];

    echo json_encode([
        'success' => true, 
        'message' => 'Login successful!',
        'user' => [
            'id' => $user['id'],
            'username' => $user['username'],
            'phone' => $user['phone'],
            'balance' => $user['balance'],
            'avatar' => $user['avatar'],
            'referral_code' => $user['referral_code'],
            'is_admin' => $user['is_admin']
        ]
    ]);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => 'Login failed. Please try again.']);
}
?> 