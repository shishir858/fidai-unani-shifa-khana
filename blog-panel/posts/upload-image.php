<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
if (!isset($_SESSION['admin_id'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

require_once __DIR__ . '/../../includes/config.php';

// TinyMCE Image Upload Handler (expects 'file' from FormData)
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['file'];

    // Upload directory: project root / assets/uploads/tinymce/
    $projectRoot = dirname(dirname(__DIR__));
    $uploadDir = $projectRoot . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'tinymce' . DIRECTORY_SEPARATOR;
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    // Validate file type
    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
    $fileType = @mime_content_type($file['tmp_name']);
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if ((!$fileType || !in_array($fileType, $allowedTypes)) && !in_array($ext, $allowedExt)) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid file type. Only JPG, PNG, GIF, WebP allowed.']);
        exit;
    }
    
    // Validate file size (max 5MB)
    if ($file['size'] > 5 * 1024 * 1024) {
        http_response_code(400);
        echo json_encode(['error' => 'File too large. Max 5MB allowed.']);
        exit;
    }
    
    // Generate unique filename
    $newFileName = time() . '_' . uniqid() . '.' . $ext;
    $filePath = $uploadDir . $newFileName;
    
    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        // Return absolute URL - file is at project-root/assets/uploads/tinymce/
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
        $host = $_SERVER['HTTP_HOST'] ?? '';
        $scriptPath = str_replace('\\', '/', $_SERVER['SCRIPT_NAME']);
        $siteBase = rtrim(dirname(dirname(dirname($scriptPath))), '/'); // /pamtrip-new
        $fileUrl = $protocol . $host . ($siteBase ? $siteBase . '/' : '/') . 'assets/uploads/tinymce/' . $newFileName;
        $imgInfo = @getimagesize($filePath);
        $width = $imgInfo ? $imgInfo[0] : null;
        $height = $imgInfo ? $imgInfo[1] : null;
        echo json_encode([
            'location' => $fileUrl,
            'width' => $width,
            'height' => $height
        ]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to upload file']);
    }
} elseif (isset($_FILES['file']) && $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    $err = $_FILES['file']['error'];
    $msg = ($err === UPLOAD_ERR_INI_SIZE || $err === UPLOAD_ERR_FORM_SIZE) ? 'File too large (max 5MB)' : 'Upload error (code ' . $err . ')';
    http_response_code(400);
    echo json_encode(['error' => $msg]);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'No file uploaded']);
}
