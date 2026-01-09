<?php include 'includes/header.php';?>

    <!-- ============================
        Slider
    ============================== -->
    <section class="slider">
      <div class="slick-carousel m-slides-0"
        data-slick='{"slidesToShow": 1, "arrows": true, "dots": false, "speed": 700, "fade": true, "cssEase": "linear", "autoplay": true, "autoplaySpeed": 3000}'>
        <div class="slide-item align-v-h">
          <div class="bg-img"><img src="assets/images/sliders/1.png" alt="slide img"></div>
        </div><!-- /.slide-item -->
        <div class="slide-item align-v-h">
          <div class="bg-img"><img src="assets/images/sliders/2.png" alt="slide img"></div>
        </div><!-- /.slide-item -->
        <div class="slide-item align-v-h">
          <div class="bg-img"><img src="assets/images/sliders/3.png" alt="slide img 3"></div>
        </div><!-- /.slide-item -->
        <div class="slide-item align-v-h">
          <div class="bg-img"><img src="assets/images/sliders/4.png" alt="slide img 4"></div>
        </div><!-- /.slide-item -->
      </div><!-- /.carousel -->
    </section><!-- /.slider -->

    <!-- ============================
        contact info (commented out)
    ============================== -->
    <!--
    <section class="contact-info py-0">
      ...existing code...
    </section>
    -->

    <!-- ============================
        Categories Carousel Inline
    ============================== -->
    <section class="categories-carousel py-4 mt-4">
      <div class="container-fluid">
        <div class="slick-carousel"
          data-slick='{"slidesToShow": 5, "slidesToScroll": 1, "autoplay": true, "autoplaySpeed": 2500, "arrows": true, "dots": false, "responsive": [ {"breakpoint": 1200, "settings": {"slidesToShow": 4}}, {"breakpoint": 992, "settings": {"slidesToShow": 3}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 3}}]}'>
          <div class="category-item text-center px-2">
            <div class="category-img-circle">
              <img src="assets/images/services/1.jfif" alt="Cancer" class="category-img-inner">
            </div>
            <div class="mt-2 fw-bold">Cancer Treatment</div>
          </div>
          <div class="category-item text-center px-2">
            <div class="category-img-circle">
              <img src="assets/images/services/2.jfif" alt="Liver" class="category-img-inner">
            </div>
            <div class="mt-2 fw-bold">Liver Disease</div>
          </div>
          <div class="category-item text-center px-2">
            <div class="category-img-circle">
              <img src="assets/images/services/3.jfif" alt="Kidney" class="category-img-inner">
            </div>
            <div class="mt-2 fw-bold">Kidney Disease</div>
          </div>
          <div class="category-item text-center px-2">
            <div class="category-img-circle">
              <img src="assets/images/services/4.jfif" alt="Heart & Blood" class="category-img-inner">
            </div>
            <div class="mt-2 fw-bold">Heart & Blood Disorders</div>
          </div>
          <div class="category-item text-center px-2">
            <div class="category-img-circle">
              <img src="assets/images/services/5.jfif" alt="Gastro" class="category-img-inner">
            </div>
            <div class="mt-2 fw-bold">Gastro & Digestive</div>
          </div>
          <div class="category-item text-center px-2">
            <div class="category-img-circle">
              <img src="assets/images/services/6.jfif" alt="Piles" class="category-img-inner">
            </div>
            <div class="mt-2 fw-bold">Piles (Bawasir)</div>
          </div>
          <!-- Add more categories as needed -->
        </div>
      </div>
      <style>
        .category-img-circle {
          width: 100px;
          height: 100px;
          margin: auto;
          border-radius: 50%;
          overflow: hidden;
          border: 3px solid #eee;
          display: flex;
          align-items: center;
          justify-content: center;
          background: #fff;
        }
        .category-img-inner {
          width: 80px;
          height: 80px;
          object-fit: cover;
          border-radius: 50%;
        }
        @media (max-width: 767px) {
          .category-img-circle {
            width: 70px;
            height: 70px;
          }
          .category-img-inner {
            width: 55px;
            height: 55px;
          }
          .categories-carousel .slick-prev,
          .categories-carousel .slick-next {
            display: none !important;
          }
        }
      </style>
        </div>
      </div>
    </section>

    <!-- ========================
      About Layout 2
    =========================== -->
    <section class="about-layout2 pb-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-7 offset-lg-1">
            <div class="heading-layout2">
              <h3 class="heading__title mb-60">Our Philosophy</h3>
            </div><!-- /heading -->
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-5">
            <div class="text-with-icon">
              <div class="text__icon">
                <i class="icon-doctor"></i>
              </div>
              <div class="text__content">
                <p class="heading__desc font-weight-bold color-secondary mb-30">Fidai Unani Shifa Khana में हम प्राकृतिक यूनानी चिकित्सा पद्धति के द्वारा जड़ से बीमारी का इलाज करते हैं। बिना साइड इफेक्ट, बिना सर्जरी और बिना स्टेरॉयड।
                </p>
                <!-- <a href="doctors-timetable.php" class="btn btn__secondary btn__rounded mb-70">
                  <span>Find A Doctor</span> <i class="icon-arrow-right"></i>
                </a> -->
              </div>
            </div>
            <div class="video-banner-layout2 bg-overlay">
              <img src="assets/images/about/6.jpeg" alt="about" class="w-100">
              <a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                <div class="video__player">
                  <i class="fa fa-play"></i>
                </div>
                <span class="video__btn-title color-white">Watch Our Video!</span>
              </a>
            </div><!-- /.video-banner -->
          </div><!-- /.col-lg-6 -->
          <div class="col-sm-12 col-md-12 col-lg-7">
            <div class="about__text bg-white">
              <p class="heading__desc mb-30">Our goal is to deliver quality of care in a courteous, respectful, and
                compassionate
                manner. We hope you will allow us to care for you and to be the first and best choice for healthcare.
              </p>
              <p class="heading__desc mb-30">We will work with you to develop individualised care plans, including
                management of
                chronic diseases. We are committed to being the region’s premier healthcare network providing patient
                centered care that inspires clinical and service excellence.</p>
              <ul class="list-items list-unstyled">
                <li>We conduct a range of tests to help us work out why you're not feeling well and determine the
                  right
                  treatment for you.</li>
                <li>Our expert doctors, nurses and allied health professionals manage patients with a broad range of
                  medical issues.
                </li>
                <li>We offer a wide range of care and support to our patients, from diagnosis to treatment and
                  rehabilitation.
                </li>
              </ul>
            </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.About Layout 2 -->

    <!-- ========================
        Services Layout 1
    =========================== -->
    <section class="services-layout1 services-carousel mt-4">
      <div class="bg-img"><img src="assets/images/backgrounds/2.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <div class="heading text-center mb-60">
              <h2 class="heading__subtitle">Natural & Effective Unani Treatment for Chronic Diseases</h2>
              <h3 class="heading__title mb-60">Our Services</h3>
            </div><!-- /.heading -->
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="slick-carousel"
              data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
              <!-- Unani Services Cards -->
                <div class="service-item service-card">
                  <div class="service-img">
                    <img src="assets/images/services/1.jfif" alt="Cancer Treatment" />
                  </div>
                  <div class="service__content">
                    <h4 class="service__title">CANCER TREATMENT</h4>
                    <p class="service__desc">यूनानी चिकित्सा के माध्यम से कैंसर के लक्षणों को कम करना, इम्युनिटी बढ़ाना और जीवन की गुणवत्ता सुधारना।</p>
                    <a href="services-details.php?treatment=cancer" class="btn btn__secondary btn__outlined btn__rounded"><span>Read More</span><i class="icon-arrow-right"></i></a>
                  </div>
                </div>
                <div class="service-item service-card">
                  <div class="service-img">
                    <img src="assets/images/services/2.jfif" alt="Liver Disease Treatment" />
                  </div>
                  <div class="service__content">
                    <h4 class="service__title">LIVER DISEASE TREATMENT</h4>
                    <p class="service__desc">लीवर से जुड़ी सभी गंभीर बीमारियों का सुरक्षित यूनानी इलाज।</p>
                    <a href="services-details.php?treatment=liver" class="btn btn__secondary btn__outlined btn__rounded"><span>Read More</span><i class="icon-arrow-right"></i></a>
                  </div>
                </div>
                <div class="service-item service-card">
                  <div class="service-img">
                    <img src="assets/images/services/3.jfif" alt="Kidney Disease Treatment" />
                  </div>
                  <div class="service__content">
                    <h4 class="service__title">KIDNEY DISEASE TREATMENT</h4>
                    <p class="service__desc">डायलिसिस से बचाव और किडनी फंक्शन सुधार के लिए यूनानी इलाज।</p>
                    <a href="services-details.php?treatment=kidney" class="btn btn__secondary btn__outlined btn__rounded"><span>Read More</span><i class="icon-arrow-right"></i></a>
                  </div>
                </div>
                <div class="service-item service-card">
                  <div class="service-img">
                    <img src="assets/images/services/4.jfif" alt="Heart & Blood Disorders" />
                  </div>
                  <div class="service__content">
                    <h4 class="service__title">HEART & BLOOD DISORDERS</h4>
                    <p class="service__desc">दिल और ब्लड प्रेशर की समस्या का स्थायी समाधान।</p>
                    <a href="services-details.php?treatment=heart-blood" class="btn btn__secondary btn__outlined btn__rounded"><span>Read More</span><i class="icon-arrow-right"></i></a>
                  </div>
                </div>
                <div class="service-item service-card">
                  <div class="service-img">
                    <img src="assets/images/services/5.jfif" alt="Gastro & Digestive Diseases" />
                  </div>
                  <div class="service__content">
                    <h4 class="service__title">GASTRO & DIGESTIVE DISEASES</h4>
                    <p class="service__desc">पाचन तंत्र से जुड़ी सभी बीमारियों का प्राकृतिक इलाज।</p>
                    <a href="services-details.php?treatment=gastro-digestive" class="btn btn__secondary btn__outlined btn__rounded"><span>Read More</span><i class="icon-arrow-right"></i></a>
                  </div>
                </div>
                <div class="service-item service-card">
                  <div class="service-img">
                    <img src="assets/images/services/6.jfif" alt="Piles Treatment" />
                  </div>
                  <div class="service__content">
                    <h4 class="service__title">PILES (Bawasir) Treatment</h4>
                    <p class="service__desc">बिना ऑपरेशन बवासीर का यूनानी इलाज।</p>
                    <a href="services-details.php?treatment=piles" class="btn btn__secondary btn__outlined btn__rounded"><span>Read More</span><i class="icon-arrow-right"></i></a>
                  </div>
                </div>
                <div class="service-item service-card">
                  <div class="service-img">
                    <img src="assets/images/services/7.jfif" alt="Sexual & Infertility Treatment" />
                  </div>
                  <div class="service__content">
                    <h4 class="service__title">SEXUAL TREATMENT</h4>
                    <p class="service__desc">गुप्त रोग और बांझपन का सुरक्षित यूनानी समाधान।</p>
                    <a href="services-details.php?treatment=sexual" class="btn btn__secondary btn__outlined btn__rounded"><span>Read More</span><i class="icon-arrow-right"></i></a>
                  </div>
                </div>
                <div class="service-item service-card">
                  <div class="service-img">
                    <img src="assets/images/services/8.jfif" alt="Allergy & Asthma" />
                  </div>
                  <div class="service__content">
                    <h4 class="service__title">ALLERGY & ASTHMA</h4>
                    <p class="service__desc">दमा और एलर्जी का स्थायी यूनानी इलाज।</p>
                    <a href="services-details.php?treatment=allergy-asthma" class="btn btn__secondary btn__outlined btn__rounded"><span>Read More</span><i class="icon-arrow-right"></i></a>
                  </div>
                </div>
            </div>
          </div><!-- /.col-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Services Layout 1 -->

    <!-- ========================
        Notses
    =========================== -->
    <section class="notes border-top pt-60 pb-60">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="note font-weight-bold">
              <i class="far fa-file-alt color-primary"></i>
              <span>Dedicated to Healing the Most Critical Health Conditions Naturally</span>
              <a href="doctors-timetable.php" class="btn btn__link btn__secondary">
                <span class="mt-2">View Doctors’ Timetable</span><i class="icon-arrow-right"></i>
              </a>
            </div>
          </div><!-- /.col-sm-6 -->
          <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="info__meta d-flex flex-wrap justify-content-between align-items-center">
              <div class="testimonials__rating">
                <div class="testimonials__rating-inner d-flex align-items-center">
                  <span class="total__rate">4.9</span>
                  <div>
                    <span class="overall__rate">Zocdoc Overall Rating</span>
                    <span>, based on 7541 reviews.</span>
                  </div>
                </div><!-- /.testimonials__rating-inner -->
              </div><!-- /.testimonials__rating -->
              <a href="appointment.php" class="btn btn__primary btn__rounded">
                <span>Make Appointment</span> <i class="icon-arrow-right"></i>
              </a>
            </div><!-- /.info__meta -->
          </div><!-- /.col-sm-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.notes -->

    <!-- ======================
    Features Layout 2
    ========================= -->
    <section class="features-layout2 pt-130 bg-overlay bg-overlay-secondary">
      <div class="bg-img">
        <img src="assets/images/backgrounds/3.jpg" alt="background">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-1">
            <div class="heading__layout2 mb-50">
              <h3 class="heading__title color-white">
                Providing Hope, Healing & Care for Chronic Patients
              </h3>
            </div>
          </div>
        </div>

        <div class="row mb-100">
          <div class="col-sm-3 col-md-3 col-lg-1 offset-lg-5">
            <div class="heading__icon">
              <i class="icon-insurance"></i>
            </div>
          </div>
          <div class="col-sm-9 col-md-9 col-lg-6">
            <p class="heading__desc font-weight-bold color-white mb-30">
              Fid​ai Unani Shifa Khana is dedicated to treating chronic and life-threatening
              diseases through authentic Unani medicine. We focus on natural healing,
              strengthening immunity, and addressing the root cause of illness. Our
              patient-centric approach ensures compassionate care for cancer, liver,
              kidney, gastro, heart, and other chronic conditions with safe and effective
              herbal treatments.
            </p>
            <a href="#" class="btn btn__white btn__link">
              <i class="icon-arrow-right icon-filled"></i>
              <span>Our Healing Approach</span>
            </a>
          </div>
        </div>

        <div class="row">
          <!-- Feature item #1 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/1.jfif" alt="service" loading="lazy">
              </div>
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-heart"></i>
                </div>
                <h4 class="feature__title">Personalized Unani Consultation</h4>
              </div>
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div>
          </div>

          <!-- Feature item #2 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/2.jfif" alt="service" loading="lazy">
              </div>
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-doctor"></i>
                </div>
                <h4 class="feature__title">Trusted Unani Treatment</h4>
              </div>
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div>
          </div>

          <!-- Feature item #3 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/3.jfif" alt="service" loading="lazy">
              </div>
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-ambulance"></i>
                </div>
                <h4 class="feature__title">Support for Critical Conditions</h4>
              </div>
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div>
          </div>

          <!-- Feature item #4 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/4.jfif" alt="service" loading="lazy">
              </div>
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-drugs"></i>
                </div>
                <h4 class="feature__title">Pure Herbal Medicines</h4>
              </div>
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div>
          </div>

          <!-- Feature item #5 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/5.jfif" alt="service" loading="lazy">
              </div>
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-first-aid-kit"></i>
                </div>
                <h4 class="feature__title">Experienced Unani Physicians</h4>
              </div>
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div>
          </div>

          <!-- Feature item #6 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/6.jfif" alt="service" loading="lazy">
              </div>
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-hospital"></i>
                </div>
                <h4 class="feature__title">Safe & Natural Healing Facility</h4>
              </div>
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div>
          </div>

          <!-- Feature item #7 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/9.jfif" alt="service" loading="lazy">
              </div>
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-expenses"></i>
                </div>
                <h4 class="feature__title">Affordable Treatment for All</h4>
              </div>
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div>
          </div>

          <!-- Feature item #8 -->
          <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="feature-item">
              <div class="feature__img">
                <img src="assets/images/services/10.webp" alt="service" loading="lazy">
              </div>
              <div class="feature__content">
                <div class="feature__icon">
                  <i class="icon-bandage"></i>
                </div>
                <h4 class="feature__title">Quality Care for Every Patient</h4>
              </div>
              <a href="#" class="btn__link">
                <i class="icon-arrow-right icon-outlined"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 col-lg-6 offset-lg-3 text-center">
            <p class="font-weight-bold color-gray mb-0">
              At Fid​ai Unani Shifa Khana, we are committed to natural healing and long-term wellness.
              <a href="#" class="color-primary">
                <span>Contact Us for Consultation</span> <i class="icon-arrow-right"></i>
              </a>
            </p>
          </div>
        </div>
      </div>
    </section>


   <!-- ======================
     Doctor
    ========================= -->
    <section class="team-layout2 pb-80">
      <div class="container">
        <div class="row align-items-center">
          
          <!-- Doctor Image -->
          <div class="col-sm-12 col-md-6 col-lg-5">
            <div class="member__img text-center">
              <img src="assets/images/about/5.jpeg" alt="Hakeem Shan-e-Alam" class="img-fluid rounded">
            </div>
          </div>

          <!-- Doctor Content -->
          <div class="col-sm-12 col-md-6 col-lg-7">
            <div class="member__info pl-lg-40">
              <h3 class="member__name mb-10">Hakeem Shan-e-Alam</h3>
              <p class="member__job text-secondary font-weight-bold mb-20">
                Chief Unani Physician & Founder
              </p>

              <p class="member__desc mb-20">
                Hakeem Shan-e-Alam is a highly experienced Unani physician dedicated to the
                treatment of chronic and critical diseases through authentic Unani medicine.
                With years of clinical experience, he focuses on treating the root cause of
                illness rather than just managing symptoms.
              </p>

              <p class="member__desc mb-30">
                He specializes in Unani treatment for cancer supportive care, liver diseases
                (CLD, cirrhosis, hepatitis), kidney disorders, gastro problems, heart diseases,
                sexual health issues, and lifestyle disorders. His compassionate approach and
                natural healing methods have helped improve the lives of countless patients.
              </p>

              <div class="d-flex flex-wrap align-items-center">
                <a href="contact-us.php" class="btn btn__secondary btn__rounded mr-20">
                  <span>Book Consultation</span>
                  <i class="icon-arrow-right"></i>
                </a>

                <ul class="social-icons list-unstyled mb-0">
                  <li>
                    <a href="tel:+91XXXXXXXXXX" class="phone">
                      <i class="fas fa-phone-alt"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="facebook">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="whatsapp">
                      <i class="fab fa-whatsapp"></i>
                    </a>
                  </li>
                </ul>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>


    <!-- ======================
     Work Process 
    ========================= -->
    <section class="work-process work-process-carousel pt-130 pb-0 bg-overlay bg-overlay-secondary">
      <div class="bg-img">
        <img src="assets/images/banners/1.jpg" alt="background">
      </div>

      <div class="container">
        <div class="row heading-layout2">
          <div class="col-12">
            <h2 class="heading__subtitle color-primary">
              Natural Healing for You and Your Family
            </h2>
          </div>

          <div class="col-sm-12 col-md-12 col-lg-6 col-xl-5">
            <h3 class="heading__title color-white">
              Authentic Unani Care for Chronic & Lifestyle Diseases
            </h3>
          </div>

          <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 offset-xl-1">
            <p class="heading__desc font-weight-bold color-gray mb-40">
              At Fidai Unani Shifa Khana, we provide personalized Unani treatment plans
              focused on treating the root cause of disease. Our approach emphasizes
              natural healing, immunity strengthening, and long-term wellness for
              chronic conditions such as cancer support, liver, kidney, gastro,
              heart, and lifestyle disorders. All consultations are handled with
              care, privacy, and complete confidentiality.
            </p>

            <ul class="list-items list-items-layout2 list-items-light list-horizontal list-unstyled">
              <li>Chronic Disease Management</li>
              <li>Unani Diagnosis & Consultation</li>
              <li>Herbal & Natural Medicines</li>
              <li>Root Cause Based Treatment</li>
              <li>Safe & Side-Effect Free Care</li>
            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="carousel-container mt-90">
              <div class="slick-carousel"
                data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "infinite":false, "arrows": false, "dots": false, "responsive": [{"breakpoint": 1200, "settings": {"slidesToShow": 3}}, {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>

                <!-- process item #1 -->
                <div class="process-item">
                  <span class="process__number">01</span>
                  <div class="process__icon">
                    <i class="icon-health-report"></i>
                  </div>
                  <h4 class="process__title">Patient Consultation & Case Review</h4>
                  <p class="process__desc">
                    Detailed understanding of symptoms, medical history, and lifestyle
                    to identify the root cause of illness.
                  </p>
                  <a href="#" class="btn btn__secondary btn__link">
                    <span>Book Consultation</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div>

                <!-- process item #2 -->
                <div class="process-item">
                  <span class="process__number">02</span>
                  <div class="process__icon">
                    <i class="icon-dna"></i>
                  </div>
                  <h4 class="process__title">Unani Diagnosis (Mizaj Analysis)</h4>
                  <p class="process__desc">
                    Assessment based on Unani principles including temperament (Mizaj),
                    pulse, and body balance.
                  </p>
                  <a href="#" class="btn btn__secondary btn__link">
                    <span>Our Method</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div>

                <!-- process item #3 -->
                <div class="process-item">
                  <span class="process__number">03</span>
                  <div class="process__icon">
                    <i class="icon-medicine"></i>
                  </div>
                  <h4 class="process__title">Customized Herbal Treatment Plan</h4>
                  <p class="process__desc">
                    Preparation of personalized Unani medicines using pure herbal
                    formulations.
                  </p>
                  <a href="#" class="btn btn__secondary btn__link">
                    <span>Explore Treatment</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div>

                <!-- process item #4 -->
                <div class="process-item">
                  <span class="process__number">04</span>
                  <div class="process__icon">
                    <i class="icon-stethoscope"></i>
                  </div>
                  <h4 class="process__title">Continuous Monitoring & Guidance</h4>
                  <p class="process__desc">
                    Regular follow-ups to monitor progress and adjust treatment
                    for optimal recovery.
                  </p>
                  <a href="#" class="btn btn__secondary btn__link">
                    <span>Patient Care</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div>

                <!-- process item #5 -->
                <div class="process-item">
                  <span class="process__number">05</span>
                  <div class="process__icon">
                    <i class="icon-head"></i>
                  </div>
                  <h4 class="process__title">Long-Term Wellness & Prevention</h4>
                  <p class="process__desc">
                    Focus on strengthening immunity, preventing recurrence, and
                    maintaining a healthy lifestyle.
                  </p>
                  <a href="#" class="btn btn__secondary btn__link">
                    <span>Wellness Care</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- CTA -->
      <div class="cta bg-light-blue">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-sm-12 col-md-2 col-lg-2">
              <img src="assets/images/icons/alert2.png" class="cta__img" alt="alert">
            </div>
            <div class="col-sm-12 col-md-7 col-lg-7">
              <h4 class="cta__title">Natural & Trusted Unani Healthcare</h4>
              <p class="cta__desc">
                We are committed to improving quality of life through safe, natural,
                and effective Unani medicine while caring for patients with compassion
                and integrity.
              </p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
              <a href="appointment.php" class="btn btn__primary btn__secondary-style2 btn__rounded">
                <span>Book Appointment</span>
                <i class="icon-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- ========================= 
      Testimonials layout 2
      =========================  -->
    <section class="testimonials-layout2 pt-130 pb-40">
      <div class="container">
        <div class="testimonials-wrapper">
          <div class="heading-layout2">
            <h6>- Testimonial -</h6>
            <h3 class="heading__title">Inspiring Healing Stories</h3>
          </div>
          <div class="container">
            <div class="slider-with-navs">

                <!-- Testimonial #1 -->
                <div class="testimonial-item">
                  <h3 class="testimonial__title">
                    “I was suffering from chronic liver disease for years and had almost
                    lost hope. Under the guidance of Hakeem Shan-e-Alam, my condition
                    improved naturally. The Unani treatment strengthened my body and
                    gave me a new life without harmful side effects.”
                  </h3>
                </div>

                <!-- Testimonial #2 -->
                <div class="testimonial-item">
                  <h3 class="testimonial__title">
                    “My father was facing kidney complications and doctors suggested
                    lifelong medication. Fidai Unani Shifa Khana provided a natural
                    treatment plan that helped stabilize his condition and improved
                    his overall health. We are truly grateful.”
                  </h3>
                </div>

                <!-- Testimonial #3 -->
                <div class="testimonial-item">
                  <h3 class="testimonial__title">
                    “I consulted for severe gastric issues and ulcerative colitis.
                    The treatment was personalized and focused on the root cause.
                    Today I live pain-free and healthier, thanks to the Unani care
                    and guidance provided here.”
                  </h3>
                </div>

              </div>

              <div class="slider-nav mb-60">

                <div class="testimonial__meta">
                  <div class="testimonial__thmb">
                    <img src="assets/images/testimonials/thumbs/1.png" alt="patient thumb">
                  </div>
                  <div>
                    <h4 class="testimonial__meta-title">Abdul Rahman</h4>
                    <p class="testimonial__meta-desc">Liver Patient</p>
                  </div>
                </div>

                <div class="testimonial__meta">
                  <div class="testimonial__thmb">
                    <img src="assets/images/testimonials/thumbs/2.png" alt="patient thumb">
                  </div>
                  <div>
                    <h4 class="testimonial__meta-title">Mohd. Irfan</h4>
                    <p class="testimonial__meta-desc">Kidney Care Patient</p>
                  </div>
                </div>

                <div class="testimonial__meta">
                  <div class="testimonial__thmb">
                    <img src="assets/images/testimonials/thumbs/3.png" alt="patient thumb">
                  </div>
                  <div>
                    <h4 class="testimonial__meta-title">Sana Khan</h4>
                    <p class="testimonial__meta-desc">Gastro Patient</p>
                  </div>
                </div>

              </div>
          </div>
              
        </div>
      </div>
    </section>


    <!-- ========================
       gallery
      =========================== -->
    <!-- <section class="gallery pt-0 pb-90">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="slick-carousel"
              data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "autoplay": true, "arrows": true, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
              <a class="popup-gallery-item" href="assets/images/gallery/1.jpeg">
                <img src="assets/images/gallery/1.jpeg" alt="gallery img">
              </a>
              <a class="popup-gallery-item" href="assets/images/gallery/2.jpeg">
                <img src="assets/images/gallery/2.jpeg" alt="gallery img">
              </a>
              <a class="popup-gallery-item" href="assets/images/gallery/3.jpeg">
                <img src="assets/images/gallery/3.jpeg" alt="gallery img">
              </a>
              <a class="popup-gallery-item" href="assets/images/gallery/4.jpeg">
                <img src="assets/images/gallery/4.jpeg" alt="gallery img">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- /.gallery 2 -->

    <!-- ==========================
        contact layout 3
    =========================== -->
  <section class="contact-layout3 bg-overlay bg-overlay-primary-gradient pb-60">
    <div class="bg-img">
      <img src="assets/images/banners/3.jpg" alt="banner">
    </div>

    <div class="container">
      <div class="row">

        <!-- Appointment Form -->
        <div class="col-sm-12 col-md-12 col-lg-7">
          <div class="contact-panel mb-50">
            <form class="contact-panel__form" method="post" action="assets/php/contact.php" id="contactForm">
              <div class="row">

                <div class="col-sm-12">
                  <h4 class="contact-panel__title">Book an Appointment</h4>
                  <p class="contact-panel__desc mb-30">
                    Get personalized Unani consultation for chronic and lifestyle diseases.
                    Our team will contact you shortly to confirm your appointment.
                  </p>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <i class="icon-widget form-group-icon"></i>
                    <select class="form-control">
                      <option value="0">Select Treatment Category</option>
                      <option value="Cancer Care">Cancer Support Care</option>
                      <option value="Liver">Liver Disease</option>
                      <option value="Kidney">Kidney Disease</option>
                      <option value="Gastro">Gastro & Digestive</option>
                      <option value="Other">Other Chronic Issues</option>
                    </select>
                  </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <i class="icon-user form-group-icon"></i>
                    <select class="form-control">
                      <option value="0">Choose Doctor</option>
                      <option value="Hakeem Shan-e-Alam">Hakeem Shan-e-Alam</option>
                    </select>
                  </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <i class="icon-news form-group-icon"></i>
                    <input type="text" class="form-control" placeholder="Full Name"
                      id="contact-name" name="contact-name" required>
                  </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group">
                    <i class="icon-phone form-group-icon"></i>
                    <input type="text" class="form-control" placeholder="Phone Number"
                      id="contact-phone" name="contact-phone" required>
                  </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group form-group-date">
                    <i class="icon-calendar form-group-icon"></i>
                    <input type="date" class="form-control"
                      id="contact-date" name="contact-date" required>
                  </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-6">
                  <div class="form-group form-group-date">
                    <i class="icon-clock form-group-icon"></i>
                    <input type="time" class="form-control"
                      id="contact-time" name="contact-time" required>
                  </div>
                </div>

                <div class="col-12">
                  <button type="submit"
                    class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                    <span>Confirm Appointment</span>
                    <i class="icon-arrow-right"></i>
                  </button>
                  <div class="contact-result"></div>
                </div>

              </div>
            </form>
          </div>
        </div>

        <!-- Right Content -->
        <div class="col-sm-12 col-md-12 col-lg-5">
          <div class="heading heading-light mb-30">
            <h3 class="heading__title mb-30">
              Trusted Unani Healing for Chronic Diseases
            </h3>
            <p class="heading__desc">
              Fidai Unani Shifa Khana is dedicated to providing natural, safe and
              effective Unani treatment for chronic and critical health conditions.
              We focus on root-cause healing with compassion and care.
            </p>
          </div>

          <div class="d-flex align-items-center mb-30">
            <a href="contact-us.php" class="btn btn__white btn__rounded mr-30">
              <i class="fas fa-phone-alt"></i>
              <span>Call for Enquiry</span>
            </a>
            <a class="video__btn video__btn-white popup-video"
              href="https://www.youtube.com/watch?v=nrJtHemSPW4">
              <div class="video__player">
                <i class="fa fa-play"></i>
              </div>
              <span class="video__btn-title color-white">Watch Video</span>
            </a>
          </div>

          <div class="text__block">
            <p class="text__block-desc color-white font-weight-bold">
              Our mission is to restore health naturally by strengthening the body,
              improving immunity, and preventing disease recurrence through
              authentic Unani medicine.
            </p>
            <div class="sinature color-white">
              <span class="font-weight-bold">Hakeem Shan-e-Alam</span>
              <span>, Chief Unani Physician</span>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>



<?php include 'includes/footer.php';?>