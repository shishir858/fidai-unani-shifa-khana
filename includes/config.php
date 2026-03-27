<?php
// Show all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Marker so other modules don't re-require config
if (!defined('INC_CONFIG')) {
	define('INC_CONFIG', true);
}

// Dynamic base URL for the website
if (!defined('BASE_URL')) {
	$host = $_SERVER['HTTP_HOST'] ?? '';
	$isLocalHost = (stripos($host, 'localhost') !== false) || ($host === '127.0.0.1') || ($host === '::1');
	if ($isLocalHost) {
		define('BASE_URL', 'http://localhost/fidaiunanishifakhana/');
	} else {
		define('BASE_URL', 'https://fidaiunanishifakhana.com/');
	}
}

// Base path (URL path prefix), used for blog-panel compatibility
if (!defined('BASE_PATH')) {
	$basePath = parse_url(BASE_URL, PHP_URL_PATH);
	$basePath = $basePath ? rtrim($basePath, '/') : '';
	if ($basePath === '') $basePath = '/';
	define('BASE_PATH', $basePath);
}

// Database connection settings
if ($isLocalHost) {
	// Localhost credentials
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'sspsof5-fidai';
} else {
	// Live server credentials
	$db_host = 'localhost';
	$db_user = 'u507341251_sspsof5_fidai';
	$db_pass = 'xYuyWaEc2zXDotA9Fsw0';
	$db_name = 'u507341251_sspsof5_fidai';
}

// Blog database (used by blog-panel + frontend blog)
if ($isLocalHost) {
	if (!defined('BLOG_DB_HOST')) define('BLOG_DB_HOST', 'localhost');
	if (!defined('BLOG_DB_USER')) define('BLOG_DB_USER', $db_user);
	if (!defined('BLOG_DB_PASS')) define('BLOG_DB_PASS', $db_pass);
	if (!defined('BLOG_DB_NAME')) define('BLOG_DB_NAME', 'blog-managment-system');
} else {
	if (!defined('BLOG_DB_HOST')) define('BLOG_DB_HOST', 'localhost');
	if (!defined('BLOG_DB_USER')) define('BLOG_DB_USER', 'u507341251_fidai_blog');
	if (!defined('BLOG_DB_PASS')) define('BLOG_DB_PASS', 'xYuyWaEc2zXDotA9Fsw0');
	if (!defined('BLOG_DB_NAME')) define('BLOG_DB_NAME', 'u507341251_fidai_blog');
}

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
	die('<b>Database connection failed:</b> ' . htmlspecialchars($conn->connect_error ?? 'Unknown error') . '<br>Make sure the database <b>' . htmlspecialchars($db_name ?? '') . '</b> exists.');
}
