
<?php
require_once 'includes/config.php';
include 'includes/header.php';
// Fetch settings
$settings = [];
$result = $conn->query("SELECT `key`, `value` FROM settings");
while($row = $result->fetch_assoc()) {
  $settings[$row['key']] = $row['value'];
}
?>


<!-- Contact Hero Section -->
<section class="contact-hero-section section-bg" style="padding: 64px 0 32px 0; background: linear-gradient(90deg, #e6f2e6 60%, #f8f9fa 100%);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <h1 class="display-5 fw-bold" style="color:#1c4307;">Contact <span style="color:#d63b3b;">Us</span></h1>
        <p class="lead" style="color:#1c4307;">We’re here to help! Reach out for appointments, queries, or feedback. Our team will respond promptly.</p>
        
      </div>
      <div class="col-md-6 text-center">
        <img src="assets/images/img/contactus.jpg" alt="Contact Us" class="img-fluid rounded shadow" style="max-height:340px; background:#fff; padding:12px;">
      </div>
    </div>
  </div>
</section>


<!-- Contact Details & Form Section -->
<section class="contact-details-section" style="padding: 48px 0 32px 0;">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card shadow-sm border-0 p-4 h-100" style="background:linear-gradient(120deg,#e6f2e6 60%,#f8f9fa 100%);">
          <h4 class="fw-bold mb-3" style="color:#1c4307;">Clinic Contact Details</h4>
          <div class="mb-3"><i class="bi bi-geo-alt-fill text-danger"></i> <b>Address:</b><br><?php echo nl2br(htmlspecialchars($settings['address'] ?? '')); ?></div>
          <div class="mb-3"><i class="bi bi-telephone-fill text-success"></i> <b>Phone:</b> <a href="tel:<?php echo htmlspecialchars($settings['phone'] ?? ''); ?>" style="color:#1c4307;"><?php echo htmlspecialchars($settings['phone'] ?? ''); ?></a></div>
          <div class="mb-3"><i class="bi bi-envelope-fill text-primary"></i> <b>Email:</b> <a href="mailto:<?php echo htmlspecialchars($settings['email'] ?? ''); ?>" style="color:#1c4307;"><?php echo htmlspecialchars($settings['email'] ?? ''); ?></a></div>
          <div class="mb-3"><i class="bi bi-whatsapp text-success"></i> <b>WhatsApp:</b> <a href="https://wa.me/<?php echo htmlspecialchars($settings['whatsapp'] ?? ''); ?>" style="color:#1c4307;" target="_blank"><?php echo htmlspecialchars($settings['whatsapp'] ?? ''); ?></a></div>
          <div class="mb-3"><i class="bi bi-facebook text-primary"></i> <b>Facebook:</b> <a href="<?php echo htmlspecialchars($settings['facebook'] ?? ''); ?>" style="color:#1c4307;" target="_blank">Facebook Page</a></div>
          <div class="mb-3"><i class="bi bi-instagram text-danger"></i> <b>Instagram:</b> <a href="<?php echo htmlspecialchars($settings['instagram'] ?? ''); ?>" style="color:#1c4307;" target="_blank">Instagram</a></div>
          <div class="mb-3"><i class="bi bi-twitter text-info"></i> <b>Twitter:</b> <a href="<?php echo htmlspecialchars($settings['twitter'] ?? ''); ?>" style="color:#1c4307;" target="_blank">Twitter</a></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card shadow-sm border-0 p-4" style="background:#fff;">
          <h4 class="fw-bold mb-3" style="color:#1c4307;">Send Us a Message</h4>
          <form method="post" action="">
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Preferred Date</label>
              <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="mb-3">
              <label for="treatment" class="form-label">Treatment (Optional)</label>
              <input type="text" class="form-control" id="treatment" name="treatment" placeholder="E.g. Liver Treatment, Skin Care">
            </div>
            <button type="submit" class="btn btn-danger w-100" style="font-weight:700;">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>

<!-- Google Map Section -->
<section class="google-map-section" style="padding: 0 0 48px 0;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h4 class="fw-bold mb-4 text-center" style="color:#1c4307;">Find Us on Google Map</h4>
        <div class="ratio ratio-16x9 shadow rounded" style="min-height:320px;">
          <!-- Replace the src below with your actual Google Maps embed link if needed -->
          <iframe
            src="https://www.google.com/maps?q=<?php echo urlencode($settings['address'] ?? ''); ?>&output=embed"
            width="100%" height="400" style="border:0; min-height:320px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact Us Page Content -->
<?php include 'includes/footer.php'; ?>