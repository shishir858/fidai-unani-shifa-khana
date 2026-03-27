<?php
require_once 'includes/config.php';
include 'includes/header.php';
?>

<!-- Doctors Hero Section -->
<section class="doctors-hero-section section-bg" style="padding: 64px 0 32px 0; background: linear-gradient(90deg, #e6f2e6 60%, #f8f9fa 100%);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <h1 class="display-5 fw-bold" style="color:#1c4307;">About Our <span style="color:#d63b3b;">Doctor</span></h1>
        <p class="lead" style="color:#1c4307;">Meet our team of experienced Unani and herbal medicine specialists, dedicated to your health and well-being.</p>
      </div>
      <div class="col-md-6 text-center">
        <img src="assets/images/about/4.png" alt="Our Doctors" class="img-fluid rounded shadow" style="max-height:320px; background:#fff; padding:12px;">
      </div>
    </div>
  </div>
</section>


<!-- Doctor Profile Modern Section (Dynamic) -->
<section class="doctor-profile-section" style="padding:64px 0 32px 0;">
  <div class="container">
    <?php
    $result = $conn->query("SELECT * FROM doctor ORDER BY id DESC");
    while($doctor = $result->fetch_assoc()):
    ?>
    <div class="row align-items-center g-5 mb-5">
      <div class="col-lg-5 text-center mb-4 mb-lg-0">
        <div style="display:inline-block;position:relative;">
          <div style="position:absolute;top:-24px;left:-24px;width:110px;height:110px;background:#d63b3b22;border-radius:50%;z-index:0;"></div>
          <img src="assets/images/about/2.jpeg" alt="<?php echo htmlspecialchars($doctor['name']); ?>" class="img-fluid rounded shadow" style="max-height:540px; background:#fff; padding:10px;position:relative;z-index:1;">
        </div>
        <div class="mt-4">
          <a href="tel:9999446622" class="btn btn-danger px-4 py-2 me-2" style="font-weight:600;font-size:1.1rem;"><i class="bi bi-telephone"></i> Call</a>
          <a href="mailto:info@fidaiunanishifa.com" class="btn btn-success px-4 py-2" style="font-weight:600;font-size:1.1rem;"><i class="bi bi-envelope"></i> Email</a>
        </div>
      </div>
      <div class="col-lg-7">
        <h1 class="fw-bold mb-2" style="color:#1c4307;font-size:2.5rem;\"><?php echo htmlspecialchars($doctor['name']); ?></h1>
        <h4 class="mb-3" style="color:#d63b3b;font-weight:700;">
          <?php echo htmlspecialchars($doctor['title']); ?>
        </h4>
        <p class="lead mb-4" style="color:#444;">
          <?php echo nl2br(htmlspecialchars($doctor['description'])); ?>
        </p>
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <div class="d-flex align-items-center mb-2">
              <span style="background:#e6f2e6;padding:10px 14px;border-radius:12px;margin-right:12px;display:inline-flex;align-items:center;justify-content:center;"><i class="bi bi-award" style="font-size:1.7rem;color:#1c4307;"></i></span>
              <span style="font-weight:600;color:#1c4307;">
                <?php echo $doctor['experience'] ? htmlspecialchars($doctor['experience']) : '25+ Years Experience'; ?>
              </span>
            </div>
            <div class="d-flex align-items-center mb-2">
              <span style="background:#fde4e4;padding:10px 14px;border-radius:12px;margin-right:12px;display:inline-flex;align-items:center;justify-content:center;"><i class="bi bi-mortarboard" style="font-size:1.7rem;color:#d63b3b;"></i></span>
              <span style="font-weight:600;color:#1c4307;">
                <?php echo $doctor['degree'] ? htmlspecialchars($doctor['degree']) : 'B.U.M.S., M.D. (Unani)'; ?>
              </span>
            </div>
            <div class="d-flex align-items-center mb-2">
              <span style="background:#e6f2e6;padding:10px 14px;border-radius:12px;margin-right:12px;display:inline-flex;align-items:center;justify-content:center;"><i class="bi bi-people" style="font-size:1.7rem;color:#1c4307;"></i></span>
              <span style="font-weight:600;color:#1c4307;">Thousands of Happy Patients</span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex align-items-center mb-2">
              <span style="background:#fde4e4;padding:10px 14px;border-radius:12px;margin-right:12px;display:inline-flex;align-items:center;justify-content:center;"><i class="bi bi-heart-pulse" style="font-size:1.7rem;color:#d63b3b;"></i></span>
              <span style="font-weight:600;color:#1c4307;">Chronic Disease Specialist</span>
            </div>
            <div class="d-flex align-items-center mb-2">
              <span style="background:#e6f2e6;padding:10px 14px;border-radius:12px;margin-right:12px;display:inline-flex;align-items:center;justify-content:center;"><i class="bi bi-capsule" style="font-size:1.7rem;color:#1c4307;"></i></span>
              <span style="font-weight:600;color:#1c4307;">Herbal & Unani Therapies</span>
            </div>
            <div class="d-flex align-items-center mb-2">
              <span style="background:#fde4e4;padding:10px 14px;border-radius:12px;margin-right:12px;display:inline-flex;align-items:center;justify-content:center;"><i class="bi bi-star" style="font-size:1.7rem;color:#d63b3b;"></i></span>
              <span style="font-weight:600;color:#1c4307;">
                <?php echo $doctor['awards'] ? htmlspecialchars($doctor['awards']) : 'Awarded for Excellence'; ?>
              </span>
            </div>
          </div>
        </div>
        <div class="card shadow-sm border-0 p-4 mb-3" style="background:#fff;">
          <h5 class="fw-bold mb-2" style="color:#1c4307;">About Dr. Hakeem Shan-e-Alam</h5>
          <ul style="color:#1c4307;font-size:1.08rem;list-style:none;padding:0;">
            <?php
            if (!empty($doctor['about'])) {
              $aboutItems = array_map('trim', explode(',', $doctor['about']));
              foreach ($aboutItems as $item) {
                if ($item) {
                  echo '<li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> ' . htmlspecialchars($item) . '</li>';
                }
              }
            } else {
            ?>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Member, Central Council of Indian Medicine</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Published research in Unani journals</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Speaker at national & international conferences</li>
              <li class="mb-2"><i class="bi bi-check-circle-fill text-success"></i> Committed to patient education & awareness</li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
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