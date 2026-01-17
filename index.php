<?php require_once 'admin/includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<!-- ======= Unique Modern Hero Section ======= -->
<section class="modern-hero-section">
   <div class="modern-hero-bg">
      <div class="modern-hero-shape shape1"></div>
      <div class="modern-hero-shape shape2"></div>
      <div class="modern-hero-shape shape3"></div>
   </div>
   <div class="modern-hero-content">
      <div class="modern-hero-left">
         <h1 class="modern-hero-title">Your Health, <span class="modern-hero-highlight">Our Priority</span></h1>
         <p class="modern-hero-tagline">Experience the best in Unani & Herbal care at <b>Fidai Unani Shifa Khana</b></p>
         <ul class="modern-hero-features">
            <li><i class="bi bi-check-circle-fill text-success"></i> Personalized Unani Treatments</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Experienced & Caring Doctors</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Holistic Healing Approach</li>
            <li><i class="bi bi-check-circle-fill text-success"></i> Modern Facilities & Patient-Centered Care</li>
         </ul>
         <a href="/appointment/index.php" class="btn btn-danger btn-lg modern-hero-btn mt-2">Book Appointment</a>
      </div>
      <div class="modern-hero-right">
         <img src="assets/images/about/4.png" alt="Doctor" class="modern-hero-img" />
      </div>
   </div>
</section>
<!-- End Unique Modern Hero Section -->

<!-- ======= Achievements/Stats Bar Section ======= -->
<section class="stats-bar-section">
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
<section class="categories-carousel-section py-5">
   <div class="container">
      <h2 class="text-center mb-4" style="font-weight:800;color:#1c4307;">Our Specialties</h2>
      <div class="categories-carousel-wrapper">
         <button class="carousel-arrow left" aria-label="Previous"><i class="bi bi-chevron-left"></i></button>
         <div class="categories-carousel">
            <?php
               // Fetch categories from DB
               $categories = mysqli_query($conn, "SELECT name, image FROM categories ORDER BY id DESC LIMIT 10");
               if(mysqli_num_rows($categories) > 0):
               	while($cat = mysqli_fetch_assoc($categories)):
               ?>
            <div class="category-card">
               <div class="category-img-wrap">
                  <img src="assets/images/categories/<?php echo htmlspecialchars($cat['image']); ?>" alt="<?php echo htmlspecialchars($cat['name']); ?>" />
               </div>
               <div class="category-title"><?php echo htmlspecialchars($cat['name']); ?></div>
            </div>
            <?php endwhile; endif; ?>
         </div>
         <button class="carousel-arrow right" aria-label="Next"><i class="bi bi-chevron-right"></i></button>
      </div>
   </div>
</section>
<!-- End Categories Carousel Section -->

<!-- ======= Featured Treatments Section ======= -->
<section class="featured-treatments-section py-5 bg-light">
   <div class="container">
      <h2 class="text-center mb-4" style="font-weight:800;color:#1c4307;">Featured Treatments</h2>
         <p class="text-center mb-4" style="color:#555;max-width:600px;margin:0 auto 18px auto;font-size:1.08rem;">Discover our most popular and effective Unani treatments, carefully selected to address a wide range of health concerns with proven results.</p>
      <div class="featured-treatments-carousel owl-carousel">
         <?php
            $treatments = mysqli_query($conn, "SELECT t.*, c.name as category_name FROM treatments t LEFT JOIN categories c ON FIND_IN_SET(c.id, t.related_treatments) > 0 WHERE t.status='active' ORDER BY t.created_at DESC LIMIT 6");
            if(mysqli_num_rows($treatments) > 0):
            	while($treat = mysqli_fetch_assoc($treatments)):
            ?>
         <div class="item">
            <div class="card h-100 shadow-sm border-0">
               <?php if(!empty($treat['feature_image'])): ?>
               <img src="assets/images/treatments/<?php echo htmlspecialchars($treat['feature_image']); ?>" alt="<?php echo htmlspecialchars($treat['title']); ?>" style="width:100%;height:180px;object-fit:cover;border-radius:12px 12px 0 0;">
               <?php else: ?>
               <div style="width:100%;height:180px;background:#bab9b9;border-radius:12px 12px 0 0;display:flex;align-items:center;justify-content:center;">
                  <i class="bi bi-image" style="font-size:2.5rem;color:#fff;"></i>
               </div>
               <?php endif; ?>
               <div class="card-body text-center">
                  <h5 class="card-title mb-1" style="color:#1c4307;font-weight:700;">
                     <?php echo htmlspecialchars($treat['title']); ?>
                  </h5>
                  <div class="mb-2 text-muted" style="font-size:0.98rem;">
                     <i class="bi bi-folder"></i> <?php echo htmlspecialchars($treat['category_name']); ?>
                  </div>
                  <a href="#" class="btn btn-outline-success btn-sm mt-2">Learn More</a>
               </div>
            </div>
         </div>
         <?php endwhile; endif; ?>
      </div>
   </div>
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
            <img src="assets/images/about/1.jpeg" alt="Our Story" style="width:100%;height:320px;max-width:100%;border-radius:18px;box-shadow:0 8px 32px #bab9b9;object-fit:cover;">
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
<section class="testimonial-section py-5 bg-light">
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
<section class="faq-section py-5">
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


