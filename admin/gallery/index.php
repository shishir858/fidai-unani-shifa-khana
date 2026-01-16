
<?php
// Handle AJAX delete image (must be before any HTML output)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_image'], $_POST['id'], $_POST['image'])) {
    require_once '../includes/config.php';
    $id = intval($_POST['id']);
    $image = $_POST['image'];
    // Remove from DB
    mysqli_query($conn, "DELETE FROM gallery WHERE id = $id");
    // Remove file
    $file = dirname(__DIR__, 2) . '/' . ltrim($image, '/');
    if (file_exists($file)) {
        unlink($file);
    }
    exit;
}
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();

// Handle AJAX image upload (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['images'])) {
    $errors = [];
    $upload_count = 0;
    foreach($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        if(!empty($_FILES['images']['name'][$key])) {
            $file = [
                'name' => $_FILES['images']['name'][$key],
                'type' => $_FILES['images']['type'][$key],
                'tmp_name' => $_FILES['images']['tmp_name'][$key],
                'error' => $_FILES['images']['error'][$key],
                'size' => $_FILES['images']['size'][$key]
            ];
            $upload_result = upload_image($file, 'gallery');
            if($upload_result['success']) {
                $image_name = $upload_result['filename'];
                $insert_query = "INSERT INTO gallery (image, caption) VALUES ('assets/images/gallery/$image_name', '')";
                if(mysqli_query($conn, $insert_query)) {
                    $upload_count++;
                }
            } else {
                $errors[] = "Failed to upload " . $_FILES['images']['name'][$key] . ": " . $upload_result['message'];
            }
        }
    }
    if($upload_count > 0) {
        echo success_message('Images uploaded successfully!');
    } else {
        foreach($errors as $error) {
            echo error_message($error);
        }
    }
    exit;
}

// Get all gallery images
$query = "SELECT * FROM gallery ORDER BY id DESC";
$result = mysqli_query($conn, $query);

include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">
    <div class="page-header">
        <div>
            <h1 class="page-title">Gallery Management</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Gallery</li>
                </ol>
            </nav>
        </div>
        <div class="page-actions">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadGalleryModal">
                <i class="fas fa-plus me-2"></i>Add Images
            </button>
        <!-- Upload Gallery Modal -->
        <div class="modal fade" id="uploadGalleryModal" tabindex="-1" aria-labelledby="uploadGalleryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form id="galleryUploadForm" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="uploadGalleryModalLabel">Upload Gallery Images</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Category and Display Order removed -->
                            <div class="mb-3">
                                <label class="form-label">Select Images <span class="text-danger">*</span></label>
                                <input type="file" name="images[]" id="modalImages" class="form-control" accept="image/*" multiple required>
                                <small class="text-muted">You can select multiple images. Max 5MB per image.</small>
                            </div>
                            <div id="modalImagePreviewContainer" class="mb-3"></div>
                            <div id="galleryUploadError" class="alert alert-danger d-none"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-upload me-2"></i>Upload Images</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times me-2"></i>Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        <script>
        // Preview selected images in modal
        document.getElementById('modalImages').addEventListener('change', function(e) {
            const container = document.getElementById('modalImagePreviewContainer');
            container.innerHTML = '';
            Array.from(e.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    const img = document.createElement('img');
                    img.src = ev.target.result;
                    img.style.maxWidth = '100px';
                    img.style.marginRight = '8px';
                    img.style.marginBottom = '8px';
                    container.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        });

        // AJAX upload
        document.getElementById('galleryUploadForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const form = e.target;
            const formData = new FormData(form);
            const errorDiv = document.getElementById('galleryUploadError');
            errorDiv.classList.add('d-none');
            errorDiv.innerHTML = '';
            fetch(window.location.href, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if(data.includes('alert-danger')) {
                    errorDiv.classList.remove('d-none');
                    errorDiv.innerHTML = data;
                } else {
                    // Success: close modal, reload page (or use AJAX to refresh gallery)
                    var modal = bootstrap.Modal.getInstance(document.getElementById('uploadGalleryModal'));
                    modal.hide();
                    location.reload();
                }
            })
            .catch(() => {
                errorDiv.classList.remove('d-none');
                errorDiv.innerHTML = 'Upload failed. Please try again.';
            });
        });
        </script>
        </div>
    </div>

    <?php
    if(isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        if($msg == 'added') {
            echo success_message('Images uploaded successfully!');
        } elseif($msg == 'deleted') {
            echo success_message('Image deleted successfully!');
        }
    }
    ?>

    <div class="admin-card">
        <div class="card-body">
            <?php if(mysqli_num_rows($result) > 0): ?>
                <div class="row g-3">
                    <?php while($image = mysqli_fetch_assoc($result)): ?>
                    <div class="col-md-3">
                        <div class="gallery-item">
                            <div class="gallery-image">
                                  <img src="<?php echo '../../' . ltrim($image['image'], '/'); ?>" 
                                      alt="<?php echo htmlspecialchars($image['caption']); ?>" 
                                      class="img-fluid">
                                <div class="gallery-overlay">
                                                <a href="<?php echo '../../' . ltrim($image['image'], '/'); ?>" 
                                                    target="_blank" class="btn btn-sm btn-light me-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger delete-image-btn" data-id="<?php echo $image['id']; ?>" data-image="<?php echo htmlspecialchars($image['image']); ?>" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <script>
                                // Delete image AJAX
                                document.querySelectorAll('.delete-image-btn').forEach(btn => {
                                    btn.addEventListener('click', function(e) {
                                        e.preventDefault();
                                        if(!confirm('Are you sure you want to delete this image?')) return;
                                        const id = this.getAttribute('data-id');
                                        const image = this.getAttribute('data-image');
                                        fetch(window.location.href, {
                                            method: 'POST',
                                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                                            body: 'delete_image=1&id=' + encodeURIComponent(id) + '&image=' + encodeURIComponent(image)
                                        })
                                        .then(res => res.text())
                                        .then(() => location.reload());
                                    });
                                });
                                </script>
                                </div>
                            </div>
                            <div class="gallery-info p-2">
                                <h6 class="mb-1"><?php echo htmlspecialchars($image['caption']); ?></h6>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <i class="fas fa-images fa-3x text-muted mb-3"></i>
                    <p class="text-muted">No images in gallery. Click <b>Add Images</b> to upload.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

    <style>
.gallery-item {
    border: 1px solid #dee2e6;
    border-radius: 8px;
    overflow: hidden;
    transition: transform 0.3s ease;
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.gallery-image {
    position: relative;
    overflow: hidden;
    height: 200px;
    background: #f8f9fa;
}

.gallery-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-info {
    background: white;
}

.gallery-info h6 {
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
    /* Fix: Prevent content from going behind sidebar, use sidebar width */
    .main-content, .admin-card {
        margin-left: 10% !important;
    }
</style>

<?php include '../includes/footer.php'; ?>
