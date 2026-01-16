<?php
require_once '../includes/config.php';
$result = mysqli_query($conn, "SELECT * FROM doctor ORDER BY id DESC");
?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['title']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($row['description'])); ?></td>
            <td>
                <button class="btn btn-sm btn-info edit-doctor" data-id="<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></button>
                <button class="btn btn-sm btn-danger delete-doctor" data-id="<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
