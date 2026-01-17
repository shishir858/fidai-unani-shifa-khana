	<!-- Footer -->
	<footer class="site-footer">
		<div class="footer-main">
			<div class="footer-section footer-brand">
				<img src="assets/images/logo/logo-light.png" alt="Fidai Unani Shifa Khana" class="footer-logo">
				<div class="footer-title">Fidai Unani Shifa Khana</div>
				<div class="footer-desc">Your trusted destination for Unani & Herbal healthcare, wellness, and holistic treatments.</div>
			</div>
			<div class="footer-section footer-links">
				<div class="footer-heading">Quick Links</div>
				<a href="about.php">About Us</a>
				<a href="doctors.php">Our Doctors</a>
				<a href="services.php">Specialities</a>
				<a href="treatments.php">Treatments</a>
				<a href="gallery.php">Gallery</a>
				<a href="contact.php">Contact Us</a>
			</div>
			<div class="footer-section footer-services">
				<div class="footer-heading">Services</div>
				<a href="treatments.php#liver">Liver Treatment</a>
				<a href="treatments.php#kidney">Kidney Stone</a>
				<a href="treatments.php#piles">Piles & Fissure</a>
				<a href="treatments.php#skin">Skin Diseases</a>
				<a href="treatments.php#sexual">Sexual Wellness</a>
				<a href="treatments.php#joint">Joint Pain</a>
			</div>
			<div class="footer-section footer-contact">
				<div class="footer-heading">Contact</div>
				<div><b>Delhi:</b> <a href="tel:9999446622">9999446622</a></div>
				<div><b>Gurgaon:</b> <a href="tel:9354471022">9354471022</a></div>
				<div><b>Email:</b> <a href="mailto:info@fidaiunanishifa.com">info@fidaiunanishifa.com</a></div>
				<div class="footer-social">
					<a href="#" title="Facebook" aria-label="Facebook" style="color:#bab9b9;"><i class="bi bi-facebook" style="font-size: 1.5rem;"></i></a>
					<a href="#" title="Instagram" aria-label="Instagram" style="color:#bab9b9;"><i class="bi bi-instagram" style="font-size: 1.5rem;"></i></a>
					<a href="#" title="LinkedIn" aria-label="LinkedIn" style="color:#bab9b9;"><i class="bi bi-linkedin" style="font-size: 1.5rem;"></i></a>
					<a href="#" title="WhatsApp" aria-label="WhatsApp" style="color:#bab9b9;"><i class="bi bi-whatsapp" style="font-size: 1.5rem;"></i></a>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div>&copy; 2026 Fidai Unani Shifa Khana. All rights reserved.</div>
			<div class="footer-dev">Developed by <a href="http://sspsoftproindia.com/" target="_blank">SSP Softpro India Pvt Ltd</a></div>
		</div>
	</footer>
	<!-- Bootstrap Icons CDN -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

	<!-- OwlCarousel2 CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<!-- OwlCarousel2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Categories Carousel JS -->
<script src="assets/js/categories-carousel.js"></script>

<script>
	$(document).ready(function(){
		// Featured Treatments Carousel
		$('.featured-treatments-carousel').owlCarousel({
			loop:true,
			margin:24,
			nav:true,
			dots:true,
			autoplay:true,
			autoplayTimeout:3500,
			autoplayHoverPause:true,
			responsive:{
				0:{items:1},
				576:{items:2},
				992:{items:4}
			},
			slideBy:1
		});
		// Testimonial Carousel
		$('.testimonial-carousel').owlCarousel({
			loop:true,
			margin:24,
			nav:true,
			dots:true,
			autoplay:true,
			autoplayTimeout:3500,
			autoplayHoverPause:true,
			responsive:{
				0:{items:1},
				576:{items:2},
				992:{items:4}
			},
			slideBy:1
		});
		// Video Gallery Carousel
		$('.video-carousel').owlCarousel({
			loop:true,
			margin:24,
			nav:true,
			dots:true,
			autoplay:true,
			autoplayTimeout:3500,
			autoplayHoverPause:true,
			responsive:{
				0:{items:1},
				576:{items:2},
				992:{items:3},
				1200:{items:4}
			},
			slideBy:1
		});
	});
	</script>
	</body>
	</html>
