<?php
header('Content-Type: application/json');

// Include config only from safe, application-relative locations. Use silence operator to avoid open_basedir warnings when probing outside allowed paths.
$candidates = [__DIR__ . '/../config.php', __DIR__ . '/config.php'];
$loaded = false;
foreach ($candidates as $p) {
	if (@file_exists($p) && @is_readable($p)) { require_once $p; $loaded = true; break; }
}
if (!$loaded) {
	http_response_code(500);
	echo json_encode(['success' => false, 'error' => 'Configuration file not found. Please ensure config.php is inside the application directory.']);
	exit;
}

// Ensure session is started before destroying
if (session_status() === PHP_SESSION_NONE) session_start();
session_unset();
session_destroy();

echo json_encode(['success' => true, 'message' => 'Logged out successfully']);
?>