
<?php
// This file is a redirect for legacy links. Remove this file after migration if not needed.
header('Location: ../appointment/index.php');
exit;

include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="main-content">
    <div class="page-header">
        <div>
            <h1 class="page-title">Bookings Management</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Bookings</li>
                </ol>
            </nav>
        </div>
    </div>

    <?php
    if(isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        if($msg == 'status_updated') {
            echo success_message('Booking status updated successfully!');
        }
    }
    ?>

    <!-- Filters -->
    <div class="admin-card mb-3">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by customer name, email, phone, or booking code..." 
                           value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="pending" <?php echo $status_filter == 'pending' ? 'selected' : ''; ?>>Pending</option>
                        <option value="confirmed" <?php echo $status_filter == 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                        <option value="completed" <?php echo $status_filter == 'completed' ? 'selected' : ''; ?>>Completed</option>
                        <option value="cancelled" <?php echo $status_filter == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-filter me-2"></i>Filter
                    </button>
                </div>
                <div class="col-md-3">
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
                            <th width="100">Booking Code</th>
                            <th>Customer Details</th>
                            <th>Package</th>
                            <th width="120">Travel Date</th>
                            <th width="100">Guests</th>
                            <th width="120">Total Amount</th>
                            <th width="120">Status</th>
                            <th width="120" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(mysqli_num_rows($result) > 0) {
                            while($booking = mysqli_fetch_assoc($result)) {
                                $status_colors = [
                                    'pending' => 'warning',
                                    'confirmed' => 'info',
                                    'completed' => 'success',
                                    'cancelled' => 'danger'
                                ];
                                $status_color = $status_colors[$booking['booking_status']] ?? 'secondary';
                        ?>
                        <tr>
                            <td>
                                <strong class="text-primary"><?php echo htmlspecialchars($booking['booking_number'] ?? 'N/A'); ?></strong>
                                <br>
                                <small class="text-muted"><?php echo format_date($booking['created_at']); ?></small>
                            </td>
                            <td>
                                <strong><?php echo htmlspecialchars($booking['customer_name']); ?></strong>
                                <br>
                                <small class="text-muted">
                                    <i class="fas fa-envelope me-1"></i><?php echo htmlspecialchars($booking['customer_email']); ?>
                                </small>
                                <br>
                                <small class="text-muted">
                                    <i class="fas fa-phone me-1"></i><?php echo htmlspecialchars($booking['customer_phone']); ?>
                                </small>
                            </td>
                            <td>
                                <strong><?php echo htmlspecialchars($booking['package_title']); ?></strong>
                            </td>
                            <td>
                                <i class="fas fa-calendar me-1"></i><?php echo format_date($booking['travel_date']); ?>
                            </td>
                            <td>
                                <i class="fas fa-users me-1"></i><?php echo $booking['number_of_persons'] ?? 0; ?>
                            </td>
                            <td>
                                <strong class="text-success"><?php echo format_price($booking['final_price'] ?? 0); ?></strong>
                            </td>
                            <td>
                                <span class="badge bg-<?php echo $status_color; ?>">
                                    <?php echo ucfirst($booking['booking_status']); ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="view.php?id=<?php echo $booking['id']; ?>" 
                                       class="btn btn-outline-primary" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-success" 
                                            onclick="updateStatus(<?php echo $booking['id']; ?>, '<?php echo $booking['booking_status']; ?>')" 
                                            title="Update Status">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else {
                        ?>
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <i class="fas fa-calendar-check fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No bookings found.</p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Status Update Modal -->
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Booking Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <input type="hidden" name="booking_id" id="modalBookingId">
                    <div class="mb-3">
                        <label class="form-label">Select Status</label>
                        <select name="status" id="modalStatus" class="form-select" required>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function updateStatus(bookingId, currentStatus) {
    document.getElementById('modalBookingId').value = bookingId;
    document.getElementById('modalStatus').value = currentStatus;
    
    const modal = new bootstrap.Modal(document.getElementById('statusModal'));
    modal.show();
}

// Auto-hide alerts
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
