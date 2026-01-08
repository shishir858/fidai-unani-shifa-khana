<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();git 

$page_title = 'Categories';

// Handle status toggle
if(isset($_GET['toggle']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $status = $_GET['status'] == '1' ? 0 : 1;
    mysqli_query($conn, "UPDATE categories SET is_active = $status WHERE id = $id");
    header('Location: index.php?msg=status_updated');
    exit;
}

// Get all categories
$query = "SELECT * FROM categories ORDER BY id DESC";
    $query = "SELECT id, name FROM categories ORDER BY id DESC";
    $categories = mysqli_query($conn, $query);

include '../includes/header.php';
include '../includes/sidebar.php';
?>
<style>
                    <th>ID</th>
        margin-left: 20%!important;
    }
</style>

<div class="page-header">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1><i class="fas fa-folder"></i> Categories</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL; ?>dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Categories</li>
                            <td><?php echo $category['id']; ?></td>
        <a href="add.php" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Category
        </a>
    </div>
</div>

<?php if(isset($_GET['msg'])): ?>
    <?php if($_GET['msg'] == 'added'): ?>
        <?php echo success_message('Category added successfully!'); ?>
    <?php elseif($_GET['msg'] == 'updated'): ?>
        <?php echo success_message('Category updated successfully!'); ?>
    <?php elseif($_GET['msg'] == 'deleted'): ?>
        <?php echo success_message('Category deleted successfully!'); ?>
    <?php elseif($_GET['msg'] == 'status_updated'): ?>
        <?php echo success_message('Status updated successfully!'); ?>
    <?php endif; ?>
<?php endif; ?>

<div class="admin-card">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($categories) > 0): ?>
                    <?php while($category = mysqli_fetch_assoc($categories)): ?>
                        <tr>
                            <td><?php echo $category['id']; ?></td>
                            <td><?php echo $category['name']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $category['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="delete.php?id=<?php echo $category['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">No categories found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
