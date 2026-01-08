<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
check_login();


$page_title = 'Dashboard';
// Get statistics for clinic
$stats = [
    'total_appointments' => mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM appointments"))[0],
    'total_treatments' => mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM treatments"))[0],
    'total_categories' => mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM categories"))[0],
    'total_gallery' => mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM gallery"))[0],
    'total_faqs' => mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM faqs"))[0],
    'total_doctors' => mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM doctor"))[0],
];

// Recent appointments
$recent_appointments_query = "SELECT a.*, t.title as treatment_title FROM appointments a LEFT JOIN treatments t ON a.treatment_id = t.id ORDER BY a.date DESC, a.time DESC LIMIT 5";
$recent_appointments = mysqli_query($conn, $recent_appointments_query);


include 'includes/header.php';
include 'includes/sidebar.php';
?>
<main class="admin-content">
    <div class="page-header">
        <h1><i class="fas fa-home"></i> Dashboard</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-xl-2 col-lg-4 col-md-6 mb-3">
            <div class="stat-card primary">
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $stats['total_appointments']; ?></h3>
                    <p>Total Appointments</p>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 mb-3">
            <div class="stat-card success">
                <div class="stat-icon">
                    <i class="fas fa-stethoscope"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $stats['total_treatments']; ?></h3>
                    <p>Treatments</p>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 mb-3">
            <div class="stat-card info">
                <div class="stat-icon">
                    <i class="fas fa-folder"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $stats['total_categories']; ?></h3>
                    <p>Categories</p>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 mb-3">
            <div class="stat-card warning">
                <div class="stat-icon">
                    <i class="fas fa-image"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $stats['total_gallery']; ?></h3>
                    <p>Gallery Images</p>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 mb-3">
            <div class="stat-card secondary">
                <div class="stat-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $stats['total_doctors']; ?></h3>
                    <p>Doctors</p>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-6 mb-3">
            <div class="stat-card dark">
                <div class="stat-icon">
                    <i class="fas fa-question-circle"></i>
                </div>
                <div class="stat-content">
                    <h3><?php echo $stats['total_faqs']; ?></h3>
                    <p>FAQs</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Appointments -->
        <div class="col-lg-8 mb-4">
            <div class="admin-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2><i class="fas fa-calendar-check"></i> Recent Appointments</h2>
                    <a href="appoinment/index.php" class="btn btn-sm btn-primary">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Patient Name</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Treatment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysqli_num_rows($recent_appointments) > 0): ?>
                                <?php while($appt = mysqli_fetch_assoc($recent_appointments)): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($appt['patient_name']); ?></td>
                                    <td><?php echo htmlspecialchars($appt['phone']); ?></td>
                                    <td><?php echo htmlspecialchars($appt['date']); ?></td>
                                    <td><?php echo htmlspecialchars($appt['time']); ?></td>
                                    <td><?php echo htmlspecialchars($appt['treatment_title']); ?></td>
                                </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">No appointments yet</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Quick Stats -->
        <div class="col-lg-4 mb-4">
            <div class="admin-card">
                <h2><i class="fas fa-chart-pie"></i> Quick Stats</h2>
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-calendar-check text-primary"></i> Appointments</span>
                        <span class="badge bg-primary rounded-pill"><?php echo $stats['total_appointments']; ?></span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-stethoscope text-success"></i> Treatments</span>
                        <span class="badge bg-success rounded-pill"><?php echo $stats['total_treatments']; ?></span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-folder text-info"></i> Categories</span>
                        <span class="badge bg-info rounded-pill"><?php echo $stats['total_categories']; ?></span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-image text-warning"></i> Gallery</span>
                        <span class="badge bg-warning rounded-pill"><?php echo $stats['total_gallery']; ?></span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-user-md text-secondary"></i> Doctors</span>
                        <span class="badge bg-secondary rounded-pill"><?php echo $stats['total_doctors']; ?></span>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-question-circle text-dark"></i> FAQs</span>
                        <span class="badge bg-dark rounded-pill"><?php echo $stats['total_faqs']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>
