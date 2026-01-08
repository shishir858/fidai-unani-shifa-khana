<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, trim($_POST['title']));
    $slug = mysqli_real_escape_string($conn, trim($_POST['slug']));
    $short_description = mysqli_real_escape_string($conn, trim($_POST['short_description']));
    $full_description = mysqli_real_escape_string($conn, trim($_POST['full_description']));
    $symptoms = mysqli_real_escape_string($conn, trim($_POST['symptoms']));
    $causes = mysqli_real_escape_string($conn, trim($_POST['causes']));
    $procedure = mysqli_real_escape_string($conn, trim($_POST['procedure']));
    $medicines = mysqli_real_escape_string($conn, trim($_POST['medicines']));
    $duration = mysqli_real_escape_string($conn, trim($_POST['duration']));
    $side_effects = mysqli_real_escape_string($conn, trim($_POST['side_effects']));
    $precautions = mysqli_real_escape_string($conn, trim($_POST['precautions']));
    $doctor_name = mysqli_real_escape_string($conn, trim($_POST['doctor_name']));
    $related_treatments = mysqli_real_escape_string($conn, trim($_POST['related_treatments']));
    $status = isset($_POST['status']) && $_POST['status'] == 'inactive' ? 'inactive' : 'active';
    $meta_title = mysqli_real_escape_string($conn, trim($_POST['meta_title']));
    $meta_description = mysqli_real_escape_string($conn, trim($_POST['meta_description']));
    $meta_keywords = mysqli_real_escape_string($conn, trim($_POST['meta_keywords']));

    // Validation
    if (empty($title)) {
        $errors[] = "Treatment title is required";
    }
    if (empty($slug)) {
        $slug = generate_slug($title);
    }
    // Check slug uniqueness
    $check_query = "SELECT id FROM treatments WHERE slug = '$slug'";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        $errors[] = "Slug already exists. Please use a different one.";
    }

    // Handle feature image upload
    $feature_image = '';
    if (!empty($_FILES['feature_image']['name'])) {
        $upload_result = upload_image($_FILES['feature_image'], '../../assets/images/treatments');
        if ($upload_result['success']) {
            $feature_image = $upload_result['filename'];
        } else {
            $errors[] = $upload_result['error'];
        }
    }

    if (empty($errors)) {
        $insert_query = "INSERT INTO treatments (
            title, slug, short_description, full_description, symptoms, causes, procedure, medicines, duration, side_effects, precautions, doctor_name, related_treatments, status, feature_image, meta_title, meta_description, meta_keywords, created_at
        ) VALUES (
            '$title', '$slug', '$short_description', '$full_description', '$symptoms', '$causes', '$procedure', '$medicines', '$duration', '$side_effects', '$precautions', '$doctor_name', '$related_treatments', '$status', '$feature_image', '$meta_title', '$meta_description', '$meta_keywords', NOW()
        )";
        if (mysqli_query($conn, $insert_query)) {
            header('Location: index.php?msg=added');
            exit;
        } else {
            $errors[] = "Database error: " . mysqli_error($conn);
        }
    }
}

include '../includes/header.php';
include '../includes/sidebar.php';
?>

<style>
    .admin-content{
        margin-left: 20%!important;
    }
</style>

