<?php
require_once __DIR__ . '/config.php';

if (!isset($pdo) || !($pdo instanceof PDO)) {
	$host = defined('BLOG_DB_HOST') ? BLOG_DB_HOST : ($GLOBALS['db_host'] ?? 'localhost');
	$user = defined('BLOG_DB_USER') ? BLOG_DB_USER : ($GLOBALS['db_user'] ?? 'root');
	$pass = defined('BLOG_DB_PASS') ? BLOG_DB_PASS : ($GLOBALS['db_pass'] ?? '');
	$db = defined('BLOG_DB_NAME') ? BLOG_DB_NAME : ($GLOBALS['db_name'] ?? '');

	try {
		$pdo = new PDO(
			"mysql:host={$host};dbname={$db};charset=utf8mb4",
			$user,
			$pass,
			[
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			]
		);
	} catch (Throwable $e) {
		die('Blog DB connection failed.');
	}
}

