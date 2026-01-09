<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();

if(!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}
$id = intval($_GET['id']);

// Delete related appointments first to avoid foreign key constraint error
$del_appointments = "DELETE FROM appointments WHERE treatment_id = $id";
mysqli_query($conn, $del_appointments);

// Delete gallery images
$gallery_query = "SELECT image_path FROM treatment_gallery WHERE treatment_id = ?";
$stmt = mysqli_prepare($conn, $gallery_query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$gallery_result = mysqli_stmt_get_result($stmt);
while($row = mysqli_fetch_assoc($gallery_result)) {
    $img_path = '../../assets/images/treatments/' . $row['image_path'];
    if(file_exists($img_path)) unlink($img_path);
}
mysqli_stmt_close($stmt);
mysqli_query($conn, "DELETE FROM treatment_gallery WHERE treatment_id = $id");

// Delete feature image
$img_query = "SELECT feature_image FROM treatments WHERE id = $id";
$img_result = mysqli_query($conn, $img_query);
if($img_result && $img = mysqli_fetch_assoc($img_result)) {
    $img_path = '../../assets/images/treatments/' . $img['feature_image'];
    if($img['feature_image'] && file_exists($img_path)) unlink($img_path);
}

// Delete treatment
$del_query = "DELETE FROM treatments WHERE id = $id";
if(mysqli_query($conn, $del_query)) {
    header('Location: index.php?msg=deleted');
    exit;
} else {
    header('Location: index.php?msg=error');
    exit;
}
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

$stmt = mysqli_prepare($conn, "DELETE FROM package_itinerary WHERE package_id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

$stmt = mysqli_prepare($conn, "DELETE FROM package_pricing WHERE package_id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// Delete package
$delete_query = "DELETE FROM tour_packages WHERE id = ?";
$stmt = mysqli_prepare($conn, $delete_query);
mysqli_stmt_bind_param($stmt, "i", $id);

if(mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    // Delete image file if exists
    if(!empty($package['featured_image'])) {
        delete_image('../uploads/packages/' . $package['featured_image']);
    }
    header('Location: index.php?msg=deleted');
} else {
    mysqli_stmt_close($stmt);
    header('Location: index.php?msg=error');
}
exit;
?>
