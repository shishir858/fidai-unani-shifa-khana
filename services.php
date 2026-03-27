<?php 
require_once 'includes/config.php';
require_once 'includes/treatment-html.php';
include 'includes/header.php';
// Fetch all active treatments/services
$services = mysqli_query($conn, "SELECT t.*, c.name as category_name FROM treatments t LEFT JOIN categories c ON FIND_IN_SET(c.id, t.related_treatments) > 0 WHERE t.status='active' ORDER BY t.created_at DESC");
?>

<!-- Services Hero Section -->
<section class="services-hero-section section-bg" style="padding: 64px 0 32px 0; background: linear-gradient(90deg, #e6f2e6 60%, #f8f9fa 100%);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <h1 class="display-5 fw-bold" style="color:#1c4307;">Our <span style="color:#d63b3b;">Services</span></h1>
        <p class="lead" style="color:#1c4307;">Explore our range of Unani and herbal treatments, designed for holistic healing and wellness.</p>
      </div>
      <div class="col-md-6 text-center">
        <img src="assets/images/services/10.webp" alt="Our Services" class="img-fluid rounded shadow" style="max-height:320px; background:#fff; padding:12px;">
      </div>
    </div>
  </div>
</section>

<!-- Services List Section -->
<section class="services-list-section" style="padding: 48px 0 32px 0;">
  <div class="container">
    <div class="row mb-4">
      <div class="col text-center">
        <h2 class="fw-bold" style="color:#1c4307;">Specialities & Procedures</h2>
        <p class="text-muted">Comprehensive care for a wide range of health concerns.</p>
      </div>
    </div>
    <div class="row g-4 justify-content-center">
      <?php if(mysqli_num_rows($services) > 0): ?>
        <?php while($service = mysqli_fetch_assoc($services)): ?>
          <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 text-center p-4">
              <div class="mb-3">
                <?php if(!empty($service['feature_image']) && file_exists('assets/images/treatments/' . $service['feature_image'])): ?>
                  <img src="assets/images/treatments/<?php echo htmlspecialchars($service['feature_image']); ?>" alt="<?php echo htmlspecialchars($service['title']); ?>" style="height:80px;width:80px;object-fit:cover;border-radius:16px;box-shadow:0 2px 8px #bab9b9;background:#fff;">
                <?php else: ?>
                  <span style="display:inline-block;width:80px;height:80px;background:#e6f2e6;border-radius:16px;"><i class="bi bi-activity" style="font-size:2.5rem;color:#bab9b9;line-height:80px;"></i></span>
                <?php endif; ?>
              </div>
              <h5 class="fw-bold" style="color:#1c4307;"><?php echo htmlspecialchars($service['title']); ?></h5>
              <p class="text-muted"><?php echo htmlspecialchars(strip_tags(sanitize_treatment_editor_html($service['short_description'] ?? $service['description'] ?? ''))); ?></p>
              <a href="services/<?php echo urlencode($service['slug']); ?>" class="btn btn-outline-primary mt-2">Learn More</a>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="col-12 text-center text-muted">No services found.</div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ======= Book Appointment Section (Custom) ======= -->
<section class="book-appointment-section py-5" style="background:linear-gradient(90deg,#e6f2e6 60%,#f8f9fa 100%);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <h2 class="mb-3" style="font-weight:800;color:#d63b3b;">Book an Appointment at Fidai Unani Shifa Khana</h2>
        <p style="color:#444;font-size:1.15rem;max-width:520px;">Experience authentic Unani and Herbal care with our expert team at Fidai Unani Shifa Khana. Whether you need treatment for chronic illness, lifestyle disorders, or holistic wellness, we are here to help. Fill out the form to schedule your consultation—our staff will contact you soon to confirm your visit and guide you on your healing journey.</p>
        <div class="d-flex flex-wrap gap-3 mt-4">
          <a href="tel:9999446622" class="btn btn-danger px-4 py-2" style="font-weight:600;font-size:1.1rem;"><i class="bi bi-telephone"></i> Consult Now</a>
          <a href="https://wa.me/919999999999" class="btn btn-success px-4 py-2" style="font-weight:600;font-size:1.1rem;"><i class="bi bi-whatsapp"></i> WhatsApp Us</a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="p-4 shadow rounded bg-white" style="max-width:420px;margin:0 auto;">
          <h4 class="mb-3" style="font-weight:700;color:#1c4307;">Get personalized Unani & Herbal treatment from our experienced doctors. Your health and well-being are our top priority!</h4>
          <form method="post" action="">
						<div class="mb-3">
							<input type="text" class="form-control mb-2" name="name" placeholder="Your name*" required>
						</div>
						<div class="mb-3">
							<input type="tel" class="form-control mb-2" name="phone" placeholder="Your Phone" required>
						</div>
						<div class="mb-3">
							<input type="text" class="form-control mb-2" name="address" placeholder="Your Address*" required>
						</div>
						<div class="mb-3">
							<input type="date" class="form-control mb-2" name="date" placeholder="Preferred Date">
						</div>
						<div class="mb-3">
							<input type="text" class="form-control mb-2" name="treatment" placeholder="Treatment (Optional)">
						</div>
						<button type="submit" class="btn btn-danger w-100" style="font-weight:700;">Send</button>
					</form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include 'includes/footer.php'; ?>