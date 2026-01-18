<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}
$id = intval($_GET['id']);

$query = "SELECT * FROM treatments WHERE id = $id";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) == 0) {
    header('Location: index.php');
    exit;
}
$treatment = mysqli_fetch_assoc($result);

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
    $features = isset($_POST['features']) ? mysqli_real_escape_string($conn, trim($_POST['features'])) : '';
    $care_plans = isset($_POST['care_plans']) ? mysqli_real_escape_string($conn, trim($_POST['care_plans'])) : '';
    $core_values = isset($_POST['core_values']) ? mysqli_real_escape_string($conn, trim($_POST['core_values'])) : '';
    $faqs = isset($_POST['faqs']) && is_array($_POST['faqs']) ? json_encode($_POST['faqs'], JSON_UNESCAPED_UNICODE) : '';

    if (empty($title)) {
        $errors[] = "Treatment title is required";
    }
    if (empty($slug)) {
        $slug = generate_slug($title);
    }
    // Check slug uniqueness (excluding current treatment)
    $check_query = "SELECT id FROM treatments WHERE slug = '$slug' AND id != $id";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        $errors[] = "Slug already exists. Please use a different one.";
    }

    // Handle feature image upload
    $feature_image = $treatment['feature_image'];
    if (!empty($_FILES['feature_image']['name'])) {
        $upload_result = upload_image($_FILES['feature_image'], 'treatments');
        if ($upload_result['success']) {
            // Delete old image if exists
            if (!empty($treatment['feature_image'])) {
                delete_image('../../assets/images/treatments/' . $treatment['feature_image']);
            }
            $feature_image = $upload_result['filename'];
        } else {
            $errors[] = 'Feature image upload error: ' . $upload_result['message'] . '<br>_FILES error code: ' . $_FILES['feature_image']['error'] . '<br>Size: ' . $_FILES['feature_image']['size'] . ' bytes';
        }
    }

    if (empty($errors)) {
        $update_query = "UPDATE treatments SET
            title = '$title',
            slug = '$slug',
            short_description = '$short_description',
            full_description = '$full_description',
            symptoms = '$symptoms',
            causes = '$causes',
            `procedure` = '$procedure',
            medicines = '$medicines',
            duration = '$duration',
            side_effects = '$side_effects',
            precautions = '$precautions',
            doctor_name = '$doctor_name',
            related_treatments = '$related_treatments',
            features = '$features',
            care_plans = '$care_plans',
            core_values = '$core_values',
            health_tips = '$faqs',
            status = '$status',
            feature_image = '$feature_image',
            meta_title = '$meta_title',
            meta_description = '$meta_description',
            meta_keywords = '$meta_keywords',
            updated_at = NOW()
            WHERE id = $id";
        if (mysqli_query($conn, $update_query)) {
            $success = true;
            $treatment = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM treatments WHERE id = $id"));
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
            <h1 class="page-title">Edit Treatment</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="index.php">Treatments</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>
    </div>

    <?php
    if ($success) {
        echo success_message('Treatment updated successfully!');
    }
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
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" value="<?php echo htmlspecialchars($treatment['title']); ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Slug <span class="text-danger">*</span></label>
                        <input type="text" name="slug" id="slug" class="form-control" value="<?php echo htmlspecialchars($treatment['slug']); ?>" required>
                        <small class="text-muted">Auto-generated from title. Used in URL.</small>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="2"><?php echo htmlspecialchars($treatment['short_description'] ?? ''); ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Full Description</label>
                    <textarea name="full_description" class="form-control" rows="5"><?php echo htmlspecialchars($treatment['full_description'] ?? ''); ?></textarea>
                </div>
            </div>
        </div>
        <div class="admin-card mb-4">
            <div class="card-header"><h5 class="mb-0">Key Features, Care Plans, Core Values, Health Tips</h5></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Key Features <span class="text-danger">*</span></label>
                    <textarea name="features" class="form-control" rows="3" placeholder="Enter one feature per line"><?php echo htmlspecialchars($treatment['features'] ?? ''); ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Care Plans <span class="text-danger">*</span></label>
                    <textarea name="care_plans" class="form-control" rows="3" placeholder="Enter one care plan per line"><?php echo htmlspecialchars($treatment['care_plans'] ?? ''); ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Our Core Values <span class="text-danger">*</span></label>
                    <textarea name="core_values" class="form-control" rows="3" placeholder="Enter one core value per line"><?php echo htmlspecialchars($treatment['core_values'] ?? ''); ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Health Tips & Info (FAQs)</label>
                    <div id="faqs-block">
                        <?php 
                        $faqs = [];
                        if (!empty($treatment['health_tips'])) {
                            $faqs = json_decode($treatment['health_tips'], true);
                        }
                        if (!$faqs || !is_array($faqs)) $faqs = [['question'=>'','answer'=>'']];
                        foreach($faqs as $i => $faq): ?>
                        <div class="faq-item mb-2">
                            <input type="text" name="faqs[<?php echo $i; ?>][question]" class="form-control mb-1" placeholder="FAQ Question" value="<?php echo htmlspecialchars($faq['question']); ?>">
                            <textarea name="faqs[<?php echo $i; ?>][answer]" class="form-control" rows="2" placeholder="FAQ Answer"><?php echo htmlspecialchars($faq['answer']); ?></textarea>
                            <button type="button" class="btn btn-danger btn-sm mt-1 remove-faq">Remove</button>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm mt-2" id="add-faq">Add FAQ</button>
                </div>
            </div>
        </div>
        <div class="admin-card mb-4">
            <div class="card-header"><h5 class="mb-0">Medical Details</h5></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Symptoms</label>
                        <textarea name="symptoms" class="form-control" rows="2"><?php echo htmlspecialchars($treatment['symptoms'] ?? ''); ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Causes</label>
                        <textarea name="causes" class="form-control" rows="2"><?php echo htmlspecialchars($treatment['causes'] ?? ''); ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Procedure</label>
                        <textarea name="procedure" class="form-control" rows="2"><?php echo htmlspecialchars($treatment['procedure'] ?? ''); ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Medicines</label>
                        <textarea name="medicines" class="form-control" rows="2"><?php echo htmlspecialchars($treatment['medicines'] ?? ''); ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Duration</label>
                        <input type="text" name="duration" class="form-control" value="<?php echo htmlspecialchars($treatment['duration'] ?? ''); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Side Effects</label>
                        <textarea name="side_effects" class="form-control" rows="2"><?php echo htmlspecialchars($treatment['side_effects'] ?? ''); ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Precautions</label>
                        <textarea name="precautions" class="form-control" rows="2"><?php echo htmlspecialchars($treatment['precautions'] ?? ''); ?></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Doctor Name</label>
                        <input type="text" name="doctor_name" class="form-control" value="<?php echo htmlspecialchars($treatment['doctor_name'] ?? ''); ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Related Treatments (IDs, comma separated)</label>
                    <input type="text" name="related_treatments" class="form-control" value="<?php echo htmlspecialchars($treatment['related_treatments'] ?? ''); ?>">
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
                        <input type="text" name="meta_title" class="form-control" value="<?php echo htmlspecialchars($treatment['meta_title'] ?? ''); ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="2"><?php echo htmlspecialchars($treatment['meta_description'] ?? ''); ?></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" value="<?php echo htmlspecialchars($treatment['meta_keywords'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Feature Image</label>
                    <?php 
                    if (!empty($treatment['feature_image'])) : 
                        $img_src = '../../assets/images/treatments/' . $treatment['feature_image']; ?>
                        <div class="mb-2">
                            <img src="<?php echo $img_src; ?>" alt="Current Image" class="img-thumbnail" style="max-width: 400px;">
                            <p class="text-muted small mt-1">Current image</p>
                            <div class="mt-1"><strong>Image URL:</strong> <a href="<?php echo $img_src; ?>" target="_blank"><?php echo $img_src; ?></a></div>
                        </div>
                    <?php else: ?>
                        <div class="mb-2 text-danger">No image found.</div>
                    <?php endif; ?>
                    <input type="file" name="feature_image" id="feature_image" class="form-control" accept="image/*">
                    <small class="text-muted">Leave empty to keep current image. Recommended: 1200x800px, Max 100-100kb.</small>
                    <div id="featuredImagePreview" class="mt-2"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" <?php echo ($treatment['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                        <option value="inactive" <?php echo ($treatment['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Update Treatment
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
// Dynamic FAQ add/remove
document.getElementById('add-faq').addEventListener('click', function() {
    const faqsBlock = document.getElementById('faqs-block');
    const idx = faqsBlock.querySelectorAll('.faq-item').length;
    const faqDiv = document.createElement('div');
    faqDiv.className = 'faq-item mb-2';
    faqDiv.innerHTML = `
        <input type="text" name="faqs[${idx}][question]" class="form-control mb-1" placeholder="FAQ Question">
        <textarea name="faqs[${idx}][answer]" class="form-control" rows="2" placeholder="FAQ Answer"></textarea>
        <button type="button" class="btn btn-danger btn-sm mt-1 remove-faq">Remove</button>
    `;
    faqsBlock.appendChild(faqDiv);
});
document.getElementById('faqs-block').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-faq')) {
        e.target.parentElement.remove();
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
    