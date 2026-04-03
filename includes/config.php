<?php
// Show all errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Marker so other modules don't re-require config
if (!defined('INC_CONFIG')) {
	define('INC_CONFIG', true);
}

// Dynamic base URL for the website (works on localhost, live, www, and behind HTTPS proxies)
if (!defined('BASE_URL')) {
	$host = $_SERVER['HTTP_HOST'] ?? '';
	$isLocalHost = (stripos($host, 'localhost') !== false) || ($host === '127.0.0.1') || ($host === '::1');
	if ($isLocalHost) {
		define('BASE_URL', 'http://localhost/fidaiunanishifakhana/');
	} else {
		$https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
			|| (isset($_SERVER['SERVER_PORT']) && (string) $_SERVER['SERVER_PORT'] === '443')
			|| (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower((string) $_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https');
		$scheme = $https ? 'https' : 'http';
		define('BASE_URL', $scheme . '://' . $host . '/');
	}
}

if (!function_exists('public_asset_url')) {
	/**
	 * Build a full URL for images/CSS stored under /assets (fixes DB values saved as localhost or with old subfolder).
	 */
	function public_asset_url($path) {
		$path = trim((string) $path);
		if ($path === '') {
			return '';
		}
		if (preg_match('#^https?://#i', $path)) {
			$parts = parse_url($path);
			if (!empty($parts['path'])) {
				$path = $parts['path'];
			} else {
				return $path;
			}
		}
		$path = ltrim($path, '/');
		if (strpos($path, 'fidaiunanishifakhana/') === 0) {
			$path = substr($path, strlen('fidaiunanishifakhana/'));
		}
		return rtrim(BASE_URL, '/') . '/' . $path;
	}
}

if (!function_exists('public_site_logo_url')) {
	/**
	 * Logo from settings or default file. Linux servers are case-sensitive — DB may say .PNG while file is .png.
	 */
	function public_site_logo_url($dbLogo) {
		$dbLogo = trim((string) $dbLogo);
		$root = dirname(__DIR__);

		$toRelative = function ($path) {
			$path = trim((string) $path);
			if ($path === '') {
				return '';
			}
			if (preg_match('#^https?://#i', $path)) {
				$p = parse_url($path, PHP_URL_PATH);
				$path = ltrim((string) $p, '/');
			} else {
				$path = ltrim($path, '/');
			}
			if (strpos($path, 'fidaiunanishifakhana/') === 0) {
				$path = substr($path, strlen('fidaiunanishifakhana/'));
			}
			return $path;
		};

		$exists = function ($relativePath) use ($root) {
			if ($relativePath === '') {
				return false;
			}
			$full = $root . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $relativePath);

			return is_file($full);
		};

		$tryAlternates = function ($relativePath) use ($exists, $root) {
			if ($relativePath === '') {
				return null;
			}
			if ($exists($relativePath)) {
				return $relativePath;
			}
			if (preg_match('/^(.*\.)(PNG|png)$/i', $relativePath, $m)) {
				$other = $m[1] . (strtoupper($m[2]) === 'PNG' ? 'png' : 'PNG');
				if ($exists($other)) {
					return $other;
				}
			}

			return null;
		};

		if ($dbLogo !== '') {
			$rel = $toRelative($dbLogo);
			$resolved = $tryAlternates($rel);
			if ($resolved !== null) {
				return public_asset_url($resolved);
			}

			return public_asset_url($rel);
		}

		foreach (['assets/images/logo/logo-light.png', 'assets/images/logo/logo-light.PNG', 'assets/images/logo/logo-light3.png'] as $rel) {
			if ($exists($rel)) {
				return public_asset_url($rel);
			}
		}

		return public_asset_url('assets/images/logo/logo-light.png');
	}
}

if (!function_exists('public_favicon_url')) {
	function public_favicon_url() {
		$root = dirname(__DIR__);
		foreach (['assets/images/favicon/favicon.png', 'assets/images/favicon/favicon.PNG', 'assets/images/favicon/favicon.ico'] as $rel) {
			if (is_file($root . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $rel))) {
				return public_asset_url($rel) . '?v=2';
			}
		}
		return public_asset_url('assets/images/favicon/favicon.png') . '?v=2';
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
