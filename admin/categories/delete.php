<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();
if(!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}
$id = intval($_GET['id']);
$delete_query = "DELETE FROM categories WHERE id = ?";
$stmt = mysqli_prepare($conn, $delete_query);
mysqli_stmt_bind_param($stmt, "i", $id);
if(mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    header('Location: index.php?msg=deleted');
} else {
    mysqli_stmt_close($stmt);
    header('Location: index.php?msg=error');
}
