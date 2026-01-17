<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();
$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $image = '';
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
    $check_query = "SELECT id FROM categories WHERE name = '$name'";
    $check_result = mysqli_query($conn, $check_query);
    if(mysqli_num_rows($check_result) > 0) {
        $error = 'Category name already exists. Please use a different name.';
    } else {
        $query = "INSERT INTO categories (name, image) VALUES ('$name', '$image')";
        if(mysqli_query($conn, $query)) {
            header('Location: index.php?msg=added');
            exit;
        } else {
            $error = 'Error adding category: ' . mysqli_error($conn);
        }
    }
}
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<?php


$error = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $check_query = "SELECT id FROM categories WHERE name = '$name'";
    $check_result = mysqli_query($conn, $check_query);
    if(mysqli_num_rows($check_result) > 0) {
        $error = 'Category name already exists. Please use a different name.';
    } else {
        $query = "INSERT INTO categories (name) VALUES ('$name')";
        if(mysqli_query($conn, $query)) {
            header('Location: index.php?msg=added');
            exit;
        } else {
            $error = 'Error adding category: ' . mysqli_error($conn);
        }
    }
}
include '../includes/header.php';
include '../includes/sidebar.php';
?>
<div class="container mt-4">
    <h2>Add Category</h2>
    <?php if($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Category Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
                            <a href="https://fontawesome.com/icons" target="_blank">Browse icons</a>
                        </small>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="display_order" class="form-label">Display Order</label>
                        <input type="number" class="form-control" id="display_order" name="display_order" 
                               value="<?php echo isset($_POST['display_order']) ? $_POST['display_order'] : '0'; ?>"
                               min="0">
                        <small class="text-muted">Lower numbers appear first</small>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                               <?php echo (isset($_POST['is_active']) || !isset($_POST['name'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="is_active">
                            Active (visible on website)
                        </label>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="show_in_header" name="show_in_header" 
                               <?php echo (isset($_POST['show_in_header']) || !isset($_POST['name'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="show_in_header">
                            <i class="fas fa-bars me-1"></i> Show in Header Menu
                        </label>
                        <small class="d-block text-muted mt-1">Display this category in the header navigation dropdown</small>
                    </div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save"></i> Save Category
                    </button>
                    <a href="index.php" class="btn btn-light">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="admin-card">
            <h3>Quick Tips</h3>
            <ul class="list-unstyled">
                <li class="mb-2"><i class="fas fa-check text-success"></i> Use clear, descriptive names</li>
                <li class="mb-2"><i class="fas fa-check text-success"></i> Slug will auto-generate from name</li>
                <li class="mb-2"><i class="fas fa-check text-success"></i> Icon is optional but recommended</li>
                <li class="mb-2"><i class="fas fa-check text-success"></i> Set display order to control positioning</li>
            </ul>
        </div>
        
        <div class="admin-card">
            <h3>Examples</h3>
            <table class="table table-sm">
                <tbody>
                    <tr>
                        <td><i class="fas fa-mountain text-primary"></i></td>
                        <td><code>fas fa-mountain</code></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-umbrella-beach text-info"></i></td>
                        <td><code>fas fa-umbrella-beach</code></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-plane text-danger"></i></td>
                        <td><code>fas fa-plane</code></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-hiking text-success"></i></td>
                        <td><code>fas fa-hiking</code></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
$custom_js = "
// Auto-generate slug from name
document.getElementById('name').addEventListener('input', function() {
    const slug = this.value.toLowerCase()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');
    document.getElementById('slug').value = slug;
});

// Icon preview
document.getElementById('icon').addEventListener('input', function() {
    const iconPreview = document.getElementById('iconPreview');
    iconPreview.className = this.value || 'fas fa-folder';
});
";
include '../includes/footer.php'; 
?>
