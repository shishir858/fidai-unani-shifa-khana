<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();
$error = '';
if(!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}
$id = intval($_GET['id']);
$query = "SELECT id, name, image FROM categories WHERE id = $id";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) == 0) {
    header('Location: index.php');
    exit;
}
$category = mysqli_fetch_assoc($result);
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $image = $category['image'];
    // Handle image upload
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = '../../assets/images/categories/';
        if(!is_dir($target_dir)) { mkdir($target_dir, 0777, true); }
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif','webp'];
        if(in_array($ext, $allowed)) {
            $img_name = uniqid('cat_', true) . '.' . $ext;
            $target_file = $target_dir . $img_name;
            if(move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $image = $img_name;
            }
        }
    }
    $check_query = "SELECT id FROM categories WHERE name = '$name' AND id != $id";
    $check_result = mysqli_query($conn, $check_query);
    if(mysqli_num_rows($check_result) > 0) {
        $error = 'Category name already exists. Please use a different name.';
    } else {
        $query = "UPDATE categories SET name = '$name', image = '$image' WHERE id = $id";
        if(mysqli_query($conn, $query)) {
            header('Location: index.php?msg=updated');
            exit;
        } else {
            $error = 'Error updating category: ' . mysqli_error($conn);
        }
    }
}
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<style>
    .admin-content {
        margin-left: 20%!important;
    }
</style>

<div class="container mt-4">
    <h2>Edit Category</h2>
    <?php if($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($category['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Category Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <?php if(!empty($category['image'])): ?>
                <div class="mt-2">
                    <img src="../assets/images/categories/<?php echo $category['image']; ?>" alt="Category Image" style="max-width:120px;max-height:80px;">
                </div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    // Check if name already exists (excluding current category)
    $check_query = "SELECT id FROM categories WHERE name = '$name' AND id != $id";
    $check_result = mysqli_query($conn, $check_query);
    if(mysqli_num_rows($check_result) > 0) {
        $error = 'Category name already exists. Please use a different name.';
    } else {
        $query = "UPDATE categories SET name = '$name' WHERE id = $id";
        if(mysqli_query($conn, $query)) {
            header('Location: index.php?msg=updated');
            exit;
        } else {
            $error = 'Error updating category: ' . mysqli_error($conn);
        }
    }
<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();
$error = '';
if(!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}
$id = intval($_GET['id']);
$query = "SELECT id, name FROM categories WHERE id = $id";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) == 0) {
    header('Location: index.php');
    exit;
}
$category = mysqli_fetch_assoc($result);
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $check_query = "SELECT id FROM categories WHERE name = '$name' AND id != $id";
    $check_result = mysqli_query($conn, $check_query);
    if(mysqli_num_rows($check_result) > 0) {
        $error = 'Category name already exists. Please use a different name.';
    } else {
        $query = "UPDATE categories SET name = '$name' WHERE id = $id";
        if(mysqli_query($conn, $query)) {
            header('Location: index.php?msg=updated');
            exit;
        } else {
            $error = 'Error updating category: ' . mysqli_error($conn);
        }
    }
}
include '../includes/header.php';
include '../includes/sidebar.php';
?>
<div class="container mt-4">
    <h2>Edit Category</h2>
    <?php if($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($category['name']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="display_order" class="form-label">Display Order</label>
                        <input type="number" class="form-control" id="display_order" name="display_order" 
                               value="<?php echo $category['display_order']; ?>" min="0">
                        <small class="text-muted">Lower numbers appear first</small>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" <?php echo $category['is_active'] ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="is_active">
                            Active (visible on website)
                        </label>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="show_in_header" name="show_in_header" 
                               <?php echo $category['show_in_header'] ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="show_in_header">
                            <i class="fas fa-bars me-1"></i> Show in Header Menu
                        </label>
                        <small class="d-block text-muted mt-1">Display this category in the header navigation dropdown</small>
                    </div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save"></i> Update Category
                    </button>
                    <a href="index.php" class="btn btn-light">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="admin-card">
            <h3>Category Stats</h3>
            <?php
            // Get package count
            $package_count_query = "SELECT COUNT(*) as count FROM tour_packages WHERE category_id = $id";
            $package_count_result = mysqli_query($conn, $package_count_query);
            $package_count = mysqli_fetch_assoc($package_count_result)['count'];
            ?>
            <div class="list-group list-group-flush">
                <div class="list-group-item d-flex justify-content-between">
                    <span><i class="fas fa-box"></i> Total Packages</span>
                    <span class="badge bg-primary"><?php echo $package_count; ?></span>
                </div>
                <div class="list-group-item d-flex justify-content-between">
                    <span><i class="fas fa-calendar"></i> Created</span>
                    <span><?php echo format_date($category['created_at']); ?></span>
                </div>
                <div class="list-group-item d-flex justify-content-between">
                    <span><i class="fas fa-clock"></i> Updated</span>
                    <span><?php echo format_date($category['updated_at']); ?></span>
                </div>
            </div>
        </div>
        
        <div class="admin-card">
            <h3>Danger Zone</h3>
            <p class="text-muted small">Deleting this category will require reassigning all packages.</p>
            <a href="delete.php?id=<?php echo $id; ?>" 
               class="btn btn-danger btn-sm w-100"
               onclick="return confirmDelete('Delete this category? All packages will remain but need reassignment.')">
                <i class="fas fa-trash"></i> Delete Category
            </a>
        </div>
    </div>
</div>

<?php 
$custom_js = "
// Icon preview
document.getElementById('icon').addEventListener('input', function() {
    const iconPreview = document.getElementById('iconPreview');
    iconPreview.className = this.value || 'fas fa-folder';
});
";
include '../includes/footer.php'; 

?>
