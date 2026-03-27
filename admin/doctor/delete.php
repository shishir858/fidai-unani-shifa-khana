<?php
require_once '../includes/config.php';
$id = intval($_POST['id'] ?? 0);
if($id > 0) {
    $stmt = $conn->prepare("DELETE FROM doctor WHERE id=?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
}
echo 'success';
