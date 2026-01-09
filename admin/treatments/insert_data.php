<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();

// Read the data.txt file
$data = file_get_contents('data.txt');
if (!$data) die('data.txt not found or empty');


// Split treatments by regex (numbered headings)
$treatments = preg_split('/\n\d+\. /', $data, -1, PREG_SPLIT_NO_EMPTY);

foreach ($treatments as $block) {
    $lines = preg_split('/\r?\n/', $block);
    $title = $overview = $description = '';
    $features = [];
    $care_plans = [];
    $core_values = [];
    $faqs = [];
    $section = '';
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '') continue;
        if (stripos($line, 'Hero Banner Title') === 0) { $section = 'title'; continue; }
        if (stripos($line, 'Overview') === 0) { $section = 'overview'; continue; }
        if (stripos($line, 'Description') === 0) { $section = 'description'; continue; }
        if (stripos($line, 'Key Features') === 0) { $section = 'features'; continue; }
        if (stripos($line, 'Cancer Care Plans') === 0 || stripos($line, 'Conditions Treated') === 0 || stripos($line, 'Cancer Care Plans') === 0) { $section = 'care_plans'; continue; }
        if (stripos($line, 'Our Core Values') === 0) { $section = 'core_values'; continue; }
        if (stripos($line, 'Health Tips & FAQs') === 0) { $section = 'faqs'; continue; }
        // Section content
        switch ($section) {
            case 'title':
                if (!$title) $title = $line;
                break;
            case 'overview':
                if (!$overview) $overview = $line;
                break;
            case 'description':
                $description .= ($description ? "\n" : "") . $line;
                break;
            case 'features':
                $features[] = $line;
                break;
            case 'care_plans':
                $care_plans[] = $line;
                break;
            case 'core_values':
                $core_values[] = $line;
                break;
            case 'faqs':
                if (preg_match('/^Q\d+\./', $line)) {
                    $q = preg_replace('/^Q\d+\.\s*/', '', $line);
                    $faqs[] = ['question' => $q, 'answer' => ''];
                } elseif (!empty($faqs) && $faqs[count($faqs)-1]['answer'] === '') {
                    $faqs[count($faqs)-1]['answer'] = $line;
                } else {
                    // If not Q/A, treat as tip
                    $faqs[] = ['question' => '', 'answer' => $line];
                }
                break;
        }
    }
    if (!$title) continue;
    $slug = generate_slug($title);
    $features_str = implode("\n", $features);
    $care_plans_str = implode("\n", $care_plans);
    $core_values_str = implode("\n", $core_values);
    $faqs_json = !empty($faqs) ? mysqli_real_escape_string($conn, json_encode($faqs, JSON_UNESCAPED_UNICODE)) : '';
    $overview = mysqli_real_escape_string($conn, $overview);
    $description = mysqli_real_escape_string($conn, $description);
    $features_str = mysqli_real_escape_string($conn, $features_str);
    $care_plans_str = mysqli_real_escape_string($conn, $care_plans_str);
    $core_values_str = mysqli_real_escape_string($conn, $core_values_str);
    $title_db = mysqli_real_escape_string($conn, $title);
    $slug_db = mysqli_real_escape_string($conn, $slug);
    $now = date('Y-m-d H:i:s');
    $sql = "INSERT INTO treatments (title, slug, short_description, full_description, features, care_plans, core_values, health_tips, status, created_at) VALUES (\n        '$title_db', '$slug_db', '$overview', '$description', '$features_str', '$care_plans_str', '$core_values_str', '$faqs_json', 'active', '$now'\n    )";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "Inserted: $title<br>\n";
    } else {
        echo "Error for $title: ".mysqli_error($conn)."<br>\n";
    }
}
echo "<br>Done.";