<div class="main-content">
    <div class="page-header">
        <div>
            <h1 class="page-title">Add Treatment</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="index.php">Treatments</a></li>
                    <li class="breadcrumb-item active">Add New</li>
                </ol>
            </nav>
        </div>
    </div>

    <?php
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo error_message($error);
        }
    }
    ?>

    <form method="POST" enctype="multipart/form-data" id="treatmentForm">
        <div class="admin-card mb-4">
            <div class="card-header"><h5 class="mb-0">Basic Information</h5></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Slug <span class="text-danger">*</span></label>
                        <input type="text" name="slug" id="slug" class="form-control" value="<?php echo isset($_POST['slug']) ? htmlspecialchars($_POST['slug']) : ''; ?>" required>
                        <small class="text-muted">Auto-generated from title. Used in URL.</small>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category_id" class="form-select" required>
                            <option value="0">Select Category</option>
                            <?php 
                            $categories_query = "SELECT * FROM categories ORDER BY name";
                            $categories = mysqli_query($conn, $categories_query);
                            while($cat = mysqli_fetch_assoc($categories)): 
                            ?>
                                <option value="<?php echo $cat['id']; ?>" <?php echo (isset($_POST['category_id']) && $_POST['category_id'] == $cat['id']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($cat['name']); ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="2"><?php echo isset($_POST['short_description']) ? htmlspecialchars($_POST['short_description']) : ''; ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Full Description</label>
                    <textarea name="full_description" class="form-control" rows="5"><?php echo isset($_POST['full_description']) ? htmlspecialchars($_POST['full_description']) : ''; ?></textarea>
                </div>
            </div>
        </div>
        <div class="admin-card mb-4">
            <div class="card-header"><h5 class="mb-0">Medical Details</h5></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Symptoms</label>
                        <textarea name="symptoms" class="form-control" rows="2"><?php echo isset($_POST['symptoms']) ? htmlspecialchars($_POST['symptoms']) : ''; ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Causes</label>
                        <textarea name="causes" class="form-control" rows="2"><?php echo isset($_POST['causes']) ? htmlspecialchars($_POST['causes']) : ''; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Procedure</label>
                        <textarea name="procedure" class="form-control" rows="2"><?php echo isset($_POST['procedure']) ? htmlspecialchars($_POST['procedure']) : ''; ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Medicines</label>
                        <textarea name="medicines" class="form-control" rows="2"><?php echo isset($_POST['medicines']) ? htmlspecialchars($_POST['medicines']) : ''; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Duration</label>
                        <input type="text" name="duration" class="form-control" value="<?php echo isset($_POST['duration']) ? htmlspecialchars($_POST['duration']) : ''; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Side Effects</label>
                        <textarea name="side_effects" class="form-control" rows="2"><?php echo isset($_POST['side_effects']) ? htmlspecialchars($_POST['side_effects']) : ''; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Precautions</label>
                        <textarea name="precautions" class="form-control" rows="2"><?php echo isset($_POST['precautions']) ? htmlspecialchars($_POST['precautions']) : ''; ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Doctor Name</label>
                        <input type="text" name="doctor_name" class="form-control" value="<?php echo isset($_POST['doctor_name']) ? htmlspecialchars($_POST['doctor_name']) : ''; ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Related Treatments (IDs, comma separated)</label>
                    <input type="text" name="related_treatments" class="form-control" value="<?php echo isset($_POST['related_treatments']) ? htmlspecialchars($_POST['related_treatments']) : ''; ?>">
                    <small class="text-muted">Enter treatment IDs separated by comma for related treatments.</small>
                </div>
            </div>
        </div>
        <div class="admin-card mb-4">
            <div class="card-header"><h5 class="mb-0">SEO & Image</h5></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="<?php echo isset($_POST['meta_title']) ? htmlspecialchars($_POST['meta_title']) : ''; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="2"><?php echo isset($_POST['meta_description']) ? htmlspecialchars($_POST['meta_description']) : ''; ?></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" value="<?php echo isset($_POST['meta_keywords']) ? htmlspecialchars($_POST['meta_keywords']) : ''; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Feature Image</label>
                    <input type="file" name="feature_image" id="feature_image" class="form-control" accept="image/*">
                    <small class="text-muted">Main image for this treatment. Recommended: 1200x800px, Max 5MB.</small>
                    <div id="featuredImagePreview" class="mt-2"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?php echo (!isset($_POST['status']) || $_POST['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                        <option value="inactive" <?php echo (isset($_POST['status']) && $_POST['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Save Treatment
            </button>
            <a href="index.php" class="btn btn-secondary">
                <i class="fas fa-times me-2"></i>Cancel
            </a>
        </div>
    </form>
</div>

<script>
// Auto-generate slug from title
document.getElementById('title').addEventListener('input', function() {
    const slug = this.value
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '');
    document.getElementById('slug').value = slug;
});
// Featured image preview
document.getElementById('feature_image').addEventListener('change', function(e) {
    const preview = document.getElementById('featuredImagePreview');
    const file = e.target.files[0];
    if(file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 400px;">';
        }
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = '';
    }
});
setTimeout(function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        alert.style.transition = 'opacity 0.5s';
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 500);
    });
}, 5000);
</script>

<?php include '../includes/footer.php'; ?>