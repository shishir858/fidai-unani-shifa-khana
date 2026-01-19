<?php require_once 'admin/includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<!-- ======= Unique Modern Hero Section ======= -->



<section class="modern-hero-section-bannerfocus position-relative" style="overflow:hidden;min-height:100vh;background:#000;margin-bottom:48px;">
   <!-- Banner Background Carousel with Parallax, NO overlays -->
   <div class="modern-hero-banner-bg owl-carousel owl-theme" style="position:absolute;top:0;left:0;width:100vw;height:100vh;z-index:0;will-change:transform;">
      <div class="modern-hero-banner-slide"><img src="assets/images/sliders/9.png" alt="Banner 1" style="width:100vw;height:100vh;object-fit:cover;object-position:center;"></div>
      <!-- <div class="modern-hero-banner-slide"><img src="assets/images/sliders/6.png" alt="Banner 2" style="width:100vw;height:100vh;object-fit:cover;object-position:center;"></div> -->
      <div class="modern-hero-banner-slide"><img src="assets/images/sliders/8.png" alt="Banner 3" style="width:100vw;height:100vh;object-fit:cover;object-position:center;"></div>
   </div>
   <!-- Full banner overlay for readability -->
   <div class="modern-hero-full-overlay" style="position:absolute;top:0;left:0;width:100vw;height:100vh;z-index:1;background:rgba(0,0,0,0.38);pointer-events:none;"></div>
   <!-- Animated SVG Blobs & Morphing Shapes (subtle, not overlaying text) -->
   <svg class="hero-svg-blob" viewBox="0 0 800 600" width="800" height="600" style="position:absolute;top:-120px;left:-120px;z-index:1;opacity:0.25;pointer-events:none;">
      <defs>
         <radialGradient id="blobGrad" cx="50%" cy="50%" r="50%">
            <stop offset="0%" stop-color="#d63b3b"/>
            <stop offset="100%" stop-color="#1c4307"/>
         </radialGradient>
      </defs>
      <path id="blobPath" fill="url(#blobGrad)" d="M421,320Q420,390,350,420Q280,450,220,400Q160,350,180,270Q200,190,270,170Q340,150,400,200Q460,250,421,320Z">
         <animate attributeName="d" dur="12s" repeatCount="indefinite"
            values="M421,320Q420,390,350,420Q280,450,220,400Q160,350,180,270Q200,190,270,170Q340,150,400,200Q460,250,421,320Z;
            M400,320Q420,390,350,420Q280,450,220,400Q160,350,180,270Q200,190,270,170Q340,150,400,200Q460,250,400,320Z;
            M421,320Q420,390,350,420Q280,450,220,400Q160,350,180,270Q200,190,270,170Q340,150,400,200Q460,250,421,320Z"/>
      </path>
   </svg>
   <div class="container position-relative" style="z-index:2;min-height:100vh;display:flex;align-items:center;">
      <div class="row align-items-center justify-content-between w-100" style="min-height:80vh;">
         <div class="col-lg-7 d-flex flex-column justify-content-center align-items-start" style="gap:1.2rem;">
            <div class="hero-content-overlay p-3 p-md-4 rounded-4" >
               <div class="kinetic-text-wrap" style="margin-bottom:1rem;">
                  <h1 class="modern-hero-title kinetic-text" style="font-weight:800;font-size:clamp(1.4rem,4vw,2.7rem);color:#fff;line-height:1.13;letter-spacing:1.2px;text-shadow:0 4px 16px #000a,0 1px 6px #000a;">
                     <span class="kinetic-word" style="display:inline-block;animation:kineticMove 2.5s infinite alternate cubic-bezier(.4,2,.6,1);">Dedicated to Your Health, </span><br>
                     <span class="kinetic-word" style="display:inline-block;animation:kineticMove2 2.5s infinite alternate-reverse cubic-bezier(.4,2,.6,1);color:#d63b3b;">Committed to Your Well-Being</span>
                  </h1>
               </div>
               <p class="modern-hero-tagline animate__animated animate__fadeInLeft" style="font-size:1.08rem;color:#fff;font-weight:600;text-shadow:0 1px 6px #000a;">Experience the best in Unani & Herbal care at <b>Fidai Unani Shifa Khana</b></p>
               <div class="modern-hero-features mb-3 row gx-2 gy-2 flex-wrap">
                  <div class="col-12 col-md-6">
                     <div class="animate__animated animate__fadeInUp" style="background:rgba(0,0,0,0.45);padding:0.5em 1em;border-radius:2em;font-weight:600;color:#fff;box-shadow:0 1px 4px #0006;animation-delay:0.2s;font-size:0.98rem;display:flex;align-items:center;gap:8px;">
                        <i class="bi bi-check-circle-fill text-success"></i> Personalized Unani Treatments
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <div class="animate__animated animate__fadeInUp" style="background:rgba(0,0,0,0.45);padding:0.5em 1em;border-radius:2em;font-weight:600;color:#fff;box-shadow:0 1px 4px #0006;animation-delay:0.4s;font-size:0.98rem;display:flex;align-items:center;gap:8px;">
                        <i class="bi bi-check-circle-fill text-success"></i> Experienced & Caring Doctors
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <div class="animate__animated animate__fadeInUp" style="background:rgba(0,0,0,0.45);padding:0.5em 1em;border-radius:2em;font-weight:600;color:#fff;box-shadow:0 1px 4px #0006;animation-delay:0.6s;font-size:0.98rem;display:flex;align-items:center;gap:8px;">
                        <i class="bi bi-check-circle-fill text-success"></i> Holistic Healing Approach
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <div class="animate__animated animate__fadeInUp" style="background:rgba(0,0,0,0.45);padding:0.5em 1em;border-radius:2em;font-weight:600;color:#fff;box-shadow:0 1px 4px #0006;animation-delay:0.8s;font-size:0.98rem;display:flex;align-items:center;gap:8px;">
                        <i class="bi bi-check-circle-fill text-success"></i> Modern Facilities & Patient-Centered Care
                     </div>
                  </div>
               </div>
               <a href="/appointment/index.php" class="btn btn-danger btn-lg modern-hero-btn-future animate__animated animate__pulse d-none d-md-inline-block" style="font-weight:800;font-size:1.08rem;border-radius:2em;box-shadow:0 2px 12px #d63b3b99,0 1px 6px #1c430799;letter-spacing:1.1px;transition:box-shadow 0.2s;padding:0.7em 2.2em;">Book Appointment</a>
            </div>
         </div>
         <!-- Doctor image card: show only on mobile/tablet, hide on desktop -->
         <div class="col-12 d-block d-lg-none mt-4 mb-2" style="z-index:3;">
            <div class="modern-hero-holo-card position-relative mx-auto" style="max-width:320px;">
               <div class="modern-hero-holo-glass p-3 rounded-4 shadow-lg animate__animated animate__fadeInRight" style="background:rgba(0,0,0,0.18);box-shadow:0 4px 16px #000a,0 1px 6px #1c430799;border:2px solid #d63b3b55;transition:transform 0.4s cubic-bezier(.4,2,.6,1);position:relative;overflow:visible;">
                  <img src="assets/images/about/4.png" alt="Doctor" class="modern-hero-holo-img tilt-3d" style="width:100%;border-radius:1.1em;box-shadow:0 4px 24px #d63b3bcc,0 1px 6px #1c430799;will-change:transform;filter:drop-shadow(0 0 16px #d63b3b88) drop-shadow(0 0 12px #1c430788);">
                  <div class="holo-glow" style="position:absolute;top:-10px;left:-10px;width:calc(100% + 20px);height:calc(100% + 20px);border-radius:1.3em;border:2px solid #fff3;box-shadow:0 0 24px #d63b3b77,0 0 16px #1c430777;pointer-events:none;z-index:2;animation:glowPulse 2.5s infinite alternate;"></div>
                  <div class="text-center mt-2">
                     <span class="badge badge-creative animate__animated animate__bounceInDown" style="background:linear-gradient(90deg,#d63b3b,#1c4307);color:#fff;font-size:0.98rem;padding:0.5em 1.1em;border-radius:2em;box-shadow:0 1px 6px #d63b3b33;letter-spacing:0.7px;">Unani & Herbal Experts</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Animated SVG Shape Bottom (overlapping, not pushing content) -->
   <svg viewBox="0 0 1440 90" fill="none" xmlns="http://www.w3.org/2000/svg" style="position:absolute;bottom:0;left:0;width:100vw;height:90px;z-index:10;pointer-events:none;display:block;"><path d="M0,60 C360,120 1080,0 1440,60 L1440,90 L0,90 Z" fill="#d63b3b" fill-opacity="0.13"/></svg>
   <style>
      h1, h2, h3, h4, h5, h6 {
         text-transform: uppercase;
         letter-spacing: 1px;
      }
      .modern-hero-section-bannerfocus {position:relative;min-height:100vh;}
      .modern-hero-banner-bg .modern-hero-banner-slide {width:100vw;height:100vh;}
      .modern-hero-banner-bg .modern-hero-banner-slide img {width:100vw;height:100vh;object-fit:cover;object-position:center;}
      @media (max-width:767px) {
         .modern-hero-banner-bg .modern-hero-banner-slide img {
            object-position: center center !important;
         }
      }
      .hero-svg-blob {animation:blobMove 18s infinite alternate cubic-bezier(.4,2,.6,1);}
      @keyframes blobMove {0%{transform:scale(1) translateY(0);}100%{transform:scale(1.15) translateY(40px);}}
      .kinetic-word {animation-duration:2.5s;}
      @keyframes kineticMove {0%{transform:translateY(0);}100%{transform:translateY(-12px) scale(1.08);}}
      @keyframes kineticMove2 {0%{transform:translateY(0);}100%{transform:translateY(12px) scale(1.08);}}
      .modern-hero-holo-card:hover .modern-hero-holo-img {transform:perspective(900px) rotateY(8deg) scale(1.09);box-shadow:0 24px 64px #d63b3bcc,0 4px 24px #1c430799;}
      @keyframes glowPulse {0%{box-shadow:0 0 48px #d63b3b77,0 0 32px #1c430777;}100%{box-shadow:0 0 96px #d63b3bcc,0 0 64px #1c4307cc;}}
      @media (max-width:991px) {.modern-hero-section-bannerfocus .col-lg-7,.modern-hero-section-bannerfocus .col-lg-5{margin-bottom:2.5rem!important;}}
      @media (max-width:767px) {.modern-hero-section-bannerfocus{padding:2.5rem 0;}.modern-hero-holo-glass{padding:1.5rem!important;}}
   </style>
   <script>
      // OwlCarousel for hero banners
      document.addEventListener('DOMContentLoaded', function() {
         if (window.jQuery && $('.modern-hero-banner-bg').length && !$('.modern-hero-banner-bg').hasClass('owl-loaded')) {
            $('.modern-hero-banner-bg').owlCarousel({
               items:1,
               loop:true,
               autoplay:true,
               autoplayTimeout:4000,
               animateOut:'fadeOut',
               dots:false,
               nav:false
            });
         }

         // OwlCarousel for Featured Treatments
         if (window.jQuery && $('.featured-treatments-carousel-creative').length && !$('.featured-treatments-carousel-creative').hasClass('owl-loaded')) {
            $('.featured-treatments-carousel-creative').owlCarousel({
               items:4,
               margin:24,
               loop:true,
               autoplay:true,
               autoplayTimeout:4200,
               dots:true,
               nav:true,
               responsive:{
                  0:{items:1},
                  600:{items:2},
                  1000:{items:4}
               }
            });
         }
         // Parallax effect for banners
         window.addEventListener('scroll', function() {
            var scrolled = window.scrollY;
            var banners = document.querySelector('.modern-hero-banner-bg');
            if(banners) banners.style.transform = 'translateY(' + (scrolled * 0.2) + 'px)';
         });
         // 3D tilt effect for doctor image
         var tiltImg = document.querySelector('.modern-hero-holo-img');
         if(tiltImg) {
            tiltImg.addEventListener('mousemove', function(e) {
               var rect = tiltImg.getBoundingClientRect();
               var x = e.clientX - rect.left;
               var y = e.clientY - rect.top;
               var centerX = rect.width/2;
               var centerY = rect.height/2;
               var rotateY = (x-centerX)/centerX*12;
               var rotateX = -(y-centerY)/centerY*12;
               tiltImg.style.transform = 'perspective(900px) rotateY(' + rotateY + 'deg) rotateX(' + rotateX + 'deg) scale(1.09)';
            });
            tiltImg.addEventListener('mouseleave', function() {
               tiltImg.style.transform = '';
            });
         }
      });
   </script>
</section>
<!-- End Unique Modern Hero Section -->

<!-- ======= Achievements/Stats Bar Section ======= -->
<section class="stats-bar-section" style="margin-top:48px;margin-bottom:48px;">
   <div class="stats-bar-bg"></div>
   <div class="stats-bar-content">
      <div class="stats-bar-google">
         <div class="stats-bar-google-logo-wrap">
            <img src="assets/images/icons/g_icon.png" alt="Google" class="stats-bar-google-logo">
         </div>
         <div class="stats-bar-google-info">
            <span class="stats-bar-google-rating">4.9 <span class="stats-bar-stars">★★★★★</span></span>
            <span class="stats-bar-google-reviews">2,098 Google reviews</span>
         </div>
      </div>
      <div class="stats-bar-cards">
         <div class="stats-bar-card">
            <span class="stats-bar-icon"><i class="bi bi-activity"></i></span>
            <span class="stats-bar-label">25,000+ Surgeries</span>
         </div>
         <div class="stats-bar-card">
            <span class="stats-bar-icon"><i class="bi bi-people"></i></span>
            <span class="stats-bar-label">20+ Years Experience</span>
         </div>
         <div class="stats-bar-card">
            <span class="stats-bar-icon"><i class="bi bi-emoji-smile"></i></span>
            <span class="stats-bar-label">50,000+ Happy Patients</span>
         </div>
      </div>
   </div>
</section>
<!-- End Achievements/Stats Bar Section -->
<!-- ======= Categories Carousel Section ======= -->
<section class="categories-carousel-section-creative py-5 position-relative" style="background:linear-gradient(120deg,#f8f9fa 60%,#e6f2e6 100%);overflow:hidden;margin-top:48px;margin-bottom:48px;">
   <!-- SVG Wave Top -->
   <div style="position:absolute;top:-1px;left:0;width:100%;z-index:1;">
      <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:60px;display:block;"><path d="M0,30 C360,60 1080,0 1440,30 L1440,0 L0,0 Z" fill="#1c4307" fill-opacity="0.08"/></svg>
   </div>
   <!-- Floating icons -->
   <div class="floating-icons">
      <span class="material-icons floating-icon floating-icon-1">eco</span>
      <span class="material-icons floating-icon floating-icon-2">favorite</span>
   </div>
   <div class="container position-relative" style="z-index:2;">
      <h2 class="text-center mb-4" style="font-weight:900;background:linear-gradient(90deg,#1c4307,#d63b3b);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Our Specialties</h2>
      <div class="categories-carousel-wrapper-creative position-relative">
         <button class="carousel-arrow left" aria-label="Previous"><i class="bi bi-chevron-left"></i></button>
         <div class="categories-carousel">
            <?php
               // Fetch categories from DB
               $categories = mysqli_query($conn, "SELECT name, image FROM categories ORDER BY id DESC LIMIT 10");
               if(mysqli_num_rows($categories) > 0):
                  while($cat = mysqli_fetch_assoc($categories)):
            ?>
            <div class="category-card-creative animate__animated animate__zoomIn">
               <div class="category-img-wrap-creative" style="background:rgba(214,59,59,0.07);border-radius:1.5em;box-shadow:0 2px 12px #d63b3b22;overflow:hidden;">
                  <img src="assets/images/categories/<?php echo htmlspecialchars($cat['image']); ?>" alt="<?php echo htmlspecialchars($cat['name']); ?>" style="width:100%;height:120px;object-fit:cover;transition:transform 0.3s;">
               </div>
               <div class="category-title-creative" style="font-weight:700;color:#1c4307;font-size:1.1rem;margin-top:0.7em;letter-spacing:0.5px;text-align:center;"> <?php echo htmlspecialchars($cat['name']); ?> </div>
            </div>
            <?php endwhile; endif; ?>
         </div>
         <button class="carousel-arrow right" aria-label="Next"><i class="bi bi-chevron-right"></i></button>
      </div>
   </div>
   <style>
      .categories-carousel-section-creative {position:relative;min-height:340px;}
      .categories-carousel-wrapper-creative {display:flex;align-items:center;gap:1.5em;}
      .categories-carousel {display:flex;gap:1.5em;overflow-x:auto;padding:1em 0;scrollbar-width:none;}
      .category-card-creative {min-width:180px;max-width:200px;background:rgba(255,255,255,0.92);border-radius:1.5em;box-shadow:0 2px 12px #1c430722;transition:transform 0.3s,box-shadow 0.3s;cursor:pointer;}
      .category-card-creative:hover {transform:scale(1.07) rotateY(6deg);box-shadow:0 8px 32px #d63b3b33;z-index:2;}
      .category-img-wrap-creative img:hover {transform:scale(1.08);}
      .floating-icons {position:absolute;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:0;}
      .floating-icon {position:absolute;width:40px;height:40px;opacity:0.13;animation:floatIcon 8s infinite alternate;z-index:1;}
      .floating-icon-1 {left:6%;top:22%;animation-delay:0s;}
      .floating-icon-2 {right:8%;top:12%;animation-delay:1.2s;}
      @keyframes floatIcon {0%{transform:translateY(0) scale(1);}50%{transform:translateY(-12px) scale(1.08);}100%{transform:translateY(0) scale(1);}}
      @media (max-width:991px) {.category-card-creative{min-width:140px;max-width:160px;}}
      @media (max-width:767px) {.categories-carousel-section-creative{padding:2.5rem 0;}.category-card-creative{min-width:120px;max-width:140px;}}
   </style>
</section>
<!-- End Categories Carousel Section -->

<!-- ======= Featured Treatments Section ======= -->
<section class="featured-treatments-section-creative py-5 position-relative" style="background:linear-gradient(120deg,#e6f2e6 60%,#f8f9fa 100%);overflow:hidden;">
   <!-- SVG Wave Top -->
   <div style="position:absolute;top:-1px;left:0;width:100%;z-index:1;">
      <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:60px;display:block;"><path d="M0,30 C360,60 1080,0 1440,30 L1440,0 L0,0 Z" fill="#d63b3b" fill-opacity="0.08"/></svg>
   </div>
   <!-- Floating icons -->
   <div class="floating-icons">
      <span class="material-icons floating-icon floating-icon-1">medication</span>
      <span class="material-icons floating-icon floating-icon-2">eco</span>
   </div>
   <div class="container position-relative" style="z-index:2;">
      <h2 class="text-center mb-4" style="font-weight:900;background:linear-gradient(90deg,#d63b3b,#1c4307);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">Featured Treatments</h2>
      <p class="text-center mb-4" style="color:#555;max-width:600px;margin:0 auto 18px auto;font-size:1.13rem;">Discover our most popular and effective Unani treatments, carefully selected to address a wide range of health concerns with proven results.</p>
      <div class="featured-treatments-carousel-creative owl-carousel owl-theme">
         <?php
            $treatments = mysqli_query($conn, "SELECT t.*, c.name as category_name FROM treatments t LEFT JOIN categories c ON FIND_IN_SET(c.id, t.related_treatments) > 0 WHERE t.status='active' ORDER BY t.created_at DESC LIMIT 6");
            if(mysqli_num_rows($treatments) > 0):
               while($treat = mysqli_fetch_assoc($treatments)):
         ?>
         <div class="item">
            <div class="treatment-card-creative animate__animated animate__fadeInUp">
               <div class="treatment-img-wrap-creative" style="background:rgba(28,67,7,0.07);border-radius:1.5em 1.5em 0 0;overflow:hidden;">
                  <?php if(!empty($treat['feature_image'])): ?>
                     <img src="assets/images/treatments/<?php echo htmlspecialchars($treat['feature_image']); ?>" alt="<?php echo htmlspecialchars($treat['title']); ?>" style="width:100%;height:160px;object-fit:cover;transition:transform 0.3s;">
                  <?php else: ?>
                     <div style="width:100%;height:160px;background:#bab9b9;display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-image" style="font-size:2.5rem;color:#fff;"></i>
                     </div>
                  <?php endif; ?>
               </div>
               <div class="treatment-card-body-creative text-center p-3" style="background:rgba(255,255,255,0.92);border-radius:0 0 1.5em 1.5em;box-shadow:0 2px 12px #1c430722;">
                  <h5 class="card-title mb-1" style="color:#1c4307;font-weight:800;font-size:1.18rem;letter-spacing:0.5px;">
                     <?php echo htmlspecialchars($treat['title']); ?>
                  </h5>
                  <div class="mb-2 text-muted" style="font-size:0.98rem;">
                     <i class="bi bi-folder"></i> <?php echo htmlspecialchars($treat['category_name']); ?>
                  </div>
                  <a href="service-details?service=<?php echo urlencode($treat['slug']); ?>" class="btn btn-outline-success btn-sm mt-2" style="border-radius:2em;font-weight:700;">Learn More</a>
               </div>
            </div>
         </div>
         <?php endwhile; endif; ?>
      </div>
   </div>
   <style>
      .featured-treatments-section-creative {position:relative;min-height:340px;}
      .featured-treatments-carousel-creative {gap:2em;}
      .treatment-card-creative {width:240px;max-width:100%;background:rgba(255,255,255,0.97);border-radius:1.5em;box-shadow:0 2px 12px #d63b3b22;transition:transform 0.3s,box-shadow 0.3s;cursor:pointer;display:flex;flex-direction:column;height:340px;overflow:hidden;}
      .treatment-card-creative:hover {transform:scale(1.07) rotateY(-6deg);box-shadow:0 8px 32px #1c430733;z-index:2;}
      .treatment-img-wrap-creative img:hover {transform:scale(1.08);}
      .floating-icons {position:absolute;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:0;}
      .floating-icon {position:absolute;width:40px;height:40px;opacity:0.13;animation:floatIcon 8s infinite alternate;z-index:1;}
      .floating-icon-1 {left:6%;top:22%;animation-delay:0s;}
      .floating-icon-2 {right:8%;top:12%;animation-delay:1.2s;}
      @keyframes floatIcon {0%{transform:translateY(0) scale(1);}50%{transform:translateY(-12px) scale(1.08);}100%{transform:translateY(0) scale(1);}}
      @media (max-width:991px) {.treatment-card-creative{width:180px;}}
      @media (max-width:767px) {
         .featured-treatments-section-creative{padding:2.5rem 0;}
         .treatment-card-creative{width:100vw;max-width:96vw;}
         .featured-treatments-carousel-creative .item {display:flex;justify-content:center;}
      }
   </style>
</section>

<!-- ======= Meet Our Doctors Section (Split Layout) ======= -->
<section class="doctors-section py-5">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-5 mb-4 mb-lg-0">
            <img src="assets/images/about/1.jpeg" alt="Doctors" style="width:100%;height:500px;max-width:100%;border-radius:18px;box-shadow:0 8px 32px #bab9b9;object-fit:cover;">
         </div>
         <div class="col-lg-7">
            <h2 class="mb-3" style="font-weight:800;color:#1c4307;">Meet Our Doctors</h2>
            <p style="font-size:1.08rem;color:#555;font-weight:500;">Our team of highly qualified and compassionate Unani doctors is dedicated to providing personalized care and holistic healing. With decades of experience and a patient-first approach, we ensure every individual receives the best treatment for their unique needs.</p>
            <ul style="font-size:1.05rem;color:#1c4307;font-weight:500;list-style:none;padding:0;">
               <li><i class="bi bi-check-circle-fill text-success"></i> 20+ Years of Experience</li>
               <li><i class="bi bi-check-circle-fill text-success"></i> Specialists in Unani & Herbal Medicine</li>
               <li><i class="bi bi-check-circle-fill text-success"></i> Patient-Centered Approach</li>
               <li><i class="bi bi-check-circle-fill text-success"></i> Modern Facilities & Research</li>
            </ul>
            <div class="row g-3 mt-4">
               <?php
                  $doctors = mysqli_query($conn, "SELECT * FROM doctor ORDER BY id DESC LIMIT 4");
                  if(mysqli_num_rows($doctors) > 0):
                  	while($doc = mysqli_fetch_assoc($doctors)):
                  ?>
               <div class="col-md-6">
                  <div class="card h-100 border-0 shadow-sm">
                     <div class="card-body text-center">
                        <!-- <div class="mb-2">
                           <img src="assets/images/doctor.png" alt="Doctor" style="width:60px;height:60px;border-radius:50%;object-fit:cover;box-shadow:0 2px 8px #bab9b9;">
                           </div> -->
                        <h5 class="card-title mb-1" style="color:#1c4307;font-weight:700;">
                           <?php echo htmlspecialchars($doc['name']); ?>
                        </h5>
                        <div class="text-muted mb-2" style="font-size:0.98rem;">
                           <?php echo htmlspecialchars($doc['title']); ?>
                        </div>
                     </div>
                  </div>
               </div>
               <?php endwhile; endif; ?>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- ======= Gallery Section ======= -->
<section class="gallery-section py-5 bg-light">
   <div class="container">
      <h2 class="text-center mb-4" style="font-weight:800;color:#1c4307;">Clinic Gallery</h2>
      <div class="row g-3 justify-content-center">
         <?php
            $gallery = mysqli_query($conn, "SELECT * FROM gallery ORDER BY id DESC LIMIT 8");
            if(mysqli_num_rows($gallery) > 0):
            	while($img = mysqli_fetch_assoc($gallery)):
            ?>
         <div class="col-md-3 col-sm-4 col-6">
            <div class="gallery-img-wrap" style="border-radius:12px;overflow:hidden;box-shadow:0 2px 8px #bab9b9;">
               <img src="<?php echo $img['image']; ?>" alt="Gallery" style="width:100%;height:160px;object-fit:cover;">
            </div>
         </div>
         <?php endwhile; endif; ?>
      </div>
   </div>
</section>

<!-- ======= Hope, Healing & Care Section ======= -->
<section class="hope-healing-section py-5" style="background:#f7f7f7;">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-8 text-center">
            <h2 class="mb-4" style="font-weight:800;color:#1c4307;">Providing Hope, Healing & Care for Chronic Patients</h2>
            <p style="font-size:1.15rem;color:#444;font-weight:500;line-height:1.7;">
               At Fidai Unani Shifa Khana, we are dedicated to supporting patients with chronic and critical illnesses. Our holistic Unani approach combines traditional wisdom with modern care, offering hope and healing for those who need it most. We believe every patient deserves compassionate treatment, personalized attention, and a path to better health.
            </p>
         </div>
      </div>
   </div>
</section>

<!-- ======= OUR STORY Section ======= -->
<section class="our-story-section py-5">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="assets/images/about/3.png" alt="Our Story" style="width:100%;height:320px;max-width:100%;border-radius:18px;box-shadow:0 8px 32px #bab9b9;object-fit:cover;">
         </div>
         <div class="col-lg-6">
            <h2 class="mb-3" style="font-weight:800;color:#1c4307;">OUR STORY</h2>
            <p style="font-size:1.08rem;color:#555;font-weight:500;">Fidai Unani Shifa Khana was founded with a vision to bring authentic Unani and herbal healing to the community. Our journey began decades ago, inspired by a passion for holistic medicine and a commitment to patient well-being. Today, we are proud to be a trusted name in Unani care, blending tradition with modern science to deliver outstanding results.</p>
            <ul style="font-size:1.05rem;color:#1c4307;font-weight:500;list-style:none;padding:0;">
               <li><i class="bi bi-check-circle-fill text-success"></i> Decades of Experience</li>
               <li><i class="bi bi-check-circle-fill text-success"></i> Thousands of Happy Patients</li>
               <li><i class="bi bi-check-circle-fill text-success"></i> Research & Innovation</li>
               <li><i class="bi bi-check-circle-fill text-success"></i> Community Trust</li>
            </ul>
         </div>
      </div>
   </div>
</section>

<!-- ======= Testimonial Section (Modern Card Carousel) ======= -->
<section class="testimonial-section py-5 bg-light" id="testimonial-section">
   <div class="container">
      <h2 class="text-center mb-4" style="font-weight:800;color:#1c4307;">What Our Patients Say</h2>
         <p class="text-center mb-4" style="color:#555;max-width:600px;margin:0 auto 18px auto;font-size:1.08rem;">Read real stories and feedback from our patients who have experienced healing and care at Fidai Unani Shifa Khana.</p>
      <div class="testimonial-carousel owl-carousel">
         <div class="item">
            <div class="testimonial-card shadow-lg p-4 bg-white rounded h-100 d-flex flex-column justify-content-between">
               <div>
                  <div class="d-flex align-items-center justify-content-center mb-2" style="gap:12px;">
                     <img src="assets/images/icons/g_icon.png" alt="Google Review" style="width:48px;height:48px;border-radius:50%;object-fit:cover;box-shadow:0 2px 8px #bab9b9;">
                     <div class="google-rating" style="font-weight:700;color:#1c4307;font-size:1.15rem;">
                        4.9 <span style="color:#fbbc04;font-size:1.1rem;">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                     </div>
                  </div>
                  <p class="mb-4" style="font-size:1.05rem;color:#555;font-weight:500;">“Fidai Unani Shifa Khana gave me hope when I had lost it. The doctors are truly caring and the treatments are effective. I am grateful for their support and expertise.”</p>
                  <div class="d-flex align-items-center justify-content-center mb-2" style="gap:16px;">
                     <div class="client-avatar d-flex align-items-center justify-content-center" style="width:48px;height:48px;border-radius:50%;background:#e6e6e6;color:#1c4307;font-weight:700;font-size:1.3rem;box-shadow:0 2px 8px #bab9b9;">
                        MR
                     </div>
                     <div class="text-start">
                        <h5 class="mb-0" style="color:#1c4307;font-weight:700;">Mohammad Rizwan</h5>
                        <div class="text-muted" style="font-size:0.98rem;">Liver Disease Treatment</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="testimonial-card shadow-lg p-4 bg-white rounded h-100 d-flex flex-column justify-content-between">
               <div>
                  <div class="d-flex align-items-center justify-content-center mb-2" style="gap:12px;">
                     <img src="assets/images/icons/g_icon.png" alt="Google Review" style="width:48px;height:48px;border-radius:50%;object-fit:cover;box-shadow:0 2px 8px #bab9b9;">
                     <div class="google-rating" style="font-weight:700;color:#1c4307;font-size:1.15rem;">
                        4.8 <span style="color:#fbbc04;font-size:1.1rem;">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                     </div>
                  </div>
                  <p class="mb-4" style="font-size:1.05rem;color:#555;font-weight:500;">“The personalized care and attention I received here was amazing. My allergy issues have improved so much. Highly recommended!”</p>
                  <div class="d-flex align-items-center justify-content-center mb-2" style="gap:16px;">
                     <div class="client-avatar d-flex align-items-center justify-content-center" style="width:48px;height:48px;border-radius:50%;background:#e6e6e6;color:#1c4307;font-weight:700;font-size:1.3rem;box-shadow:0 2px 8px #bab9b9;">
                        AK
                     </div>
                     <div class="text-start">
                        <h5 class="mb-0" style="color:#1c4307;font-weight:700;">Ayesha Khan</h5>
                        <div class="text-muted" style="font-size:0.98rem;">Allergy Treatment</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="testimonial-card shadow-lg p-4 bg-white rounded h-100 d-flex flex-column justify-content-between">
               <div>
                  <div class="d-flex align-items-center justify-content-center mb-2" style="gap:12px;">
                     <img src="assets/images/icons/g_icon.png" alt="Google Review" style="width:48px;height:48px;border-radius:50%;object-fit:cover;box-shadow:0 2px 8px #bab9b9;">
                     <div class="google-rating" style="font-weight:700;color:#1c4307;font-size:1.15rem;">
                        4.8 <span style="color:#fbbc04;font-size:1.1rem;">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                     </div>
                  </div>
                  <p class="mb-4" style="font-size:1.05rem;color:#555;font-weight:500;">“Excellent care and treatment. The staff is very supportive and the doctors are highly skilled. My health has improved a lot.”</p>
                  <div class="d-flex align-items-center justify-content-center mb-2" style="gap:16px;">
                     <div class="client-avatar d-flex align-items-center justify-content-center" style="width:48px;height:48px;border-radius:50%;background:#e6e6e6;color:#1c4307;font-weight:700;font-size:1.3rem;box-shadow:0 2px 8px #bab9b9;">
                        IS
                     </div>
                     <div class="text-start">
                        <h5 class="mb-0" style="color:#1c4307;font-weight:700;">Imran Shaikh</h5>
                        <div class="text-muted" style="font-size:0.98rem;">Kidney Treatment</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="testimonial-card shadow-lg p-4 bg-white rounded h-100 d-flex flex-column justify-content-between">
               <div>
                  <div class="d-flex align-items-center justify-content-center mb-2" style="gap:12px;">
                     <img src="assets/images/icons/g_icon.png" alt="Google Review" style="width:48px;height:48px;border-radius:50%;object-fit:cover;box-shadow:0 2px 8px #bab9b9;">
                     <div class="google-rating" style="font-weight:700;color:#1c4307;font-size:1.15rem;">
                        4.9 <span style="color:#fbbc04;font-size:1.1rem;">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                     </div>
                  </div>
                  <p class="mb-4" style="font-size:1.05rem;color:#555;font-weight:500;">
                     “Doctors explained everything clearly and treatment was very effective. Highly recommended hospital.”
                  </p>
                  <div class="d-flex align-items-center justify-content-center mb-2" style="gap:16px;">
                     <div class="client-avatar d-flex align-items-center justify-content-center" style="width:48px;height:48px;border-radius:50%;background:#e6e6e6;color:#1c4307;font-weight:700;font-size:1.3rem;box-shadow:0 2px 8px #bab9b9;">
                        AK
                     </div>
                     <div class="text-start">
                        <h5 class="mb-0" style="color:#1c4307;font-weight:700;">Amit Kumar</h5>
                        <div class="text-muted" style="font-size:0.98rem;">Cardiology Care</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="testimonial-card shadow-lg p-4 bg-white rounded h-100 d-flex flex-column justify-content-between">
               <div>
                  <div class="d-flex align-items-center justify-content-center mb-2" style="gap:12px;">
                     <img src="assets/images/icons/g_icon.png" alt="Google Review" style="width:48px;height:48px;border-radius:50%;object-fit:cover;box-shadow:0 2px 8px #bab9b9;">
                     <div class="google-rating" style="font-weight:700;color:#1c4307;font-size:1.15rem;">
                        5.0 <span style="color:#fbbc04;font-size:1.1rem;">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                     </div>
                  </div>
                  <p class="mb-4" style="font-size:1.05rem;color:#555;font-weight:500;">
                     “Clean hospital, polite staff and excellent medical facilities. I felt very safe and comfortable.”
                  </p>
                  <div class="d-flex align-items-center justify-content-center mb-2" style="gap:16px;">
                     <div class="client-avatar d-flex align-items-center justify-content-center" style="width:48px;height:48px;border-radius:50%;background:#e6e6e6;color:#1c4307;font-weight:700;font-size:1.3rem;box-shadow:0 2px 8px #bab9b9;">
                        RS
                     </div>
                     <div class="text-start">
                        <h5 class="mb-0" style="color:#1c4307;font-weight:700;">Rina Sharma</h5>
                        <div class="text-muted" style="font-size:0.98rem;">Orthopedic Treatment</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="testimonial-card shadow-lg p-4 bg-white rounded h-100 d-flex flex-column justify-content-between">
               <div>
                  <div class="d-flex align-items-center justify-content-center mb-2" style="gap:12px;">
                     <img src="assets/images/icons/g_icon.png" alt="Google Review" style="width:48px;height:48px;border-radius:50%;object-fit:cover;box-shadow:0 2px 8px #bab9b9;">
                     <div class="google-rating" style="font-weight:700;color:#1c4307;font-size:1.15rem;">
                        4.8 <span style="color:#fbbc04;font-size:1.1rem;">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                     </div>
                  </div>
                  <p class="mb-4" style="font-size:1.05rem;color:#555;font-weight:500;">
                     “Very professional doctors and quick service. My recovery was faster than expected.”
                  </p>
                  <div class="d-flex align-items-center justify-content-center mb-2" style="gap:16px;">
                     <div class="client-avatar d-flex align-items-center justify-content-center" style="width:48px;height:48px;border-radius:50%;background:#e6e6e6;color:#1c4307;font-weight:700;font-size:1.3rem;box-shadow:0 2px 8px #bab9b9;">
                        MH
                     </div>
                     <div class="text-start">
                        <h5 class="mb-0" style="color:#1c4307;font-weight:700;">Mohit Hussain</h5>
                        <div class="text-muted" style="font-size:0.98rem;">General Surgery</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- ======= Specialities & Procedures Section ======= -->
<section class="specialities-section py-5">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-7 mb-4 mb-lg-0">
            <h2 class="mb-4" style="font-weight:800;color:#1c4307;">Specialities &amp; Procedures</h2>
            <div class="row g-3">
               <div class="col-md-6">
                  <div class="d-flex align-items-center mb-3">
                     <span class="speciality-icon" style="background:#e6f2e6;color:#1c4307;"><i class="bi bi-heart-pulse" style="font-size:2rem;"></i></span>
                     <span class="ms-3 speciality-title" style="font-weight:700;">Unani Urology &amp; Andrology</span>
                  </div>
                  <div class="d-flex align-items-center mb-3">
                     <span class="speciality-icon" style="background:#fde4e4;color:#d63b3b;"><i class="bi bi-capsule" style="font-size:2rem;"></i></span>
                     <span class="ms-3 speciality-title">Herbal Stone &amp; Prostate Care</span>
                  </div>
                  <div class="d-flex align-items-center mb-3">
                     <span class="speciality-icon" style="background:#e6f2e6;color:#1c4307;"><i class="bi bi-gender-ambiguous" style="font-size:2rem;"></i></span>
                     <span class="ms-3 speciality-title">Infertility &amp; Reproductive Health</span>
                  </div>
                  <div class="d-flex align-items-center mb-3">
                     <span class="speciality-icon" style="background:#fde4e4;color:#d63b3b;"><i class="bi bi-person-hearts" style="font-size:2rem;"></i></span>
                     <span class="ms-3 speciality-title">Weight Management &amp; Detox</span>
                  </div>
                  <div class="d-flex align-items-center mb-3">
                     <span class="speciality-icon" style="background:#e6f2e6;color:#1c4307;"><i class="bi bi-emoji-smile" style="font-size:2rem;"></i></span>
                     <span class="ms-3 speciality-title">Cosmetic &amp; Skin Treatments</span>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="d-flex align-items-center mb-3">
                     <span class="speciality-icon" style="background:#fde4e4;color:#d63b3b;"><i class="bi bi-bandaid" style="font-size:2rem;"></i></span>
                     <span class="ms-3 speciality-title">Laparoscopy &amp; Laser Procedures</span>
                  </div>
                  <div class="d-flex align-items-center mb-3">
                      <span class="speciality-icon" style="background:#e6f2e6;color:#1c4307;display:flex;align-items:center;justify-content:center;width:48px;height:48px;"><img src="https://img.icons8.com/color/48/tooth.png" alt="Dental Icon" style="height:32px;width:32px;object-fit:contain;"></span>
                      <span class="ms-3 speciality-title">Dental &amp; Oral Care</span>
                  </div>
                  <div class="d-flex align-items-center mb-3">
                     <span class="speciality-icon" style="background:#e6f2e6;color:#1c4307;"><i class="bi bi-people" style="font-size:2rem;"></i></span>
                     <span class="ms-3 speciality-title">Pediatrics &amp; Child Health</span>
                  </div>
                  <div class="d-flex align-items-center mb-3">
                     <span class="speciality-icon" style="background:#fde4e4;color:#d63b3b;"><i class="bi bi-ear" style="font-size:2rem;"></i></span>
                     <span class="ms-3 speciality-title">ENT &amp; Head-Neck Surgery</span>
                  </div>
               </div>
            </div>
            <div class="mt-4 d-flex flex-wrap gap-3">
               <a href="/appointment/index.php" class="btn btn-danger px-4 py-2" style="font-weight:600;font-size:1.1rem;">Consult Now</a>
               <a href="https://wa.me/919999999999" class="btn btn-success px-4 py-2" style="font-weight:600;font-size:1.1rem;">WhatsApp Us</a>
            </div>
         </div>
         <div class="col-lg-5 text-center">
            <div class="speciality-phone-mockup mx-auto p-0" style="max-width:320px;background:#fff;border-radius:32px;box-shadow:0 8px 32px #bab9b9;overflow:hidden;position:relative;">
               <div style="background:#1c4307;padding:32px 0 24px 0;border-radius:32px 32px 0 0;">
                  <img src="assets/images/logo/logo-light.png" alt="Clinic Logo" style="height:48px;">
               </div>
               <div style="padding:32px 18px 24px 18px;">
                  <h4 style="color:#d63b3b;font-weight:800;">Looking for an Expert?</h4>
                  <p style="color:#1c4307;font-size:1.08rem;">Our clinic is home to some of the best Unani and Herbal doctors. Book your consultation today for personalized care.</p>
                  <a href="/appointment/index.php" class="btn btn-danger w-100 mt-3" style="font-weight:700;">Consult Now</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!-- ======= Video Gallery Carousel Section ======= -->
<section class="video-gallery-section py-5 bg-light">
	<div class="container">
		<h2 class="text-center mb-4" style="font-weight:800;color:#1c4307;">Clinic Video Gallery</h2>
		<p class="text-center mb-4" style="color:#555;max-width:600px;margin:0 auto 18px auto;font-size:1.08rem;">Watch our latest clinic videos, patient stories, and treatment highlights.</p>
		<div class="video-carousel owl-carousel">
		<div class="item">
			<div class="card h-100 shadow-sm border-0">
				<div class="ratio ratio-16x9">
					<iframe src="https://www.youtube.com/embed/X-CgMKMaN9Q" title="Clinic Video 1" allowfullscreen></iframe>
				</div>
				<div class="card-body text-center">
					<h5 class="card-title mb-1" style="color:#1c4307;font-weight:700;">Clinic Video 1</h5>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="card h-100 shadow-sm border-0">
				<div class="ratio ratio-16x9">
					<iframe src="https://www.youtube.com/embed/FQHid2K4NQI" title="Clinic Video 2" allowfullscreen></iframe>
				</div>
				<div class="card-body text-center">
					<h5 class="card-title mb-1" style="color:#1c4307;font-weight:700;">Clinic Video 2</h5>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="card h-100 shadow-sm border-0">
				<div class="ratio ratio-16x9">
					<iframe src="https://www.youtube.com/embed/VCLK6CKWIv0" title="Clinic Video 3" allowfullscreen></iframe>
				</div>
				<div class="card-body text-center">
					<h5 class="card-title mb-1" style="color:#1c4307;font-weight:700;">Clinic Video 3</h5>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="card h-100 shadow-sm border-0">
				<div class="ratio ratio-16x9">
					<iframe src="https://www.youtube.com/embed/ODzQyLF2jdk" title="Clinic Video 4" allowfullscreen></iframe>
				</div>
				<div class="card-body text-center">
					<h5 class="card-title mb-1" style="color:#1c4307;font-weight:700;">Clinic Video 4</h5>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="card h-100 shadow-sm border-0">
				<div class="ratio ratio-16x9">
					<iframe src="https://www.youtube.com/embed/bdsYK5UHKM0" title="Clinic Video 5" allowfullscreen></iframe>
				</div>
				<div class="card-body text-center">
					<h5 class="card-title mb-1" style="color:#1c4307;font-weight:700;">Clinic Video 5</h5>
				</div>
			</div>
		</div>
		<div class="item">
			<div class="card h-100 shadow-sm border-0">
				<div class="ratio ratio-16x9">
					<iframe src="https://www.youtube.com/embed/fcpfHqS7HXA" title="Clinic Video 6" allowfullscreen></iframe>
				</div>
				<div class="card-body text-center">
					<h5 class="card-title mb-1" style="color:#1c4307;font-weight:700;">Clinic Video 6</h5>
				</div>
			</div>
		</div>
		</div>
	</div>
</section>

<!-- ======= FAQ Section ======= -->
<section class="faq-section py-5" id="faq-section">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6 mb-4 mb-lg-0 text-center">
            <img src="https://img.icons8.com/color/240/faq.png" alt="FAQ Illustration" style="max-width:340px;width:100%;height:auto;">
         </div>
         <div class="col-lg-6">
            <h2 class="mb-4" style="font-weight:800;color:#1c4307;">Frequently Asked Questions</h2>
            <div class="accordion" id="faqAccordion">
               <div class="accordion-item">
                  <h2 class="accordion-header" id="faq1">
                     <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                        What is Unani medicine?
                     </button>
                  </h2>
                  <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                     <div class="accordion-body">
                        Unani medicine is a traditional healing system based on natural therapies, herbal remedies, and holistic care, focusing on balancing the body's humors for optimal health.
                     </div>
                  </div>
               </div>
               <div class="accordion-item">
                  <h2 class="accordion-header" id="faq2">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        Do you offer personalized treatment plans?
                     </button>
                  </h2>
                  <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                     <div class="accordion-body">
                        Yes, every patient receives a personalized treatment plan tailored to their unique health needs and conditions.
                     </div>
                  </div>
               </div>
               <div class="accordion-item">
                  <h2 class="accordion-header" id="faq3">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        Are your doctors qualified?
                     </button>
                  </h2>
                  <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                     <div class="accordion-body">
                        Our doctors are highly qualified, experienced, and certified in Unani and herbal medicine, ensuring safe and effective care.
                     </div>
                  </div>
               </div>
               <div class="accordion-item">
                  <h2 class="accordion-header" id="faq4">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        How do I book an appointment?
                     </button>
                  </h2>
                  <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqAccordion">
                     <div class="accordion-body">
                        You can book an appointment online, call us, or visit our clinic directly. Our team will assist you at every step.
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<!-- ======= Book Appointment Section (Advanced Creative) ======= -->
<section class="book-appointment-section-creative position-relative py-5" style="background:linear-gradient(120deg,#e6f2e6 60%,#f8f9fa 100%);overflow:hidden;">
   <!-- SVG Wave Separator -->
   <div style="position:absolute;top:-1px;left:0;width:100%;z-index:1;">
      <svg viewBox="0 0 1440 90" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:90px;display:block;"><path d="M0,60 C360,120 1080,0 1440,60 L1440,0 L0,0 Z" fill="#d63b3b" fill-opacity="0.12"/></svg>
   </div>
   <!-- Floating Medical Icons -->
   <div class="floating-icons">
      <span class="material-icons floating-icon floating-icon-1">medical_services</span>
      <span class="material-icons floating-icon floating-icon-2">favorite</span>
      <span class="material-icons floating-icon floating-icon-3">eco</span>
      <span class="material-icons floating-icon floating-icon-4">medication</span>
   </div>
   <div class="container position-relative" style="z-index:2;">
      <div class="row align-items-center justify-content-center">
         <div class="col-lg-6 mb-4 mb-lg-0 animate__animated animate__fadeInLeft">
            <div class="d-flex flex-column align-items-start gap-3">
               <span class="badge badge-creative mb-2 animate__animated animate__bounceInDown" style="background:linear-gradient(90deg,#d63b3b,#1c4307);color:#fff;font-size:1.1rem;padding:0.7em 1.3em;border-radius:2em;box-shadow:0 2px 12px #d63b3b33;letter-spacing:1px;">New Patient Offer</span>
               <h2 class="mb-3" style="font-weight:900;background:linear-gradient(90deg,#d63b3b,#1c4307);-webkit-background-clip:text;-webkit-text-fill-color:transparent;font-size:2.5rem;">Book an Appointment<br><span style="font-size:1.5rem;font-weight:700;letter-spacing:1px;">at Fidai Unani Shifa Khana</span></h2>
               <p style="color:#444;font-size:1.18rem;max-width:520px;">Experience authentic Unani and Herbal care with our expert team. Whether you need treatment for chronic illness, lifestyle disorders, or holistic wellness, we are here to help. Fill out the form to schedule your consultation—our staff will contact you soon to confirm your visit and guide you on your healing journey.</p>
               <div class="d-flex flex-wrap gap-3 mt-4">
                  <a href="tel:9999446622" class="btn btn-danger px-4 py-2 shadow-lg" style="font-weight:700;font-size:1.15rem;border-radius:2em;box-shadow:0 4px 16px #d63b3b33;"><i class="bi bi-telephone"></i> Consult Now</a>
                  <a href="https://wa.me/919999999999" class="btn btn-success px-4 py-2 shadow-lg" style="font-weight:700;font-size:1.15rem;border-radius:2em;box-shadow:0 4px 16px #1c430733;"><i class="bi bi-whatsapp"></i> WhatsApp Us</a>
               </div>
            </div>
            <div class="mt-5 d-none d-lg-block" style="max-width:340px;">
               <img src="assets/images/about/doctor-illustration.png" alt="Doctor Illustration" style="width:100%;filter:drop-shadow(0 8px 32px #bab9b9);animation:floatY 3.5s ease-in-out infinite;">
            </div>
         </div>
         <div class="col-lg-6 animate__animated animate__fadeInRight">
            <div class="appointment-3d-card position-relative mx-auto" style="max-width:440px;">
               <div class="glassmorphism-card p-4 shadow-lg rounded-4" style="backdrop-filter:blur(12px);background:rgba(255,255,255,0.75);box-shadow:0 8px 32px #d63b3b33,0 1.5px 8px #1c430733;transform:perspective(900px) rotateY(-8deg) scale(1.03);transition:transform 0.4s cubic-bezier(.4,2,.6,1);">
                  <h4 class="mb-3 text-center" style="font-weight:800;color:#1c4307;letter-spacing:0.5px;">Get personalized Unani & Herbal treatment from our experienced doctors.<br><span style="color:#d63b3b;font-size:1.1rem;font-weight:700;">Your health and well-being are our top priority!</span></h4>
                  <form method="post" action="" autocomplete="off">
                     <div class="mb-3">
                        <input type="text" class="form-control form-control-lg" name="name" placeholder="Your name*" required style="border-radius:1.5em;box-shadow:0 1px 6px #d63b3b11;">
                     </div>
                     <div class="mb-3">
                        <input type="tel" class="form-control form-control-lg" name="phone" placeholder="Your Phone*" required pattern="[0-9]{10,15}" style="border-radius:1.5em;box-shadow:0 1px 6px #1c430711;">
                     </div>
                     <div class="mb-3">
                        <input type="text" class="form-control form-control-lg" name="address" placeholder="Your Address*" required style="border-radius:1.5em;box-shadow:0 1px 6px #d63b3b11;">
                     </div>
                     <div class="mb-3">
                        <input type="date" class="form-control form-control-lg" name="date" placeholder="Preferred Date" style="border-radius:1.5em;box-shadow:0 1px 6px #1c430711;">
                     </div>
                     <div class="mb-3">
                        <input type="text" class="form-control form-control-lg" name="treatment" placeholder="Treatment (Optional)" style="border-radius:1.5em;box-shadow:0 1px 6px #d63b3b11;">
                     </div>
                     <button type="submit" class="btn btn-danger w-100 py-2" style="font-weight:800;font-size:1.2rem;border-radius:2em;box-shadow:0 4px 16px #d63b3b33;transition:background 0.2s;">Book Now</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <style>
      .book-appointment-section-creative {
         position:relative;
         min-height:600px;
      }
      .appointment-3d-card:hover .glassmorphism-card {
         transform:perspective(900px) rotateY(0deg) scale(1.07);
         box-shadow:0 16px 48px #d63b3b44,0 2px 12px #1c430744;
      }
      .glassmorphism-card {
         border:1.5px solid #e6f2e6;
         background:rgba(255,255,255,0.85);
         box-shadow:0 8px 32px #d63b3b22,0 1.5px 8px #1c430722;
         transition:transform 0.4s cubic-bezier(.4,2,.6,1),box-shadow 0.3s;
      }
      .floating-icons {
         position:absolute;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:0;
      }
      .floating-icon {
         position:absolute;
         width:72px;
         height:72px;
         font-size:72px;
         opacity:0.22;
         animation:floatIcon 7s infinite alternate;
         color:#1c4307;
         transition:color 0.3s;
      }
      .floating-icon-1 {
         left:8%;top:18%;animation-delay:0s;
         color:#1c4307;
      }
      .floating-icon-2 {
         right:10%;top:8%;animation-delay:1.2s;
         color:#d63b3b;
      }
      .floating-icon-3 {
         left:12%;bottom:10%;animation-delay:2.1s;
         color:#1c4307;
      }
      .floating-icon-4 {
         right:7%;bottom:16%;animation-delay:3.3s;
         color:#d63b3b;
      }
      @keyframes floatIcon {
         0% {transform:translateY(0) scale(1);}
         50% {transform:translateY(-18px) scale(1.08);}
         100% {transform:translateY(0) scale(1);}
      }
      @keyframes floatY {
         0% {transform:translateY(0);}
         50% {transform:translateY(-18px);}
         100% {transform:translateY(0);}
      }
      .badge-creative {
         font-family:'Montserrat',sans-serif;
         font-size:1.1rem;
         letter-spacing:1px;
         box-shadow:0 2px 12px #d63b3b33;
      }
      @media (max-width:991px) {
         .book-appointment-section-creative .col-lg-6 {margin-bottom:2.5rem!important;}
         .appointment-3d-card {max-width:100%!important;}
      }
      @media (max-width:767px) {
         .book-appointment-section-creative {padding:2.5rem 0;}
         .glassmorphism-card {padding:1.5rem!important;}
         .floating-icon {width:32px;height:32px;}
      }
   </style>
</section>


<?php include 'includes/footer.php'; ?>


