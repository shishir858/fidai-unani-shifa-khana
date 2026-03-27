<?php
require_once __DIR__ . '/includes/config.php';
header('Content-Type: application/xml; charset=UTF-8');

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$basePath = parse_url((defined('BASE_URL') ? BASE_URL : ($protocol . $host . '/')), PHP_URL_PATH) ?? '/';
$basePath = '/' . trim(str_replace('\\', '/', $basePath), '/');
if ($basePath === '//') $basePath = '/';
$baseUrl = rtrim($protocol . $host . ($basePath === '/' ? '' : $basePath), '/') . '/';

function xmlEscape(string $value): string {
	return htmlspecialchars($value, ENT_XML1 | ENT_COMPAT, 'UTF-8');
}

$now = gmdate('Y-m-d\TH:i:s\Z');
$sitemaps = [
	$baseUrl . 'sitemap-pages.xml',
	$baseUrl . 'sitemap-blog.xml',
];

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<?xml-stylesheet type=\"text/xsl\" href=\"sitemap.xsl\"?>\n";
echo "<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
foreach ($sitemaps as $sm) {
	echo "  <sitemap>\n";
	echo "    <loc>" . xmlEscape($sm) . "</loc>\n";
	echo "    <lastmod>" . xmlEscape($now) . "</lastmod>\n";
	echo "  </sitemap>\n";
}
echo "</sitemapindex>\n";
exit;
?>
