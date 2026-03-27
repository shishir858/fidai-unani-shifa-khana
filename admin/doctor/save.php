<?php
require_once '../includes/config.php';
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$name = trim($_POST['name'] ?? '');
$title = trim($_POST['title'] ?? '');
$description = trim($_POST['description'] ?? '');
if ($id > 0) {
    $stmt = $conn->prepare("UPDATE doctor SET name=?, title=?, description=? WHERE id=?");
    $stmt->bind_param('sssi', $name, $title, $description, $id);
    $stmt->execute();
    $stmt->close();
} else {
    $stmt = $conn->prepare("INSERT INTO doctor (name, title, description) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $name, $title, $description);
    $stmt->execute();
    $stmt->close();
}
echo 'success';
