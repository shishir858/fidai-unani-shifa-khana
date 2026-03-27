<?php
require_once __DIR__ . '/config.php';

function blog_get_pdo(): ?PDO {
	static $pdo = null;
	if ($pdo instanceof PDO) return $pdo;

	$host = defined('BLOG_DB_HOST') ? BLOG_DB_HOST : ($GLOBALS['db_host'] ?? 'localhost');
	$user = defined('BLOG_DB_USER') ? BLOG_DB_USER : ($GLOBALS['db_user'] ?? 'root');
	$pass = defined('BLOG_DB_PASS') ? BLOG_DB_PASS : ($GLOBALS['db_pass'] ?? '');
	$db = defined('BLOG_DB_NAME') ? BLOG_DB_NAME : null;

	if (!$db) return null;

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
		return $pdo;
	} catch (Throwable $e) {
		return null;
	}
}

function blog_est_read_time(string $text): string {
	$words = preg_match_all('/\p{L}+/u', strip_tags($text), $m);
	$mins = max(1, (int)ceil(($words ?: 0) / 200));
	return $mins . ' min read';
}

function blog_fix_content_images(string $html): string {
	// Keep as-is; content is managed by blog-panel editor.
	return $html;
}

