<?php include 'includes/header.php';?>

    <!-- ========================
       page title 
    =========================== -->
    <section class="page-title page-title-layout4 bg-overlay text-center">
      <div class="bg-img"><img src="assets/images/backgrounds/7.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading">Book Your Unani Appointment</h1>
            <p class="pagetitle__desc">Get personalized Unani consultation for chronic and lifestyle diseases. Fill the form below or call us for quick booking.</p>
            <a href="tel:+919634430627" class="btn btn__secondary btn__outlined btn__rounded">
              <span>Call for Appointment</span>
              <i class="icon-phone"></i>
            </a>
          </div>
        </div>
      </div>
    </section>


    <!-- ==========================
        contact layout 2
    =========================== -->
    <section class="contact-layout2 pt-0">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="contact-panel d-flex flex-wrap">
              <form class="contact-panel__form" method="post" action="assets/php/contact.php" id="contactForm">
                <div class="row">
                  <div class="col-sm-12">
                    <h4 class="contact-panel__title">Book An Appointment</h4>
                    <p class="contact-panel__desc mb-30">Please feel welcome to contact our friendly reception staff
                      with any general or medical enquiry. Our doctors will receive or return any urgent calls.
                    </p>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-widget form-group-icon"></i>
                      <select class="form-control" name="treatment-category" required>
                        <option value="">Select Treatment Category</option>
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
                      <select class="form-control" name="doctor" required>
                        <option value="">Choose Doctor</option>
                        <option value="Hakeem Shan-e-Alam">Hakeem Shan-e-Alam</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-news form-group-icon"></i>
                      <input type="text" class="form-control" placeholder="Full Name" id="contact-name" name="contact-name" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-phone form-group-icon"></i>
                      <input type="text" class="form-control" placeholder="Phone Number" id="contact-phone" name="contact-phone" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-email form-group-icon"></i>
                      <input type="email" class="form-control" placeholder="Email" id="contact-email" name="contact-email" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group form-group-date">
                      <i class="icon-calendar form-group-icon"></i>
                      <input type="date" class="form-control" id="contact-date" name="contact-date" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group form-group-date">
                      <i class="icon-clock form-group-icon"></i>
                      <input type="time" class="form-control" id="contact-time" name="contact-time" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                      <span>Confirm Appointment</span> <i class="icon-arrow-right"></i>
                    </button>
                    <div class="contact-result"></div>
                  </div>
                </div><!-- /.row -->
              </form>
              <div class="contact-panel__info d-flex flex-column justify-content-between bg-overlay bg-overlay-primary-gradient">
                <div class="bg-img"><img src="assets/images/banners/1.jpg" alt="banner"></div>
                <div>
                  <h4 class="contact-panel__title color-white">Clinic Contact & Timings</h4>
                  <p class="contact-panel__desc font-weight-bold color-white mb-30">Fidai Unani Shifa Khana</p>
                </div>
                <div>
                  <ul class="contact__list list-unstyled mb-30">
                    <li>
                      <i class="icon-phone"></i><a href="tel:+919634430627">Call: +91 96344 30627</a>
                    </li>
                    <li>
                      <i class="icon-location"></i><span>Rawli Road Chungi no.3
Near by Police Chauki
Muradagar, Ghaziabad
Uttar Pradesh 201206</span>
                    </li>
                    <li>
                      <i class="icon-clock"></i><span>Morning: 10:30 am - 2:30 pm | Evening: 5:00 pm - 6:00 pm | Saturday: Closed</span>
                    </li>
                  </ul>
                  <a href="contact-us.php" class="btn btn__white btn__rounded btn__outlined">Contact Us</a>
                </div>
              </div>
            </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.contact layout 2 -->

    <!-- ========================
      About Layout 2
    =========================== -->
    <section class="about-layout5 pt-20">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-5">
            <div class="heading-layout2">
              <h3 class="heading__title mb-80">Helping Patients From Around the Globe!!</h3>
            </div><!-- /heading -->
            <div class="map-wrapper mb-50">
              <img src="assets/images/backgrounds/map.png" alt="map">
              <div class="tooltip-box">
                <div class="tooltip__icon">
                  <i class="fas fa-plus"></i>
                </div><!-- /.tooltip__icon -->
                <div class="tooltip__panel">
                  <p class="tooltip__title mb-0">2307 Beverley Rd Brooklyn, New York 11226 U.S.</p>
                </div><!-- /.tooltip__panel -->
              </div><!-- /.tooltip-box -->
              <div class="tooltip-box tooltip-hover-left">
                <div class="tooltip__icon">
                  <i class="fas fa-plus"></i>
                </div><!-- /.tooltip__icon -->
                <div class="tooltip__panel">
                  <p class="tooltip__title mb-0">2307 Beverley Rd Brooklyn, New York 11226 U.S.</p>
                </div><!-- /.tooltip__panel -->
              </div><!-- /.tooltip-box -->
              <div class="tooltip-box">
                <div class="tooltip__icon">
                  <i class="fas fa-plus"></i>
                </div><!-- /.tooltip__icon -->
                <div class="tooltip__panel">
                  <p class="tooltip__title mb-0">2307 Beverley Rd Brooklyn, New York 11226 U.S.</p>
                </div><!-- /.tooltip__panel -->
              </div><!-- /.tooltip-box -->
            </div><!-- /.map-wrapper -->
          </div><!-- /.col-lg-6 -->
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-1">
            <p class="heading__desc color-secondary font-weight-bold mb-30">We will work with you to develop
              individualised care plans,
              management of chronic diseases. If we cannot assist, we can provide referrals or advice about the type of
              practitioner you require.</p>
            <p class="heading__desc mb-30">We are committed to being the region’s premier healthcare network by
              providing
              patient-centered care that inspires clinical and service excellence, making us the first and best choice
              for our patients, employees, physicians, employers, volunteers and communities. We serve the community by
              improving the quality of life through better health.</p>
            <div class="d-flex align-items-center mb-60">
              <a href="contact-us.php" class="btn btn__secondary btn__rounded mr-30">
                <i class="fas fa-heart"></i> <span>Make A Gift</span>
              </a>
              <a href="contact-us.php" class="btn btn__secondary btn__outlined btn__rounded mr-30">
                More About Us
              </a>
            </div>
            <ul class="list-items list-items-layout3 list-unstyled">
              <li>We conduct a range of tests to help us work out why you're not feeling well and determine the right
                treatment for you.</li>
              <li>Our expert doctors, nurses and allied health professionals manage patients with a broad range of
                medical issues.</li>
              <li>We offer a wide range of care and support to our patients, from diagnosis to treatment and
                rehabilitation.</li>
            </ul>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.About Layout 2 -->

<?php include 'includes/footer.php';?>