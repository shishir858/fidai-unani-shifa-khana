	<!-- Footer -->
	<footer class="site-footer">
		<div class="footer-main">
			<?php
			require_once __DIR__ . '/config.php';
			$settings = [];
			$result = $conn->query("SELECT `key`, `value` FROM settings");
			while($row = $result->fetch_assoc()) {
				$settings[$row['key']] = $row['value'];
			}
			?>
			<div class="footer-section footer-brand">
					<img src="<?php echo htmlspecialchars($settings['logo'] ?? 'assets/images/logo/logo-light.png'); ?>" alt="<?php echo htmlspecialchars($settings['site_name'] ?? 'Fidai Unani Shifa Khana'); ?>" class="footer-logo">
					<div class="footer-title"><?php echo htmlspecialchars($settings['site_name'] ?? 'Fidai Unani Shifa Khana'); ?></div>
					<div class="footer-desc"><?php echo htmlspecialchars($settings['footer_about'] ?? 'Your trusted destination for Unani & Herbal healthcare, wellness, and holistic treatments.'); ?></div>
			</div>
			<div class="footer-section footer-links">
				<div class="footer-heading">Quick Links</div>
				<a href="about">About Us</a>
				<a href="doctors">Our Doctors</a>
				<a href="services">Specialities</a>
				<a href="treatments">Treatments</a>
				<a href="gallery">Gallery</a>
				<a href="contact">Contact Us</a>
			</div>
			<div class="footer-section footer-services">
				<div class="footer-heading">Services</div>
				<a href="treatments#liver">Liver Treatment</a>
				<a href="treatments#kidney">Kidney Stone</a>
				<a href="treatments#piles">Piles & Fissure</a>
				<a href="treatments#skin">Skin Diseases</a>
				<a href="treatments#sexual">Sexual Wellness</a>
				<a href="treatments#joint">Joint Pain</a>
			</div>
			<div class="footer-section footer-contact">
				<div class="footer-heading">Contact</div>
				<div><b>Address</b> <br><?php echo nl2br(htmlspecialchars($settings['address'] ?? '')); ?></div>
				<?php if(!empty($settings['phone'])):
				  $phones = explode(',', $settings['phone']);
				  foreach($phones as $ph): ?>
					<div><b>Phone:</b> <a href="tel:<?php echo trim($ph); ?>"><?php echo trim($ph); ?></a></div>
				<?php endforeach; endif; ?>
				<div><b>Email:</b> <a href="mailto:<?php echo htmlspecialchars($settings['email'] ?? ''); ?>"><?php echo htmlspecialchars($settings['email'] ?? ''); ?></a></div>
				<div class="footer-social">
					<?php if(!empty($settings['facebook'])): ?><a href="<?php echo htmlspecialchars($settings['facebook']); ?>" title="Facebook" aria-label="Facebook" style="color:#bab9b9;"><i class="bi bi-facebook" style="font-size: 1.5rem;"></i></a><?php endif; ?>
					<?php if(!empty($settings['instagram'])): ?><a href="<?php echo htmlspecialchars($settings['instagram']); ?>" title="Instagram" aria-label="Instagram" style="color:#bab9b9;"><i class="bi bi-instagram" style="font-size: 1.5rem;"></i></a><?php endif; ?>
					<?php if(!empty($settings['twitter'])): ?><a href="<?php echo htmlspecialchars($settings['twitter']); ?>" title="Twitter" aria-label="Twitter" style="color:#bab9b9;"><i class="bi bi-twitter" style="font-size: 1.5rem;"></i></a><?php endif; ?>
					<?php if(!empty($settings['whatsapp'])): ?><a href="https://wa.me/<?php echo htmlspecialchars($settings['whatsapp']); ?>" title="WhatsApp" aria-label="WhatsApp" style="color:#bab9b9;"><i class="bi bi-whatsapp" style="font-size: 1.5rem;"></i></a><?php endif; ?>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div><?php echo htmlspecialchars($settings['footer_copyright'] ?? '© 2026 Fidai Unani Shifa Khana. All rights reserved.'); ?></div>
			<div class="footer-dev">Developed by <a href="http://sspsoftproindia.com/" target="_blank">SSP Softpro India Pvt Ltd</a></div>
		</div>
	</footer>
	<!-- Sticky Call & WhatsApp Buttons -->
	<style>
	  .sticky-contact-btn {
	    position: fixed;
	    z-index: 9999;
	    width: 60px;
	    height: 60px;
	    border-radius: 50%;
	    display: flex;
	    align-items: center;
	    justify-content: center;
	    box-shadow: 0 4px 16px rgba(0,0,0,0.18);
	    background: #fff;
	    transition: transform 0.3s cubic-bezier(.68,-0.55,.27,1.55), box-shadow 0.2s;
	    cursor: pointer;
	    animation: stickyBounce 1.2s infinite alternate;
	  }
	  .sticky-contact-btn:hover {
	    transform: scale(1.12) rotate(-8deg);
	    box-shadow: 0 8px 32px rgba(0,0,0,0.22);
	  }
	.sticky-call-btn {
		left: 24px;
		bottom: 30px;
		background: linear-gradient(135deg, #5cc600 80%, #ff4d4d 100%);
		color: #fff;
		border: 2px solid #8afb01;
		box-shadow: 0 4px 16px rgba(214,59,59,0.18);
		animation: stickyBounce 1.2s infinite alternate, blinkCall 1.1s infinite;
	}
	@keyframes blinkCall {
		0%, 100% { box-shadow: 0 0 16px 4px #d63b3b88; }
		50% { box-shadow: 0 0 32px 8px #ff4d4dcc; }
	}
	.sticky-whatsapp-btn {
		right: 24px;
		bottom: 32px;
		background: linear-gradient(135deg, #25d366 70%, #128c7e 100%);
		color: #fff;
		border: 2px solid #25d366;
		box-shadow: 0 4px 16px rgba(37,211,102,0.18);
	}
	  .sticky-contact-btn i {
	    font-size: 2.2rem;
	    transition: color 0.2s;
	  }
	  @keyframes stickyBounce {
	    0% { transform: translateY(0); }
	    100% { transform: translateY(-12px); }
	  }
	</style>

	<a href="tel:+919999999999" class="sticky-contact-btn sticky-call-btn" title="Call Now" style="z-index:10001;">
		<i class="bi bi-telephone-fill"></i>
	</a>
	<a href="https://wa.me/919999999999" target="_blank" class="sticky-contact-btn sticky-whatsapp-btn" title="WhatsApp" style="z-index:10000;">
		<i class="bi bi-whatsapp"></i>
	</a>
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

			// Modern Hero Banner Slider
			$('.modern-hero-slider').owlCarousel({
				items: 1,
				loop: true,
				autoplay: true,
				autoplayTimeout: 3500,
				autoplayHoverPause: false,
				animateOut: 'fadeOut',
				animateIn: 'fadeIn',
				smartSpeed: 900,
				dots: false,
				nav: false,
				mouseDrag: false,
				touchDrag: false
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
