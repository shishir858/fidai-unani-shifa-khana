<!DOCTYPE html>
<html lang="en">

<?php
include 'config.php';

$logo = 'assets/images/logo/logo-light.PNG';
if (isset($conn)) {
  $res = $conn->query("SELECT value FROM settings WHERE `key`='logo' LIMIT 1");
  if ($res && $row = $res->fetch_assoc()) {
    if (!empty($row['value'])) {
      $logo = $row['value'];
    }
  }
}
?>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Fidai Unani Shifa Khana - Unani Natural Treatment in Muradnagar, Ghaziabad, UP">
  <link href="assets/images/favicon/favicon.PNG" rel="icon">
  <title>Fidai Unani Shifa Khana | Unani Natural Treatment</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
  <link rel="stylesheet" href="assets/css/libraries.css">
  <link rel="stylesheet" href="assets/css/style.css">
<style>
  .dropdown-menu {
    max-height: 320px;
    overflow-y: auto;
  }
  .dropdown-menu li {
    white-space: nowrap;
  }
  /* Fixed Call & WhatsApp Buttons */
.fixed-contact-buttons {
  position: fixed;
  top: 85%;
  right: 18px;
  z-index: 9999;
  display: flex;
  flex-direction: column;
  gap: 16px;
  transform: translateY(-50%);
}
.fixed-btn {
  width: 52px;
  height: 52px;
  background: #213360;
  color: #fff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 26px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.15);
  transition: background 0.2s, color 0.2s;
  text-decoration: none;
}
.fixed-btn.call-btn {
  background: #8dbb16;
}
.fixed-btn.whatsapp-btn {
  background: #25d366;
}
.fixed-btn:hover {
  background: #fff;
  color: #213360;
}
@media (max-width: 767px) {
  .fixed-contact-buttons {
    right: 8px;
    gap: 10px;
  }
  .fixed-btn {
    width: 44px;
    height: 44px;
    font-size: 20px;
  }
}
</style>
</head>

<body>
  <div class="wrapper">
    <!-- <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div> -->
    <!-- /.preloader -->

    <!-- =========================
        Header
    =========================== -->
    <header class="header header-layout1">
      <div class="header-topbar">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="d-flex align-items-center justify-content-between">
                <ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">
                  <li>
                    <button class="miniPopup-emergency-trigger" type="button">24/7 Emergency</button>
                    <div id="miniPopup-emergency" class="miniPopup miniPopup-emergency text-center">
                      <div class="emergency__icon">
                        <i class="icon-call3"></i>
                      </div>
                      <a href="tel:+201061245741" class="phone__number">
                        <i class="icon-phone"></i> <span>9568304355</span>
                      </a>
                      <p>Please feel free to contact our friendly reception staff with any general or medical enquiry.
                      </p>
                      <a href="appointment.php" class="btn btn__secondary btn__link btn__block">
                        <span>Make Appointment</span> <i class="icon-arrow-right"></i>
                      </a>
                    </div><!-- /.miniPopup-emergency -->
                  </li>
                  <li>
                    <i class="icon-phone"></i><a href="tel:9634430627">Contact: 9634430627</a>
                  </li>
                  <li>
                    <i class="icon-location"></i><a href="#">Rawli Road Chungi no.3
