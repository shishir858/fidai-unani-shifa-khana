<?php include 'includes/header.php';?>

    <!-- ========================= 
            Google Map
    =========================  -->
    <section class="google-map py-0">
      <iframe frameborder="0" height="500" width="100%"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3496.8066827083903!2d77.49528637490923!3d28.78502537558187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cf44b76658181%3A0x1528c0ae17c44d44!2sFidai%20Unani%20Shifa%20Khana!5e0!3m2!1sen!2sin!4v1767855380912!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section><!-- /.GoogleMap -->

    <!-- ==========================
        contact layout 1
    =========================== -->
    <section class="contact-layout1 pt-0 mt--100">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="contact-panel d-flex flex-wrap">
              <form class="contact-panel__form" method="post" action="assets/php/contact.php" id="contactForm">
                <div class="row">
                  <div class="col-sm-12">
                    <h4 class="contact-panel__title">Contact Fidai Unani Shifa Khana</h4>
                    <p class="contact-panel__desc mb-30">Chronic disease, lifestyle disorder, ya kisi bhi health enquiry ke liye form bhar kar ya call karke sampark karein. Hamari team aapko jald contact karegi.</p>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-user form-group-icon"></i>
                      <input type="text" class="form-control" placeholder="Full Name" id="contact-name" name="contact-name" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                      <i class="icon-email form-group-icon"></i>
                      <input type="email" class="form-control" placeholder="Email" id="contact-email" name="contact-email" required>
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
                      <i class="icon-news form-group-icon"></i>
                      <select class="form-control" name="contact-subject" id="contact-subject" required>
                        <option value="">Select Subject</option>
                        <option value="Appointment">Appointment</option>
                        <option value="Treatment Enquiry">Treatment Enquiry</option>
                        <option value="Feedback">Feedback</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <i class="icon-alert form-group-icon"></i>
                      <textarea class="form-control" placeholder="Your Message" id="contact-message" name="contact-message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn__secondary btn__rounded btn__block btn__xhight mt-10">
                      <span>Send Message</span> <i class="icon-arrow-right"></i>
                    </button>
                    <div class="contact-result"></div>
                  </div>
                </div>
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
                    <li><span>Morning :</span> <span>10:30 am - 2:30 pm</span></li>
                    <li><span>Evening :</span> <span>5:00 pm - 6:00 pm</span></li>
                    <li><span>Saturday:</span> <span>Closed</span></li>
                  </ul>
                  <a href="tel:+919634430627" class="btn btn__white btn__rounded btn__outlined">Call Now</a>
                </div>
              </div>
            </div>
          </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.contact layout 1 -->


    
<?php include 'includes/footer.php';?>