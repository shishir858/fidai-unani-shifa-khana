<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_FILES['file'])) {
    echo json_encode(['error' => 'No file uploaded']);
    exit;
}

$folder = 'treatments/editor';
$target_dir = UPLOAD_PATH . $folder . '/';
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$file = $_FILES['file'];
$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
$allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
if (!in_array($ext, $allowed, true)) {
    echo json_encode(['error' => 'Only JPG, PNG, GIF and WEBP are allowed']);
    exit;
}
if ($file['size'] > 2097152) {
    echo json_encode(['error' => 'Image must be 2MB or smaller']);
    exit;
}
if (!is_uploaded_file($file['tmp_name']) || getimagesize($file['tmp_name']) === false) {
    echo json_encode(['error' => 'Invalid image file']);
    exit;
}

$new_name = 'editor_' . uniqid('', true) . '.' . $ext;
if (!move_uploaded_file($file['tmp_name'], $target_dir . $new_name)) {
    echo json_encode(['error' => 'Could not save file']);
    exit;
}

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$script = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? ''));
$base = preg_replace('#/admin/treatments/upload_editor_image\.php$#', '', $script);
$url = $scheme . '://' . $host . $base . '/assets/images/treatments/editor/' . $new_name;

echo json_encode(['url' => $url]);
