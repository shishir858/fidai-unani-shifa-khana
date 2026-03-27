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
        <span class="marquee-item"> &#11088; Important: Free Consultation for Liver Disease &#11088;</span>
        <span class="marquee-item"> &#11088;Unani Treatments</span>
        <span class="marquee-item"> &#11088; Herbal Medicines &#11088; </span>
        <span class="marquee-item"> &#11088; Pain Management &#11088;</span>
        <span class="marquee-item"> &#11088; Skin & Hair Care &#11088;</span>
        <span class="marquee-item"> &#11088; Child Health &#11088;</span>
        <span class="marquee-item"> &#11088; Unani Treatments &#11088;</span>
        <span class="marquee-item"> &#11088; Herbal Medicines &#11088;</span>
        <span class="marquee-item"> &#11088; Pain Management &#11088;</span>
        <span class="marquee-item"> &#11088; Skin & Hair Care &#11088;</span>
        <span class="marquee-item"> &#11088; Child Health &#11088;</span>
      </div>
    </div>

    <script>
    // Custom marquee: show full text, then scroll
    document.addEventListener('DOMContentLoaded', function() {
      var marquee = document.getElementById('custom-marquee');
      var delay = 2500; // ms to show full text before scrolling
      var scrollSpeed = 1; // px per frame
      var interval;
      function updateStickyLayout() {
        var root = document.documentElement;
        var body = document.body;
        var marqueeWrap = document.querySelector('.header-marquee-wrapper');
        var marqueeH = marqueeWrap ? marqueeWrap.offsetHeight : 32;
        root.style.setProperty('--marquee-h', marqueeH + 'px');
        body.style.paddingTop = marqueeH + 'px';
      }
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
      updateStickyLayout();
      // Reset scroll on resize
      window.addEventListener('resize', function() {
        marquee.scrollLeft = 0;
        updateStickyLayout();
      });
      window.addEventListener('load', updateStickyLayout);
    });
    </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
      $siteName = $settings['site_name'] ?? 'Fidai Unani Shifa Khana';
      $siteDesc = $settings['meta_description'] ?? 'Fidai Unani Shifa Khana provides holistic Unani and herbal treatments for better health and wellness.';
      $siteKeywords = $settings['meta_keywords'] ?? 'unani treatment, herbal treatment, unani doctor, fidai unani shifa khana';
      $currentPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
      $cleanPath = '/' . ltrim($currentPath, '/');
      $canonicalAuto = rtrim(BASE_URL, '/') . ($cleanPath === '/' ? '' : $cleanPath);

      $metaTitle = $siteName;
      $metaDescription = $siteDesc;
      $metaKeywords = $siteKeywords;
      $metaCanonical = $canonicalAuto;
      $metaRobots = 'index, follow';

      if (!empty($page_title)) $metaTitle = $page_title;
      if (!empty($page_description)) $metaDescription = $page_description;
      if (!empty($page_desc)) $metaDescription = $page_desc;
      if (!empty($page_keywords)) $metaKeywords = $page_keywords;
      if (!empty($page_canonical)) $metaCanonical = $page_canonical;
      if (!empty($page_robots)) $metaRobots = $page_robots;
    ?>
    <title><?php echo htmlspecialchars($metaTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($metaDescription); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($metaKeywords); ?>">
    <meta name="robots" content="<?php echo htmlspecialchars($metaRobots); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($metaCanonical); ?>">
    <?php $faviconUrl = rtrim(BASE_URL, '/') . '/assets/images/favicon/favicon.PNG?v=1'; ?>
    <link rel="icon" href="<?php echo htmlspecialchars($faviconUrl); ?>" type="image/png">
    <link rel="shortcut icon" href="<?php echo htmlspecialchars($faviconUrl); ?>" type="image/png">
    <link rel="apple-touch-icon" href="<?php echo htmlspecialchars($faviconUrl); ?>">
    <base href="<?php echo htmlspecialchars(BASE_URL); ?>">
    <link href="assets/css/style.css" rel="stylesheet">
    <?php if (!empty($extra_head)) echo $extra_head; ?>
    <!-- Google Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- OwlCarousel2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <!-- Bootstrap 5 CSS (CDN fallback for safety) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Bootstrap JS (for slider functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  
  <!-- Google tag (gtag.js) -->
  
  
  <script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "vwirggelg7");
</script>
  

  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TZJ6L2VX');</script>
<!-- End Google Tag Manager -->
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-X3CR5LH8N2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-X3CR5LH8N2');
</script>
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K66H5NKJ');</script>
<!-- End Google Tag Manager -->
</head>
<body>
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K66H5NKJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -
  
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TZJ6L2VX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  
  <!-- Bootstrap JS (for slider functionality, in header for immediate availability) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Desktop Top Bar -->
    <div class="top-bar desktop-top-bar">
      <div class="top-left">
        <a href="#"><?php echo htmlspecialchars($settings['site_name'] ?? 'Fidai Unani Shifa Khana'); ?></a>
        <a href="./#testimonial-section">Testimonials</a>
        <a href="blog">Blog</a>
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
          <img src="<?php echo htmlspecialchars($settings['logo'] ?? 'assets/images/logo/logo-light.PNG'); ?>" alt="<?php echo htmlspecialchars($settings['site_name'] ?? 'Fidai Unani Shifa Khana'); ?>">
        </a>
      </div>
      <nav class="nav-menu">
        <a href="./">Home</a>
        <a href="about">About Us</a>
        <a href="doctors">Our Doctors</a>
        <a href="services">Specialities</a>
        <a href="./#faq-section">FAQs</a>
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
          <img src="assets/images/logo/logo-light.PNG" alt="Fidai Unani Shifa Khana" style="height:55px; max-width:90%;">
        </div>
        <div class="mobile-btns-row">
          <a href="#" class="mobile-intl-btn">International Patients</a>
          <a href="appointment" class="mobile-appt-btn">Book Appointments</a>
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
          <a href="about">About Us</a>
          <a href="doctors">Our Doctors</a>
          <a href="services">Specialities</a>
          <a href="blog">Blog</a>
          <a href="./#faq-section">FAQs</a>
        </nav>
        <div class="mobile-menu-btns" style="display:flex; gap:10px; justify-content:center;">
          <a href="#" class="mobile-intl-btn">International Patients</a>
          <a href="appointment" class="mobile-appt-btn">Book Appointments</a>
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
