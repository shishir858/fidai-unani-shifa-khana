<?php
// Dynamic base URL for the website
if (!defined('BASE_URL')) {
	define('BASE_URL', 'http://localhost/fidai-unani-shifa-khana/');
}

// Database connection settings
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'sspsof5_fidai_unani';

$conn = @new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die('<b>Database connection failed:</b> ' . htmlspecialchars($conn->connect_error) . '<br>Make sure the database <b>' . htmlspecialchars($db_name) . '</b> exists.');
}
