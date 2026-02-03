<?php
// Include config only from safe, application-relative locations. Suppress warnings when probing.
$candidates = [__DIR__ . '/../config.php', __DIR__ . '/config.php'];
$loaded = false;
foreach ($candidates as $p) {
	if (@file_exists($p) && @is_readable($p)) { require_once $p; $loaded = true; break; }
}
if (!$loaded) { http_response_code(500); die('Configuration file not found.'); }

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

// Clear session data
$_SESSION = [];

// Delete the session cookie if used
if (ini_get('session.use_cookies')) {
	$params = session_get_cookie_params();
	setcookie(session_name(), '', time() - 42000,
		$params['path'], $params['domain'],
		$params['secure'], $params['httponly']
	);
}

// Destroy session
session_destroy();

// Redirect to admin login
header('Location: login.php');
exit;