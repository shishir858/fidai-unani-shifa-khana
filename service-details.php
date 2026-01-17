<?php include 'includes/header.php'; ?>

<!-- Service Details Hero Section -->
<section class="service-details-hero-section section-bg" style="padding: 64px 0 32px 0; background: linear-gradient(90deg, #e6f2e6 60%, #f8f9fa 100%);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-7 mb-4 mb-md-0">
        <h1 class="display-5 fw-bold" style="color:#1c4307;">
          <?php 
            $service = isset($_GET['service']) ? htmlspecialchars($_GET['service']) : 'Service';
            $serviceTitles = [
              'liver' => 'Liver Treatment',
              'kidney' => 'Kidney Stone',
              'piles' => 'Piles & Fissure',
              'skin' => 'Skin Diseases',
              'sexual' => 'Sexual Wellness',
              'joint' => 'Joint Pain',
            ];
            echo isset($serviceTitles[$service]) ? $serviceTitles[$service] : 'Service Details';
          ?>
        </h1>
        <p class="lead" style="color:#1c4307;">
          <?php
            $serviceDescs = [
              'liver' => 'Advanced Unani therapies for liver disorders, detoxification, and improved liver function.',
              'kidney' => 'Natural remedies and non-invasive procedures for kidney stones and urinary health.',
              'piles' => 'Effective Unani treatments for piles, fissures, and digestive wellness.',
              'skin' => 'Herbal and Unani solutions for chronic skin conditions and hair care.',
              'sexual' => 'Confidential care and natural therapies for men’s and women’s sexual health.',
              'joint' => 'Unani and herbal pain management for arthritis, back pain, and joint disorders.',
            ];
            echo isset($serviceDescs[$service]) ? $serviceDescs[$service] : 'Learn more about our specialized Unani and herbal treatments.';
          ?>
        </p>
      </div>
      <div class="col-md-5 text-center">
        <img src="assets/images/services/<?php echo $service; ?>.png" alt="Service Image" class="img-fluid rounded shadow" style="max-height:320px; background:#fff; padding:12px;">
      </div>
    </div>
  </div>
</section>

<!-- Service Details Content Section -->
<section class="service-details-content-section" style="padding: 48px 0 32px 0;">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="card shadow-sm border-0 p-4 mb-4">
          <h3 class="fw-bold mb-3" style="color:#1c4307;">About This Service</h3>
          <p class="text-muted">Detailed information about the selected service will be displayed here. You can add treatment process, benefits, FAQs, and more for each service.</p>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card shadow-sm border-0 p-4 mb-4">
          <h5 class="fw-bold mb-3" style="color:#1c4307;">Book an Appointment</h5>
          <a href="appointment.php" class="btn btn-primary w-100" style="background:#d63b3b; border:none;">Book Now</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>