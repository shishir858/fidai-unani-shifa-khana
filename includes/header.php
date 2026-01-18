    <?php
    require_once __DIR__ . '/config.php';
    // Fetch settings for header/footer
    $settings = [];
    $result = $conn->query("SELECT `key`, `value` FROM settings");
    while($row = $result->fetch_assoc()) {
      $settings[$row['key']] = $row['value'];
    }
    ?>
    <!-- Marquee below header -->
    <div class="header-marquee-wrapper">
      <div class="header-marquee custom-marquee" id="custom-marquee" style="padding: 0 20px;">
        <span class="marquee-item">Important: Free Consultation for Liver Disease</span>
        <span class="marquee-item">| Category: Unani Treatments</span>
        <span class="marquee-item">| Category: Herbal Medicines</span>
        <span class="marquee-item">| Category: Pain Management</span>
        <span class="marquee-item">| Category: Skin & Hair Care</span>
        <span class="marquee-item">| Category: Child Health</span>
        <span class="marquee-item">Important: Free Consultation for Liver Disease</span>
        <span class="marquee-item">| Category: Unani Treatments</span>
        <span class="marquee-item">| Category: Herbal Medicines</span>
        <span class="marquee-item">| Category: Pain Management</span>
        <span class="marquee-item">| Category: Skin & Hair Care</span>
        <span class="marquee-item">| Category: Child Health</span>
      </div>
    </div>

    <script>
    // Custom marquee: show full text, then scroll
    document.addEventListener('DOMContentLoaded', function() {
      var marquee = document.getElementById('custom-marquee');
      var delay = 2500; // ms to show full text before scrolling
      var scrollSpeed = 1; // px per frame
      var interval;
      function startScroll() {
        var maxScroll = marquee.scrollWidth - marquee.clientWidth;
        var pos = 0;
        interval = setInterval(function() {
          if (pos < maxScroll) {
            pos += scrollSpeed;
            marquee.scrollLeft = pos;
          } else {
            pos = 0;
            marquee.scrollLeft = 0;
          }
        }, 16); // ~60fps
      }
      setTimeout(startScroll, delay);
      // Reset scroll on resize
      window.addEventListener('resize', function() {
        marquee.scrollLeft = 0;
      });
    });
    </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fidai Unani Shifa Khana</title>
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- OwlCarousel2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <!-- Bootstrap 5 CSS (CDN fallback for safety) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Bootstrap JS (for slider functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <!-- Bootstrap JS (for slider functionality, in header for immediate availability) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Desktop Top Bar -->
    <div class="top-bar desktop-top-bar">
      <div class="top-left">
        <a href="#"><?php echo htmlspecialchars($settings['site_name'] ?? 'Fidai Unani Shifa Khana'); ?></a>
        <a href="index.php#testimonial-section">Testimonials</a>
        <a href="#">Blogs</a>
        <a href="contact">Contact Us</a>
        <?php if(!empty($settings['whatsapp'])): ?>
        <a href="https://wa.me/<?php echo htmlspecialchars($settings['whatsapp']); ?>">Whatsapp Us</a>
        <?php endif; ?>
      </div>
      <div class="top-right">
        <?php if(!empty($settings['phone'])):
          $phones = explode(',', $settings['phone']);
          foreach($phones as $ph): ?>
            <span>📞 <a href="tel:<?php echo trim($ph); ?>"><?php echo trim($ph); ?></a></span>
        <?php endforeach; endif; ?>
      </div>
    </div>

    <!-- Desktop Main Header -->
    <header class="main-header desktop-main-header">
      <div class="logo">
        <a href="./">
          <img src="<?php echo htmlspecialchars($settings['logo'] ?? 'assets/images/logo/logo-light.png'); ?>" alt="<?php echo htmlspecialchars($settings['site_name'] ?? 'Fidai Unani Shifa Khana'); ?>">
        </a>
      </div>
      <nav class="nav-menu">
        <a href="./">Home</a>
        <a href="about">About Us</a>
        <a href="doctors">Our Doctors</a>
        <a href="services">Specialities</a>
        <a href="index.php#faq-section">FAQs</a>
      </nav>
      <div class="header-buttons">
        <a href="tel:<?php echo htmlspecialchars($settings['emergency_phone'] ?? ''); ?>" class="international">Emergency Consultant</a>
        <a href="appointment" class="appointment">Book Appointments</a>
      </div>
    </header>

    <!-- Mobile Top Bar -->
    <div class="mobile-top-bar">
      <div class="mobile-bar-left">
        <a href="https://wa.me/919999999999" class="mobile-bar-link">Whatsapp</a>
        <a href="tel:9999446622" class="mobile-bar-link">9999446622</a>
      </div>
      <div class="mobile-bar-right">
        <div class="mobile-hamburger" id="mobile-hamburger-menu">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>

    <!-- Mobile Logo & Buttons Section (only mobile) -->
    <div class="mobile-logo-btns-section">
      <div class="mobile-logo-btns-inner">
        <div class="mobile-logo-center">
          <img src="assets/images/logo/logo-light.png" alt="Fidai Unani Shifa Khana" style="height:55px; max-width:90%;">
        </div>
        <div class="mobile-btns-row">
          <a href="#" class="mobile-intl-btn">International Patients</a>
          <a href="/appointment.php" class="mobile-appt-btn">Book Appointments</a>
        </div>
      </div>
    </div>

    <!-- Mobile Side Menu (hidden by default) -->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay"></div>
    <div class="mobile-side-menu" id="mobile-side-menu">
      <button class="close-mobile-menu" id="close-mobile-menu" aria-label="Close">&times;</button>
      <div class="mobile-side-menu-content mobile-menu-logo-btns">
        <div class="mobile-menu-logo" style="text-align:center; margin-bottom:18px;">
          <img src="assets/images/logo/logo-light.png" alt="Fidai Unani Shifa Khana" style="height:55px; max-width:90%;">
        </div>
        <nav class="mobile-nav-menu" style="display:flex; flex-direction:column; margin-bottom:18px; gap:10px;">
          <a href="about.php">About Us</a>
          <a href="doctors.php">Our Doctors</a>
          <a href="services.php">Specialities</a>
          <a href="treatments.php">Treatments</a>
          <a href="index.php#faq-section">FAQs</a>
        </nav>
        <div class="mobile-menu-btns" style="display:flex; gap:10px; justify-content:center;">
          <a href="#" class="mobile-intl-btn">International Patients</a>
          <a href="appointment.php" class="mobile-appt-btn">Book Appointments</a>
        </div>
      </div>
    </div>

    <script>
    // Mobile hamburger menu for animated left-side slider with overlay and close button
    document.addEventListener('DOMContentLoaded', function() {
      var hamburger = document.getElementById('mobile-hamburger-menu');
      var sideMenu = document.getElementById('mobile-side-menu');
      var overlay = document.getElementById('mobile-menu-overlay');
      var closeBtn = document.getElementById('close-mobile-menu');
      function openMenu() {
        sideMenu.classList.add('open');
        overlay.classList.add('open');
        document.body.classList.add('mobile-menu-open');
      }
      function closeMenu() {
        sideMenu.classList.remove('open');
        overlay.classList.remove('open');
        document.body.classList.remove('mobile-menu-open');
      }
      if (hamburger && sideMenu && overlay && closeBtn) {
        hamburger.addEventListener('click', function(e) {
          if (sideMenu.classList.contains('open')) {
            closeMenu();
          } else {
            openMenu();
          }
        });
        overlay.addEventListener('click', closeMenu);
        closeBtn.addEventListener('click', closeMenu);
        // Optional: close on ESC key
        document.addEventListener('keydown', function(e) {
          if (e.key === 'Escape') closeMenu();
        });
      }
    });
    </script>
</body>
</html>
