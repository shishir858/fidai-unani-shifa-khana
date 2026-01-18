<?php include 'includes/header.php'; ?>

<!-- Appointment Hero Section -->
<section class="appointment-hero-section section-bg" style="padding: 64px 0 32px 0; background: linear-gradient(90deg, #e6f2e6 60%, #f8f9fa 100%);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <h1 class="display-5 fw-bold" style="color:#1c4307;">Book an <span style="color:#d63b3b;">Appointment</span></h1>
        <p class="lead" style="color:#1c4307;">Take the first step towards natural healing. Schedule your consultation with our Unani experts today.</p>
      </div>
      <div class="col-md-6 text-center">
        <img src="assets/images/appointment/appointment-hero.png" alt="Book Appointment" class="img-fluid rounded shadow" style="max-height:320px; background:#fff; padding:12px;">
      </div>
    </div>
  </div>
</section>

<!-- Appointment Form Section -->
<section class="appointment-form-section" style="padding: 48px 0 32px 0;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card shadow-sm border-0 p-4">
          <h3 class="fw-bold mb-3" style="color:#1c4307;">Appointment Form</h3>
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
              <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="mb-3">
              <label for="treatment" class="form-label">Treatment (Optional)</label>
              <input type="text" class="form-control" id="treatment" name="treatment" placeholder="E.g. Liver Treatment, Skin Care">
            </div>
            <button type="submit" class="btn btn-primary w-100" style="background:#d63b3b; border:none;">Book Appointment</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>