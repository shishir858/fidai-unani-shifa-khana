

<?php
require_once '../includes/config.php';
require_once '../includes/functions.php';
check_login();

// Fetch appointments with treatment name
$query = "SELECT a.*, t.title as treatment_title FROM appointments a LEFT JOIN treatments t ON a.treatment_id = t.id ORDER BY a.date DESC, a.time DESC";
$result = mysqli_query($conn, $query);

include '../includes/header.php';
include '../includes/sidebar.php';
?>
<main class="admin-content">
	<div class="page-header">
		<h1><i class="fas fa-calendar-check"></i> Appointments</h1>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
				<li class="breadcrumb-item active">Appointments</li>
			</ol>
		</nav>
	</div>
	<div class="admin-card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Patient Name</th>
							<th>Phone</th>
							<th>Date</th>
							<th>Time</th>
							<th>Treatment</th>
						</tr>
					</thead>
					<tbody>
						<?php if(mysqli_num_rows($result) > 0): ?>
							<?php while($row = mysqli_fetch_assoc($result)): ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo htmlspecialchars($row['patient_name']); ?></td>
								<td><?php echo htmlspecialchars($row['phone']); ?></td>
								<td><?php echo htmlspecialchars($row['date']); ?></td>
								<td><?php echo htmlspecialchars($row['time']); ?></td>
								<td><?php echo htmlspecialchars($row['treatment_title']); ?></td>
							</tr>
							<?php endwhile; ?>
						<?php else: ?>
							<tr>
								<td colspan="6" class="text-center py-4 text-muted">No appointments found.</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
<?php include '../includes/footer.php'; ?>
