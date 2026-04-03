<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();

// Initialize variables for form fields
$doctor_name = '';
$related_treatments = '';
$status = 'active';
$meta_title = '';
$meta_description = '';
$meta_keywords = '';
$title = '';
$slug = '';
$short_description = '';
$full_description = '';
$symptoms = '';
$causes = '';
$procedure = '';
$medicines = '';
$duration = '';
$side_effects = '';
$precautions = '';

// Only process form if submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctor_name = isset($_POST['doctor_name']) ? mysqli_real_escape_string($conn, trim($_POST['doctor_name'])) : '';
    $related_treatments = isset($_POST['related_treatments']) ? mysqli_real_escape_string($conn, trim($_POST['related_treatments'])) : '';
    $status = isset($_POST['status']) && $_POST['status'] == 'inactive' ? 'inactive' : 'active';
    $meta_title = isset($_POST['meta_title']) ? mysqli_real_escape_string($conn, trim($_POST['meta_title'])) : '';
    $meta_description = isset($_POST['meta_description']) ? mysqli_real_escape_string($conn, trim($_POST['meta_description'])) : '';
    $meta_keywords = isset($_POST['meta_keywords']) ? mysqli_real_escape_string($conn, trim($_POST['meta_keywords'])) : '';
    $title = isset($_POST['title']) ? mysqli_real_escape_string($conn, trim($_POST['title'])) : '';
    $slug = isset($_POST['slug']) ? mysqli_real_escape_string($conn, trim($_POST['slug'])) : '';
    $short_raw = isset($_POST['short_description']) ? sanitize_treatment_editor_html($_POST['short_description']) : '';
    $full_raw = isset($_POST['full_description']) ? sanitize_treatment_editor_html($_POST['full_description']) : '';
    $short_description = mysqli_real_escape_string($conn, trim($short_raw));
    $full_description = mysqli_real_escape_string($conn, trim($full_raw));
    $symptoms = isset($_POST['symptoms']) ? mysqli_real_escape_string($conn, trim($_POST['symptoms'])) : '';
    $causes = isset($_POST['causes']) ? mysqli_real_escape_string($conn, trim($_POST['causes'])) : '';
    $procedure = isset($_POST['procedure']) ? mysqli_real_escape_string($conn, trim($_POST['procedure'])) : '';
    $medicines = isset($_POST['medicines']) ? mysqli_real_escape_string($conn, trim($_POST['medicines'])) : '';
    $duration = isset($_POST['duration']) ? mysqli_real_escape_string($conn, trim($_POST['duration'])) : '';
    $side_effects = isset($_POST['side_effects']) ? mysqli_real_escape_string($conn, trim($_POST['side_effects'])) : '';
    $precautions = isset($_POST['precautions']) ? mysqli_real_escape_string($conn, trim($_POST['precautions'])) : '';
    $features = isset($_POST['features']) ? mysqli_real_escape_string($conn, trim($_POST['features'])) : '';
    $care_plans = isset($_POST['care_plans']) ? mysqli_real_escape_string($conn, trim($_POST['care_plans'])) : '';
    $core_values = isset($_POST['core_values']) ? mysqli_real_escape_string($conn, trim($_POST['core_values'])) : '';
    $faqs_post = isset($_POST['faqs']) && is_array($_POST['faqs']) ? $_POST['faqs'] : [];
    $health_tips = mysqli_real_escape_string($conn, json_encode($faqs_post, JSON_UNESCAPED_UNICODE));

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
        $upload_result = upload_image($_FILES['feature_image'], 'treatments');
        if ($upload_result['success']) {
            $feature_image = $upload_result['filename'];
        } else {
            $errors[] = 'Feature image upload error: ' . $upload_result['message'] . '<br>_FILES error code: ' . $_FILES['feature_image']['error'] . '<br>Size: ' . $_FILES['feature_image']['size'] . ' bytes';
        }
    }

    if (empty($errors)) {
        $insert_query = "INSERT INTO treatments (
            title, slug, short_description, full_description, symptoms, causes, `procedure`, medicines, duration, side_effects, precautions, doctor_name, related_treatments, status, feature_image, meta_title, meta_description, meta_keywords, features, care_plans, core_values, health_tips, created_at
        ) VALUES (
            '$title', '$slug', '$short_description', '$full_description', '$symptoms', '$causes', '$procedure', '$medicines', '$duration', '$side_effects', '$precautions', '$doctor_name', '$related_treatments', '$status', '$feature_image', '$meta_title', '$meta_description', '$meta_keywords', '$features', '$care_plans', '$core_values', '$health_tips', NOW()
        )";
        if (mysqli_query($conn, $insert_query)) {
            $treatment_id = mysqli_insert_id($conn);
            // Handle gallery images upload
            if(isset($_FILES['gallery_images']) && count($_FILES['gallery_images']['name']) > 0) {
                $gallery_dir = '../../assets/images/treatments/';
                if(!is_dir($gallery_dir)) { mkdir($gallery_dir, 0777, true); }
                foreach($_FILES['gallery_images']['name'] as $k => $img_name) {
                    if(!empty($img_name)) {
                        $ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
                        $allowed = ['jpg','jpeg','png','gif','webp'];
                        if(in_array($ext, $allowed)) {
                            $new_name = uniqid('gallery_', true) . '.' . $ext;
                            $target_file = $gallery_dir . $new_name;
                            if(move_uploaded_file($_FILES['gallery_images']['tmp_name'][$k], $target_file)) {
                                $caption = mysqli_real_escape_string($conn, $_POST['gallery_captions'][$k] ?? '');
                                $insert_gallery = "INSERT INTO treatment_gallery (treatment_id, image_path, caption) VALUES ($treatment_id, '$new_name', '$caption')";
                                mysqli_query($conn, $insert_gallery);
                            }
                        }
                    }
                }
            }
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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">

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
                    <textarea name="short_description" id="short_description" class="form-control treatment-summernote" rows="4"><?php echo isset($_POST['short_description']) ? treatment_editor_textarea_value($_POST['short_description']) : ''; ?></textarea>
                    <small class="text-muted">Formatting toolbar: headings, lists, links, images (saved on your server).</small>
                </div>
                <div class="mb-3" style="margin-top: 90px;">
                    <label class="form-label">Full Description</label>
                    <textarea name="full_description" id="full_description" class="form-control treatment-summernote" rows="8"><?php echo isset($_POST['full_description']) ? treatment_editor_textarea_value($_POST['full_description']) : ''; ?></textarea>
                </div>
            </div>
        </div>
        <div class="admin-card mb-4">
            <div class="card-header"><h5 class="mb-0">Key Features, Care Plans, Core Values, Health Tips</h5></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Key Features <span class="text-danger">*</span></label>
                    <textarea name="features" class="form-control" rows="3" placeholder="Enter one feature per line"><?php echo isset($_POST['features']) ? htmlspecialchars($_POST['features']) : ''; ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Care Plans <span class="text-danger">*</span></label>
                    <textarea name="care_plans" class="form-control" rows="3" placeholder="Enter one care plan per line"><?php echo isset($_POST['care_plans']) ? htmlspecialchars($_POST['care_plans']) : ''; ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Our Core Values <span class="text-danger">*</span></label>
                    <textarea name="core_values" class="form-control" rows="3" placeholder="Enter one core value per line"><?php echo isset($_POST['core_values']) ? htmlspecialchars($_POST['core_values']) : ''; ?></textarea>
                </div>
                <div class="mb-3">
                        <label class="form-label">Health Tips & Info (FAQs)</label>
                        <div id="faqs-block">
                            <?php 
                            $faqs = isset($_POST['faqs']) && is_array($_POST['faqs']) ? $_POST['faqs'] : [['question'=>'','answer'=>'']];
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
                    <label for="gallery_images" class="form-label">Gallery Images</label>
                    <input type="file" class="form-control" id="gallery_images" name="gallery_images[]" accept="image/*" multiple>
                    <small class="text-muted">You can select multiple images. (Optional)</small>
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

<?php
$extra_footer_scripts = <<<'JS'
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
(function() {
    var uploadUrl = 'upload_editor_image.php';
    var toolbar = [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr']],
        ['view', ['fullscreen', 'codeview']],
        ['misc', ['undo', 'redo']]
    ];
    var styleTags = ['p', 'blockquote', 'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
    function bindSummernote(el, height) {
        var $el = jQuery(el);
        $el.summernote({
            height: height,
            dialogsInBody: true,
            disableDragAndDrop: false,
            tabsize: 2,
            toolbar: toolbar,
            styleTags: styleTags,
            callbacks: {
                onImageUpload: function(files) {
                    for (var i = 0; i < files.length; i++) {
                        (function(file) {
                            var fd = new FormData();
                            fd.append('file', file);
                            jQuery.ajax({
                                url: uploadUrl,
                                type: 'POST',
                                data: fd,
                                processData: false,
                                contentType: false,
                                dataType: 'json'
                            }).done(function(res) {
                                if (res && res.url) {
                                    $el.summernote('insertImage', res.url);
                                }
                            });
                        })(files[i]);
                    }
                }
            }
        });
    }
    jQuery(function() {
        bindSummernote('#short_description', 220);
        bindSummernote('#full_description', 360);
    });
})();
</script>
JS;
include '../includes/footer.php';