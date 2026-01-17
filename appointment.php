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
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
              <label for="service" class="form-label">Service Required</label>
              <input type="text" class="form-control" id="service" placeholder="E.g. Liver Treatment, Skin Care">
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Preferred Date</label>
              <input type="date" class="form-control" id="date">
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message (Optional)</label>
              <textarea class="form-control" id="message" rows="3" placeholder="Describe your concern or symptoms"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100" style="background:#d63b3b; border:none;">Book Appointment</button>
          </form>
        </div>
      </div>
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
          <form action="#" method="post">
            <div class="mb-3">
              <input type="text" class="form-control" name="name" placeholder="Your name*" required>
            </div>
            <div class="mb-3">
              <input type="tel" class="form-control" name="phone" placeholder="Your Phone" required>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email*" required>
            </div>
            <div class="mb-3">
              <textarea class="form-control" name="message" rows="3" placeholder="-"></textarea>
            </div>
            <button type="submit" class="btn btn-danger w-100" style="font-weight:700;">Book Now</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>