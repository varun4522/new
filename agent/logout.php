<?php
// Safely locate config.php within allowed directories
$candidates = [__DIR__ . '/../config.php', __DIR__ . '/config.php'];
$loaded = false;
foreach ($candidates as $p) { if (@file_exists($p) && @is_readable($p)) { require_once $p; $loaded = true; break; } }
if (!$loaded) { http_response_code(500); die('Configuration file not found.'); }

// Destroy session
session_destroy();

// Redirect to admin login
header('Location: ../login.html');
exit; 