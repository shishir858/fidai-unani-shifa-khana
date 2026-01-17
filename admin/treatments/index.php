<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();

// Handle status toggle
if(isset($_GET['toggle']) && isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $new_status = $_GET['status'] === 'active' ? 'inactive' : 'active';
    $update_query = "UPDATE treatments SET status = '$new_status' WHERE id = $id";
    if(mysqli_query($conn, $update_query)) {
        header('Location: index.php?msg=status_updated');
        exit;
    }
}

// Filters
$where = " WHERE 1=1 ";
$category_filter = isset($_GET['category']) ? intval($_GET['category']) : 0;
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

if($category_filter > 0) {
    $where .= " AND t.related_treatments LIKE '%$category_filter%' ";
}
if($status_filter !== '') {
    $where .= " AND t.status = '" . ($status_filter == 'active' ? 'active' : 'inactive') . "' ";
}
if(!empty($search)) {
    $where .= " AND (t.title LIKE '%$search%' OR t.slug LIKE '%$search%') ";
}
// Get all treatments
$query = "SELECT t.*, c.name as category_name FROM treatments t LEFT JOIN categories c ON FIND_IN_SET(c.id, t.related_treatments) > 0 $where ORDER BY t.created_at DESC";
$result = mysqli_query($conn, $query);
// Get categories for filter
$categories_query = "SELECT * FROM categories ORDER BY name";
$categories = mysqli_query($conn, $categories_query);

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
            <h1 class="page-title">Services</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Services</li>
                </ol>
            </nav>
        </div>
        <div class="page-actions">
            <a href="add.php" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add Treatment
            </a>
        </div>
    </div>

    <?php
    if(isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        if($msg == 'added') {
            echo success_message('Treatment added successfully!');
        } elseif($msg == 'updated') {
            echo success_message('Treatment updated successfully!');
        } elseif($msg == 'deleted') {
            echo success_message('Treatment deleted successfully!');
        } elseif($msg == 'status_updated') {
            echo success_message('Status updated successfully!');
        }
    }
    ?>

    <!-- Filters -->
    <div class="admin-card mb-3">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                          <input type="text" name="search" class="form-control" placeholder="Search treatments..." 
                              value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="col-md-3">
                    <select name="category" class="form-select">
                        <option value="0">All Categories</option>
                        <?php while($cat = mysqli_fetch_assoc($categories)): ?>
                            <option value="<?php echo $cat['id']; ?>" <?php echo $category_filter == $cat['id'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat['name']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="active" <?php echo $status_filter == 'active' ? 'selected' : ''; ?>>Active</option>
                        <option value="inactive" <?php echo $status_filter == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-filter me-2"></i>Filter
                    </button>
                </div>
                <div class="col-md-2">
                    <a href="index.php" class="btn btn-secondary w-100">
                        <i class="fas fa-redo me-2"></i>Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="admin-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="80">ID</th>
                            <th width="100">Image</th>
                            <th>Treatment Details</th>
                            <th width="120">Category</th>
                            <th width="100" class="text-center">Status</th>
                            <th width="120" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(mysqli_num_rows($result) > 0) {
                            while($treatment = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td>
                                <span class="badge bg-secondary">#<?php echo $treatment['id']; ?></span>
                            </td>
                            <td>
                                <?php 
                                $img_path = '../../assets/images/treatments/' . $treatment['feature_image'];
                                if(!empty($treatment['feature_image']) && file_exists($img_path)) : ?>
                                    <img src="<?php echo SITE_URL . 'assets/images/treatments/' . $treatment['feature_image']; ?>" 
                                         alt="<?php echo htmlspecialchars($treatment['title']); ?>" 
                                         class="package-thumb">
                                <?php else: ?>
                                    <div class="no-image-thumb">
                                        <i class="fas fa-stethoscope"></i>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong><?php echo htmlspecialchars($treatment['title']); ?></strong>
                                <br>
                                <small class="text-muted">
                                    <i class="fas fa-link me-1"></i><?php echo htmlspecialchars($treatment['slug']); ?>
                                </small>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($treatment['category_name']); ?>
                            </td>
                            <td class="text-center">
                                <a href="?toggle&id=<?php echo $treatment['id']; ?>&status=<?php echo $treatment['status']; ?>" 
                                   class="badge bg-<?php echo $treatment['status'] == 'active' ? 'success' : 'danger'; ?>">
                                    <?php echo ucfirst($treatment['status']); ?>
                                </a>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="edit.php?id=<?php echo $treatment['id']; ?>" 
                                       class="btn btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="delete.php?id=<?php echo $treatment['id']; ?>" 
                                       class="btn btn-outline-danger" 
                                       onclick="return confirm('Are you sure you want to delete this treatment?')" 
                                       title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else {
                        ?>
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="fas fa-stethoscope fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No treatments found. <a href="add.php">Add your first treatment</a></p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.package-thumb {
    width: 80px;
    height: 60px;
    object-fit: cover;
    border-radius: 4px;
    border: 2px solid #e9ecef;
}

.no-image-thumb {
    width: 80px;
    height: 60px;
    background: #f8f9fa;
    border: 2px dashed #dee2e6;
    border-radius: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #adb5bd;
    font-size: 24px;
}
</style>

<?php include '../includes/footer.php'; ?>
