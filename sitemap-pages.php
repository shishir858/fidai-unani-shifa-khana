<?php
require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/xml; charset=UTF-8');

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$baseUrl = rtrim($protocol . $host . (BASE_PATH === '/' ? '' : BASE_PATH), '/') . '/';

function xmlEscape(string $value): string {
	return htmlspecialchars($value, ENT_XML1 | ENT_COMPAT, 'UTF-8');
}

$urls = [];
$urls[] = ['loc' => $baseUrl, 'changefreq' => 'daily', 'priority' => '1.0'];
$urls[] = ['loc' => $baseUrl . 'about', 'changefreq' => 'monthly', 'priority' => '0.7'];
$urls[] = ['loc' => $baseUrl . 'services', 'changefreq' => 'weekly', 'priority' => '0.9'];
$urls[] = ['loc' => $baseUrl . 'doctors', 'changefreq' => 'monthly', 'priority' => '0.6'];
$urls[] = ['loc' => $baseUrl . 'contact', 'changefreq' => 'monthly', 'priority' => '0.6'];
$urls[] = ['loc' => $baseUrl . 'appointment', 'changefreq' => 'monthly', 'priority' => '0.6'];
$urls[] = ['loc' => $baseUrl . 'blog', 'changefreq' => 'weekly', 'priority' => '0.7'];

$result = mysqli_query(
	$conn,
	"SELECT slug, updated_at, created_at FROM treatments WHERE status='active' AND slug <> '' ORDER BY created_at DESC"
);
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$lastmod = $row['updated_at'] ?? $row['created_at'] ?? null;
		$urls[] = [
			'loc' => $baseUrl . 'services/' . rawurlencode($row['slug']),
			'lastmod' => $lastmod ? gmdate('Y-m-d\TH:i:s\Z', strtotime($lastmod)) : null,
			'changefreq' => 'monthly',
			'priority' => '0.8',
		];
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