Near by Police Chauki
Muradagar, Ghaziabad
Uttar Pradesh 201206</a>
                  </li>
                  <li>
                    <i class="icon-clock"></i><a href="#">Mon-Fri: 10:00 am - 2:30 pm, 5:00 pm - 6:00 pm</a>
                  </li>
                </ul><!-- /.contact__list -->
                <div class="d-flex">
                  <ul class="social-icons list-unstyled mb-0 mr-30">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  </ul><!-- /.social-icons -->
                  <!-- <form class="header-topbar__search">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="header-topbar__search-btn"><i class="fa fa-search"></i></button>
                  </form> -->
                </div>
              </div>
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.header-top -->
      <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img src="assets/images/logo/logo-light.png" height="60" class="logo-light" alt="Fidai Unani Shifa Khana Logo">
            <img src="assets/images/logo/logo-light.png" height="60" class="logo-dark" alt="Fidai Unani Shifa Khana Logo">
            <!-- <span class="text-dark">Fidai Unani Shifa Khana</span> -->
          </a>
          <button class="navbar-toggler" type="button">
            <span class="menu-lines"><span></span></span>
          </button>
          <div class="collapse navbar-collapse" id="mainNavigation">
            <ul class="navbar-nav ml-auto">
              <li class="nav__item"><a href="./" class="nav__item-link">Home</a></li>
              <li class="nav__item"><a href="about-us.php" class="nav__item-link">About Us</a></li>
              <li class="nav__item"><a href="about-our-doctor.php" class="nav__item-link">Our Doctors</a></li>
              <li class="nav__item has-dropdown">
                <a href="services.php" data-toggle="dropdown" class="dropdown-toggle nav__item-link active">Services</a>
                <ul class="dropdown-menu">
                    <li class="nav__item"><a href="service-details.php?treatment=cancer" class="nav__item-link">Cancer Treatment</a></li>
                    <li class="nav__item"><a href="service-details.php?treatment=liver" class="nav__item-link">Liver Disease Treatment</a></li>
                    <li class="nav__item"><a href="service-details.php?treatment=kidney" class="nav__item-link">Kidney Disease Treatment</a></li>
                    <li class="nav__item"><a href="service-details.php?treatment=heart" class="nav__item-link">Heart & Blood Disorders</a></li>
                    <li class="nav__item"><a href="service-details.php?treatment=gastro" class="nav__item-link">Gastro & Digestive Diseases</a></li>
                    <li class="nav__item"><a href="service-details.php?treatment=piles" class="nav__item-link">Piles (Bawasir) Treatment</a></li>
                    <li class="nav__item"><a href="service-details.php?treatment=sexual" class="nav__item-link">Sexual & Infertility Treatment</a></li>
                    <li class="nav__item"><a href="service-details.php?treatment=allergy" class="nav__item-link">Allergy & Asthma</a></li>
                    <li class="nav__item mt-1"><a href="services.php" class="nav__item-link"><b>View More Services</b></a></li>
                </ul>
              </li>
              <li class="nav__item"><a href="faqs.php" class="nav__item-link">FAQs</a></li>
              <li class="nav__item"><a href="contact-us.php" class="nav__item-link">Contact</a></li>
            </ul><!-- /.navbar-nav -->
            <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
          </div><!-- /.navbar-collapse -->
          <div class="d-none d-xl-flex align-items-center position-relative ml-30">
            <div class="miniPopup-departments-trigger">
              <span class="menu-lines" id="miniPopup-departments-trigger-icon"><span></span></span>
              <a href="treatments.php">Treatments</a>
            </div>
            <ul id="miniPopup-departments" class="miniPopup miniPopup-departments dropdown-menu">
              <li class="nav__item"><a href="#" class="nav__item-link">Cancer (Lungs, Gal Bladder, Liver)</a></li>
              <li class="nav__item"><a href="#" class="nav__item-link">Liver Disease (CLD, Hepatitis, Cirrhosis)</a></li>
              <li class="nav__item"><a href="#" class="nav__item-link">Kidney Disease & Failure</a></li>
              <li class="nav__item"><a href="#" class="nav__item-link">Sexual Disease</a></li>
              <li class="nav__item"><a href="#" class="nav__item-link">Gastro (GERD, Constipation, Ulcers, Pancreatitis, Colitis, Piles)</a></li>
              <li class="nav__item"><a href="#" class="nav__item-link">Heart Disease & BP</a></li>
              <li class="nav__item"><a href="#" class="nav__item-link">Infertility</a></li>
              <li class="nav__item"><a href="#" class="nav__item-link">Allergies & Asthma</a></li>
            </ul> <!-- /.miniPopup-departments -->
            <a href="appointment.php" class="btn btn__primary btn__rounded ml-30">
              <i class="icon-calendar"></i>
              <span>Appointment</span>
            </a>
          </div>
        </div><!-- /.container -->
      </nav><!-- /.navabr -->
    </header><!-- /.Header -->

    <!-- Fixed Call & WhatsApp Buttons -->
<div class="fixed-contact-buttons">
  <a href="tel:+919634430627" class="fixed-btn call-btn" title="Call Now">
    <i class="fas fa-phone-alt"></i>
  </a>
  <a href="https://wa.me/919634430627" class="fixed-btn whatsapp-btn" target="_blank" title="WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>