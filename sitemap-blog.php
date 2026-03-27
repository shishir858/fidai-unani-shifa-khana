<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/blog-functions.php';

header('Content-Type: application/xml; charset=UTF-8');

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$baseUrl = rtrim($protocol . $host . (BASE_PATH === '/' ? '' : BASE_PATH), '/') . '/';

function xmlEscape(string $value): string {
	return htmlspecialchars($value, ENT_XML1 | ENT_COMPAT, 'UTF-8');
}

$urls = [];
$pdo = blog_get_pdo();
if ($pdo) {
	try {
		$stmt = $pdo->query("SELECT slug, updated_at, created_at, published_at FROM posts WHERE status='published' AND slug <> '' AND (index_status IS NULL OR index_status='index') ORDER BY COALESCE(published_at, created_at) DESC");
		foreach ($stmt->fetchAll() as $row) {
			$lm = $row['updated_at'] ?? $row['published_at'] ?? $row['created_at'] ?? null;
			$urls[] = [
				'loc' => $baseUrl . 'blog/' . rawurlencode($row['slug']),
				'lastmod' => $lm ? gmdate('Y-m-d\TH:i:s\Z', strtotime($lm)) : null,
				'changefreq' => 'monthly',
				'priority' => '0.64',
			];
		}
	} catch (Throwable $e) {
		// ignore blog errors
	}
}

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<?xml-stylesheet type=\"text/xsl\" href=\"sitemap.xsl\"?>\n";
echo "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
foreach ($urls as $u) {
	echo "  <url>\n";
	echo "    <loc>" . xmlEscape($u['loc']) . "</loc>\n";
	if (!empty($u['lastmod'])) echo "    <lastmod>" . xmlEscape($u['lastmod']) . "</lastmod>\n";
	if (!empty($u['changefreq'])) echo "    <changefreq>" . xmlEscape($u['changefreq']) . "</changefreq>\n";
	if (!empty($u['priority'])) echo "    <priority>" . xmlEscape($u['priority']) . "</priority>\n";
	echo "  </url>\n";
}
echo "</urlset>\n";

