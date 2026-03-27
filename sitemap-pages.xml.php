<?php
header('Content-Type: application/xml; charset=utf-8');

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$script = $_SERVER['SCRIPT_NAME'] ?? '';
$basePath = dirname($script);
if ($basePath === '/' || $basePath === '\\') $basePath = '';
$baseUrl = $protocol . $host . $basePath . '/';

$pages = [
    ['loc' => '', 'priority' => '1.0'],
    ['loc' => 'about-us', 'priority' => '0.8'],
    ['loc' => 'cars', 'priority' => '0.8'],
    ['loc' => 'locations', 'priority' => '0.8'],
    ['loc' => 'blog', 'priority' => '0.9'],
    ['loc' => 'contact', 'priority' => '0.8'],
    ['loc' => 'dzire-taxi-in-delhi', 'priority' => '0.8'],
    ['loc' => 'innova-taxi-in-delhi', 'priority' => '0.8'],
];

$taxiLocations = [
    'airport-taxi', 'connaught-place', 'karol-bagh', 'chandni-chowk', 'daryaganj', 'jangpura',
    'green-park', 'hauz-khas', 'khan-market', 'kirti-nagar', 'lajpat-nagar', 'mayur-vihar',
    'pitampura', 'punjabi-bagh', 'rajouri-garden', 'rohini', 'saket', 'sarojini-nagar',
    'south-extension', 'vasant-kunj', 'dwarka'
];

$tempoLocations = [
    'connaught-place', 'karol-bagh', 'chandni-chowk', 'daryaganj', 'dwarka', 'green-park',
    'hauz-khas', 'jangpura', 'khan-market', 'kirti-nagar', 'lajpat-nagar', 'mayur-vihar',
    'pitampura', 'punjabi-bagh', 'rajouri-garden', 'rohini', 'saket', 'sarojini-nagar',
    'south-extension', 'vasant-kunj'
];

foreach ($taxiLocations as $slug) {
    $pages[] = ['loc' => 'taxi/' . $slug, 'priority' => '0.75'];
}
foreach ($tempoLocations as $slug) {
    $pages[] = ['loc' => 'tempo-traveller/' . $slug, 'priority' => '0.75'];
}

header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($pages as $p) {
    $loc = $baseUrl . $p['loc'];
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($loc) . "</loc>\n";
    echo "    <lastmod>" . date('c') . "</lastmod>\n";
    echo "    <priority>" . $p['priority'] . "</priority>\n";
    echo "  </url>\n";
}
echo "</urlset>";
