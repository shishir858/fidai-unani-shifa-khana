<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

// Database connection
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'sspsof5_fidai_unani';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die('Database connection failed: ' . mysqli_connect_error());
}

// Base URL for admin panel (adjust if needed)
define('BASE_URL', '/fidai-unani-shifa-khana/admin/');

// Site URL for Visit Website button (adjust as needed)
define('SITE_URL', '/');

// Upload path for images (adjust as needed)
define('UPLOAD_PATH', dirname(__DIR__, 2) . '/assets/images/');
