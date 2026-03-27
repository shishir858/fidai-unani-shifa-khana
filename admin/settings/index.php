<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../includes/config.php';
require_once '../includes/functions.php';
check_login();



// Handle form submission for 'settings' table
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach($_POST as $key => $value) {
        if($key != 'submit') {
            $key = mysqli_real_escape_string($conn, $key);
            $value = mysqli_real_escape_string($conn, $value);
            $update_query = "UPDATE settings SET value = '$value' WHERE `key` = '$key'";
            mysqli_query($conn, $update_query);
        }
    }
    header('Location: index.php?msg=updated');
    exit;
}

// Fetch all settings from 'settings' table
$settings_query = "SELECT * FROM settings ORDER BY `key`";
$settings_result = mysqli_query($conn, $settings_query);
$settings = [];
while($row = mysqli_fetch_assoc($settings_result)) {
    $settings[$row['key']] = $row['value'];
}

include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">
    <div class="page-header">
        <div>
            <h1 class="page-title">Site Settings</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </nav>
        </div>
    </div>

    <?php if(isset($_GET['msg']) && $_GET['msg'] == 'updated'): ?>
        <?php echo success_message('Settings updated successfully!'); ?>
    <?php endif; ?>

    <form method="POST">
        <div class="row">
            <div class="col-lg-8">
                <!-- Site Information -->
                <div class="admin-card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Site Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Site Name</label>
                            <input type="text" name="site_name" class="form-control" 
                                value="<?php echo htmlspecialchars($settings['site_name'] ?? ''); ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Tagline</label>
                            <input type="text" name="site_tagline" class="form-control" 
                                value="<?php echo htmlspecialchars($settings['site_tagline'] ?? ''); ?>">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                    <input type="email" name="site_email" class="form-control" 
                                        value="<?php echo htmlspecialchars($settings['site_email'] ?? ''); ?>">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                    <input type="text" name="site_phone" class="form-control" 
                                        value="<?php echo htmlspecialchars($settings['site_phone'] ?? ''); ?>">
                            </div>
                        </div>
                        
                        <div class="mb-0">
                            <label class="form-label">Address</label>
                            <textarea name="site_address" class="form-control" rows="2"><?php echo htmlspecialchars($settings['site_address'] ?? ''); ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- Meta Tags (SEO) -->
                <div class="admin-card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-search me-2"></i>Meta Tags (SEO)</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" 
                                value="<?php echo htmlspecialchars($settings['meta_title'] ?? ''); ?>"
                                maxlength="60">
                            <small class="text-muted">Recommended: 50-60 characters</small>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3" 
                                      maxlength="160"><?php echo htmlspecialchars($settings['meta_description'] ?? ''); ?></textarea>
                            <small class="text-muted">Recommended: 150-160 characters</small>
                        </div>
                        
                        <div class="mb-0">
                            <label class="form-label">Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control" 
                                value="<?php echo htmlspecialchars($settings['meta_keywords'] ?? ''); ?>">
                            <small class="text-muted">Comma separated keywords</small>
                        </div>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="admin-card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-share-alt me-2"></i>Social Media Links</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="fab fa-facebook text-primary me-2"></i>Facebook</label>
                                    <input type="url" name="facebook" class="form-control" 
                                        value="<?php echo htmlspecialchars($settings['facebook'] ?? ''); ?>"
                                        placeholder="https://facebook.com/yourpage">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="fab fa-instagram text-danger me-2"></i>Instagram</label>
                                    <input type="url" name="instagram" class="form-control" 
                                        value="<?php echo htmlspecialchars($settings['instagram'] ?? ''); ?>"
                                        placeholder="https://instagram.com/yourpage">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><i class="fab fa-twitter text-info me-2"></i>Twitter</label>
                                    <input type="url" name="twitter" class="form-control" 
                                        value="<?php echo htmlspecialchars($settings['twitter'] ?? ''); ?>"
                                        placeholder="https://twitter.com/yourpage">
                            </div>
                            
                            <div class="col-md-6 mb-0">
                                <label class="form-label"><i class="fab fa-youtube text-danger me-2"></i>YouTube</label>
                                    <input type="url" name="youtube" class="form-control" 
                                        value="<?php echo htmlspecialchars($settings['youtube'] ?? ''); ?>"
                                        placeholder="https://youtube.com/yourchannel">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Details -->
                <div class="admin-card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-phone me-2"></i>Contact Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Email</label>
                                    <input type="email" name="email" class="form-control" 
                                        value="<?php echo htmlspecialchars($settings['email'] ?? ''); ?>">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Support Email</label>
                                    <input type="email" name="support_email" class="form-control" 
                                        value="<?php echo htmlspecialchars($settings['support_email'] ?? ''); ?>">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">WhatsApp Number</label>
                                    <input type="text" name="whatsapp" class="form-control" 
                                        value="<?php echo htmlspecialchars($settings['whatsapp'] ?? ''); ?>">
                            </div>
                            
                            <div class="col-md-6 mb-0">
                                <label class="form-label">Office Hours</label>
                                    <input type="text" name="office_hours" class="form-control" 
                                        value="<?php echo htmlspecialchars($settings['office_hours'] ?? ''); ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save me-2"></i>Save All Settings
                </button>
            </div>

            <div class="col-lg-4">
                <!-- Quick Info -->
                <div class="admin-card">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="fas fa-lightbulb me-2"></i>Important Notes</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled small mb-0">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Settings are applied site-wide</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Meta tags improve SEO</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Social links appear in footer</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Contact details used in forms</li>
                            <li class="mb-0"><i class="fas fa-check-circle text-success me-2"></i>Changes are instant</li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </form>
</div>

<script>
// Auto-hide success messages
setTimeout(function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        alert.style.transition = 'opacity 0.5s';
        alert.style.opacity = '0';
        setTimeout(() => alert.remove(), 500);
    });
}, 5000);

// Form validation
document.querySelector('form').addEventListener('submit', function(e) {
    const siteName = document.querySelector('input[name="site_name"]').value;
    if(siteName.trim() === '') {
        e.preventDefault();
        alert('Site name is required!');
    }
});
</script>

<style>
    /* Fix: Prevent content from going behind sidebar, use sidebar width */
    .main-content {
        margin-left: 10% !important;
    }
</style>

<?php include '../includes/footer.php'; ?>
