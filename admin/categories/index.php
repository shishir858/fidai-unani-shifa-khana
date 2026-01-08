<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();
$page_title = 'Categories';
$categories = mysqli_query($conn, "SELECT id, name, image FROM categories ORDER BY id DESC");

include '../includes/header.php';
include '../includes/sidebar.php';
?>
<style>
    .admin-content {
        margin-left: 20%!important;
    }
</style>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><i class="fas fa-folder"></i> Categories</h1>
        <a href="add.php" class="btn btn-primary">Add Category</a>
    </div>
    <?php if(isset($_GET['msg'])): ?>
        <div class="alert alert-success">
            <?php if($_GET['msg'] == 'added') echo 'Category added successfully!'; ?>
            <?php if($_GET['msg'] == 'updated') echo 'Category updated successfully!'; ?>
            <?php if($_GET['msg'] == 'deleted') echo 'Category deleted successfully!'; ?>
        </div>
    <?php endif; ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(mysqli_num_rows($categories) > 0): ?>
                <?php while($category = mysqli_fetch_assoc($categories)): ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td>
                            <?php if(!empty($category['image'])): ?>
                                <img src="../assets/images/categories/<?php echo $category['image']; ?>" alt="Category Image" style="max-width:60px;max-height:40px;">
                            <?php else: ?>
                                <span class="text-muted">No image</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo $category['name']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $category['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?id=<?php echo $category['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No categories found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php include '../includes/footer.php'; ?>
