<?php
require_once '../includes/config.php';
$id = intval($_GET['id'] ?? 0);
$doctor = ['id'=>'','name'=>'','title'=>'','description'=>''];
if($id > 0) {
    $result = mysqli_query($conn, "SELECT * FROM doctor WHERE id=$id LIMIT 1");
    if($row = mysqli_fetch_assoc($result)) {
        $doctor = $row;
    }
}
echo json_encode($doctor);
