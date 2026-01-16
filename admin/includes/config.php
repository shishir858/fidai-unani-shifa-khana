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

// Site URL for Visit Website button (adjust as needed)
define('SITE_URL', '/');

// Define BASE_URL for admin panel (auto-detects subfolder)
if (!defined('BASE_URL')) {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    // Get the path up to and including /admin/
    $script_name = str_replace('\\', '/', $_SERVER['SCRIPT_NAME']);
    $admin_pos = strpos($script_name, '/admin/');
    if ($admin_pos !== false) {
        $dir = substr($script_name, 0, $admin_pos + 7); // 7 = strlen('/admin/')
    } else {
        $dir = '/admin/';
    }
    define('BASE_URL', $protocol . $host . $dir);
}

// Upload path for images (adjust as needed)
define('UPLOAD_PATH', dirname(__DIR__, 2) . '/assets/images/');
