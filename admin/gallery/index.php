<?php
// Modern Gallery Management (AJAX delete, upload, toast, card grid)
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();

// AJAX delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_image'], $_POST['id'], $_POST['image'])) {
    error_reporting(E_ALL); ini_set('display_errors', 1);
    $id = intval($_POST['id']);
    $image = $_POST['image'];
    $delete = mysqli_query($conn, "DELETE FROM gallery WHERE id = $id");
    $file = dirname(__DIR__, 2) . '/' . ltrim($image, '/');
    $file_deleted = true;
    if (file_exists($file)) {
        $file_deleted = unlink($file);
    }
    if ($delete && $file_deleted) {
        exit('success');
    } else {
        $err = 'Delete failed: ';
        if (!$delete) $err .= 'DB error: ' . mysqli_error($conn) . '. ';
        if (!$file_deleted) $err .= 'File delete error.';
        exit($err);
    }
}

// AJAX upload
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
                if(mysqli_query($conn, $insert_query)) $upload_count++;
            } else {
                $errors[] = "Failed to upload " . $_FILES['images']['name'][$key] . ": " . $upload_result['message'];
            }
        }
    }
    if($upload_count > 0) {
        exit('success');
    } else {
        exit('error: ' . implode(', ', $errors));
    }
}

$query = "SELECT * FROM gallery ORDER BY id DESC";
$result = mysqli_query($conn, $query);
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">
    <div class="page-header d-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title fw-bold">Gallery</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Gallery</li>
                </ol>
            </nav>
        </div>
        <button type="button" class="btn btn-lg btn-primary rounded-circle shadow-lg" id="fabAddGallery" title="Add Images" style="width:56px;height:56px;display:flex;align-items:center;justify-content:center;font-size:2rem;">
            <i class="fas fa-plus"></i>
        </button>
    </div>

    <!-- Upload Modal -->
    <div class="modal fade" id="uploadGalleryModal" tabindex="-1" aria-labelledby="uploadGalleryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="galleryUploadForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadGalleryModalLabel">Upload Images</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Select Images <span class="text-danger">*</span></label>
                            <input type="file" name="images[]" id="modalImages" class="form-control" accept="image/*" multiple required>
                            <small class="text-muted">Multiple images allowed. Max 5MB each.</small>
                        </div>
                        <div id="modalImagePreviewContainer" class="mb-3 d-flex flex-wrap"></div>
                        <div id="galleryUploadError" class="alert alert-danger d-none"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-upload me-2"></i>Upload</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div id="gallery-toast" style="position:fixed;top:24px;right:24px;z-index:9999;display:none;padding:12px 24px;background:#1c4307;color:#fff;border-radius:8px;font-weight:600;box-shadow:0 2px 12px #1c430733;">Image deleted successfully!</div>

    <div class="admin-card mt-4">
        <div class="card-body">
            <?php if(mysqli_num_rows($result) > 0): ?>
                <div class="row g-4">
                    <?php while($image = mysqli_fetch_assoc($result)): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="gallery-item-modern card shadow-sm h-100">
                            <div class="gallery-img-wrap position-relative">
                                <img src="<?php echo '../../' . ltrim($image['image'], '/'); ?>" alt="<?php echo htmlspecialchars($image['caption']); ?>" class="img-fluid rounded-3 w-100" style="height:220px;object-fit:cover;">
                                <div class="gallery-actions d-flex flex-column position-absolute top-0 end-0 p-2" style="gap:8px;">
                                    <a href="<?php echo '../../' . ltrim($image['image'], '/'); ?>" target="_blank" class="btn btn-sm btn-light shadow"><i class="fas fa-eye"></i></a>
                                    <button class="btn btn-sm btn-danger shadow delete-image-btn" data-id="<?php echo $image['id']; ?>" data-image="<?php echo htmlspecialchars($image['image']); ?>" title="Delete"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                            <div class="gallery-info-modern p-2 text-center">
                                <h6 class="mb-1 text-truncate" title="<?php echo htmlspecialchars($image['caption']); ?>"><?php echo htmlspecialchars($image['caption']); ?></h6>
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

<script>
// Floating action button opens modal
document.getElementById('fabAddGallery').onclick = function() {
    var modal = new bootstrap.Modal(document.getElementById('uploadGalleryModal'));
    modal.show();
};

// Preview selected images in modal
document.getElementById('modalImages').addEventListener('change', function(e) {
    const container = document.getElementById('modalImagePreviewContainer');
    container.innerHTML = '';
    Array.from(e.target.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = function(ev) {
            const img = document.createElement('img');
            img.src = ev.target.result;
            img.className = 'rounded shadow-sm';
            img.style.maxWidth = '90px';
            img.style.margin = '6px';
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
        if(data.includes('error:')) {
            errorDiv.classList.remove('d-none');
            errorDiv.innerHTML = data.replace('error:', '');
        } else {
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

// Delete image AJAX with toast
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
        .then(data => {
            if(data.trim() === 'success') {
                var toast = document.getElementById('gallery-toast');
                toast.innerHTML = 'Image deleted successfully!';
                toast.style.display = 'block';
                setTimeout(function() {
                    toast.style.display = 'none';
                    location.reload();
                }, 1200);
            } else {
                alert(data);
            }
        });
    });
});
</script>

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
                                <!-- Custom toast for delete success -->
                                <div id="gallery-toast" style="position:fixed;top:24px;right:24px;z-index:9999;display:none;padding:12px 24px;background:#d63b3b;color:#fff;border-radius:8px;font-weight:600;box-shadow:0 2px 12px #d63b3b33;">Image deleted successfully!</div>
                                <script>
                                document.addEventListener('DOMContentLoaded', function() {
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
                                            .then(() => {
                                                // Show custom toast
                                                var toast = document.getElementById('gallery-toast');
                                                toast.style.display = 'block';
                                                setTimeout(function() {
                                                    toast.style.display = 'none';
                                                    location.reload();
                                                }, 1200);
                                            })
                                            .catch(() => {
                                                alert('Delete failed. Please try again.');
                                            });
                                        });
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
.gallery-item-modern.card {
    border-radius: 18px;
    overflow: hidden;
    transition: box-shadow 0.3s, transform 0.3s;
    background: #fff;
    min-height: 320px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.gallery-item-modern.card:hover {
    box-shadow: 0 8px 32px #1c430733;
    transform: translateY(-4px) scale(1.03);
}
.gallery-img-wrap {
    position: relative;
    height: 220px;
    background: #f8f9fa;
    border-radius: 16px 16px 0 0;
    overflow: hidden;
}
.gallery-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 16px 16px 0 0;
}
.gallery-actions {
    z-index: 2;
}
.gallery-info-modern {
    background: #fff;
    border-radius: 0 0 16px 16px;
    box-shadow: 0 2px 12px #1c430711;
}
.gallery-info-modern h6 {
    font-size: 15px;
    font-weight: 700;
    color: #1c4307;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
#fabAddGallery {
    position: fixed;
    bottom: 32px;
    right: 32px;
    z-index: 999;
    box-shadow: 0 4px 16px #1c430733;
}
.main-content
{
    margin-left: 5% !important;
}
.admin-card {
    margin-left: 5% !important;
}
}
</style>

<?php include '../includes/footer.php'; ?>
