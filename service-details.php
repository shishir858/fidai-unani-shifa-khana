
<?php 
require_once 'includes/config.php';
require_once 'includes/treatment-html.php';
$slug = isset($_GET['service']) ? mysqli_real_escape_string($conn, $_GET['service']) : '';
$service = false;
if($slug) {
  $result = mysqli_query($conn, "SELECT * FROM treatments WHERE slug='$slug' AND status='active' LIMIT 1");
  if($result && mysqli_num_rows($result) > 0) {
    $service = mysqli_fetch_assoc($result);
  }
}
include 'includes/form-handler.php';

if ($service) {
  $siteName = 'Fidai Unani Shifa Khana';
  $page_title = ($service['meta_title'] ?? '') ? $service['meta_title'] : ($service['title'] . ' | ' . $siteName);
  $page_description = ($service['meta_description'] ?? '') ? $service['meta_description'] : '';
  if (empty($page_description)) {
    $page_description = strip_tags(sanitize_treatment_editor_html($service['short_description'] ?? ''));
  }
  if (empty($page_description)) {
    $page_description = substr(strip_tags(sanitize_treatment_editor_html($service['full_description'] ?? '')), 0, 160);
  }
  $page_keywords = ($service['meta_keywords'] ?? '') ? $service['meta_keywords'] : (($service['title'] ?? '') . ', unani treatment, herbal treatment');
  $page_canonical = rtrim(BASE_URL, '/') . '/services/' . ($service['slug'] ?? $slug);
}

include 'includes/header.php';
?>


<!-- Service Details Hero Section -->
<section class="service-details-hero-section section-bg" style="padding: 64px 0 32px 0; background: linear-gradient(90deg, #e6f2e6 60%, #f8f9fa 100%);">
  <div class="container">
    <?php if($service): ?>
    <div class="row align-items-center">
      <div class="col-md-7 mb-4 mb-md-0">
        <h1 class="display-5 fw-bold" style="color:#1c4307;">
          <?php echo htmlspecialchars($service['title']); ?>
        </h1>
        <div class="lead" style="color:#1c4307;">
          <?php echo format_treatment_short_html($service['short_description'] ?? ''); ?>
        </div>
        <div class="mb-2"><span class="badge bg-success"><i class="bi bi-person-badge"></i> <?php echo htmlspecialchars($service['doctor_name']); ?></span></div>
      </div>
      <div class="col-md-5 text-center">
        <?php if(!empty($service['feature_image']) && file_exists('assets/images/treatments/' . $service['feature_image'])): ?>
          <img src="assets/images/treatments/<?php echo htmlspecialchars($service['feature_image']); ?>" alt="<?php echo htmlspecialchars($service['title']); ?>" class="img-fluid rounded shadow" style="max-height:320px; background:#fff; padding:12px;">
        <?php else: ?>
          <img src="assets/images/services/default.png" alt="Service Image" class="img-fluid rounded shadow" style="max-height:320px; background:#fff; padding:12px;">
        <?php endif; ?>
      </div>
    </div>
    <?php else: ?>
    <div class="row"><div class="col text-center text-danger py-5"><h2>Service not found</h2></div></div>
    <?php endif; ?>
  </div>
</section>



<?php if($service): ?>
<?php
  $features = array_filter(array_map('trim', explode("\n", $service['features'] ?? '')));
  $faqCandidate = trim((string)($service['faqs'] ?? ''));
?>

<!-- Service Details Content Section -->
<section class="svc-page">
  <div class="container">
    <div class="svc-wrap mx-auto">
      <div class="svc-hero-card">
        <div class="svc-hero-media">
          <img src="assets/images/services/10.webp" alt="Unani Care" loading="lazy">
        </div>
        <div class="svc-hero-body">
          <div class="svc-kicker">Treatment / Service</div>
          <h2 class="svc-title"><?php echo htmlspecialchars($service['title']); ?></h2>
          <div class="svc-subtitle svc-subtitle-prose"><?php echo format_treatment_short_html($service['short_description'] ?? ''); ?></div>
          <div class="svc-chip-row">
            <?php if(!empty($service['doctor_name'])): ?>
              <span class="svc-chip"><i class="bi bi-person-badge"></i> <?php echo htmlspecialchars($service['doctor_name']); ?></span>
            <?php endif; ?>
            <?php if(!empty($service['duration'])): ?>
              <span class="svc-chip"><i class="bi bi-clock-history"></i> <?php echo htmlspecialchars($service['duration']); ?></span>
            <?php endif; ?>
            <span class="svc-chip"><i class="bi bi-telephone"></i> 24×7 Support</span>
          </div>
          <div class="svc-cta-row">
            <a href="tel:+919634430627" class="btn btn-danger svc-primary-cta">Call Now</a>
            <a href="https://wa.me/9634430627" target="_blank" class="btn btn-success svc-secondary-cta">WhatsApp</a>
          </div>
        </div>
      </div>

      <?php if(!empty($features)): ?>
      <div class="svc-section">
        <div class="svc-section-head">
          <h3 class="svc-h3"><i class="bi bi-stars"></i> Key Features</h3>
          <div class="svc-muted">Quick points to understand the treatment at a glance.</div>
        </div>
        <div class="svc-feature-chips">
          <?php foreach($features as $f): ?>
            <span class="svc-feature-chip"><?php echo htmlspecialchars($f); ?></span>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

      <div class="svc-section">
        <div class="svc-section-head">
          <h3 class="svc-h3"><i class="bi bi-info-circle"></i> Overview</h3>
        </div>
        <div class="svc-prose">
          <?php echo format_treatment_body_html($service['full_description'] ?? ''); ?>
        </div>
      </div>

      <div class="svc-section">
        <div class="svc-section-head">
          <h3 class="svc-h3"><i class="bi bi-patch-check"></i> Why Patients Choose Us</h3>
          <div class="svc-muted">Care that is personalised, safe, and supportive.</div>
        </div>
        <div class="svc-why-grid">
          <div class="svc-why-card">
            <div class="svc-why-icon"><i class="bi bi-person-check"></i></div>
            <div class="svc-why-title">Personalised Treatment</div>
            <div class="svc-why-text">Treatment plan is made after understanding symptoms, history, and current condition.</div>
          </div>
          <div class="svc-why-card">
            <div class="svc-why-icon"><i class="bi bi-shield-check"></i></div>
            <div class="svc-why-title">Trusted & Safe Approach</div>
            <div class="svc-why-text">We focus on safe care, guided by experienced doctors and patient comfort.</div>
          </div>
          <div class="svc-why-card">
            <div class="svc-why-icon"><i class="bi bi-telephone-inbound"></i></div>
            <div class="svc-why-title">Support & Follow‑ups</div>
            <div class="svc-why-text">Easy follow‑up via call/WhatsApp to track progress and answer questions.</div>
          </div>
        </div>
      </div>

      <div class="svc-grid">
        <?php if(!empty($service['symptoms'])): ?>
        <div class="svc-info-card">
          <div class="svc-info-title"><i class="bi bi-exclamation-triangle"></i> Symptoms</div>
          <div class="svc-info-body"><?php echo nl2br(htmlspecialchars($service['symptoms'])); ?></div>
        </div>
        <?php endif; ?>
        <?php if(!empty($service['causes'])): ?>
        <div class="svc-info-card">
          <div class="svc-info-title"><i class="bi bi-bug"></i> Causes</div>
          <div class="svc-info-body"><?php echo nl2br(htmlspecialchars($service['causes'])); ?></div>
        </div>
        <?php endif; ?>
        <?php if(!empty($service['procedure'])): ?>
        <div class="svc-info-card">
          <div class="svc-info-title"><i class="bi bi-gear"></i> Procedure</div>
          <div class="svc-info-body"><?php echo nl2br(htmlspecialchars($service['procedure'])); ?></div>
        </div>
        <?php endif; ?>
        <?php if(!empty($service['medicines'])): ?>
        <div class="svc-info-card">
          <div class="svc-info-title"><i class="bi bi-capsule"></i> Medicines</div>
          <div class="svc-info-body"><?php echo nl2br(htmlspecialchars($service['medicines'])); ?></div>
        </div>
        <?php endif; ?>
        <?php if(!empty($service['side_effects'])): ?>
        <div class="svc-info-card">
          <div class="svc-info-title"><i class="bi bi-shield-exclamation"></i> Side Effects</div>
          <div class="svc-info-body"><?php echo nl2br(htmlspecialchars($service['side_effects'])); ?></div>
        </div>
        <?php endif; ?>
        <?php if(!empty($service['precautions'])): ?>
        <div class="svc-info-card">
          <div class="svc-info-title"><i class="bi bi-shield-check"></i> Precautions</div>
          <div class="svc-info-body"><?php echo nl2br(htmlspecialchars($service['precautions'])); ?></div>
        </div>
        <?php endif; ?>
      </div>

      <div class="svc-section">
        <div class="svc-section-head">
          <h3 class="svc-h3"><i class="bi bi-diagram-3"></i> How Consultation Works</h3>
          <div class="svc-muted">Just 3 simple steps.</div>
        </div>
        <div class="svc-steps">
          <div class="svc-step">
            <div class="svc-step-num">1</div>
            <div>
              <div class="svc-step-title">Share your details</div>
              <div class="svc-step-text">Fill the form or contact us on WhatsApp with your symptoms.</div>
            </div>
          </div>
          <div class="svc-step">
            <div class="svc-step-num">2</div>
            <div>
              <div class="svc-step-title">Doctor consultation</div>
              <div class="svc-step-text">Our team schedules a call/visit and guides you with next steps.</div>
            </div>
          </div>
          <div class="svc-step">
            <div class="svc-step-num">3</div>
            <div>
              <div class="svc-step-title">Start treatment + follow‑up</div>
              <div class="svc-step-text">Begin the plan and get follow‑ups to monitor progress.</div>
            </div>
          </div>
        </div>
      </div>

      <div class="svc-consult-split">
        <div class="svc-consult-img">
          <img src="assets/images/about/4.png" alt="Doctor" loading="lazy">
        </div>
        <div class="svc-consult-center">
          <div class="svc-banner-title">Need a personalised consultation?</div>
          <div class="svc-banner-sub">Share your details and our team will call you back.</div>
          <div class="svc-cta-row mt-3">
            <a href="tel:+919634430627" class="btn btn-danger svc-primary-cta">Call Now</a>
            <a href="https://wa.me/9634430627" target="_blank" class="btn btn-success svc-secondary-cta">WhatsApp</a>
          </div>
        </div>
        <div class="svc-consult-img">
          <img src="assets/images/about/doctor-illustration.jpeg" alt="Consultation" loading="lazy">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ + Appointment Form Section -->
<section class="service-faq-form-section svc-faq-form">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-6">
        <div class="svc-panel h-100">
          <h4 class="svc-panel-title"><i class="bi bi-question-circle"></i> FAQs</h4>
          <div class="accordion" id="serviceFaqAccordion">
            <div class="accordion-item">
              <h2 class="accordion-header" id="sfq1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sfqc1" aria-expanded="true" aria-controls="sfqc1">
                  Is this treatment safe?
                </button>
              </h2>
              <div id="sfqc1" class="accordion-collapse collapse show" aria-labelledby="sfq1" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body">
                  Yes, treatment is provided after proper diagnosis and is tailored as per patient condition.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="sfq2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sfqc2" aria-expanded="false" aria-controls="sfqc2">
                  How long does recovery take?
                </button>
              </h2>
              <div id="sfqc2" class="accordion-collapse collapse" aria-labelledby="sfq2" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body">
                  Recovery time depends on disease stage and patient response. Doctor will guide the timeline.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="sfq3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sfqc3" aria-expanded="false" aria-controls="sfqc3">
                  Can I book a consultation online?
                </button>
              </h2>
              <div id="sfqc3" class="accordion-collapse collapse" aria-labelledby="sfq3" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body">
                  Yes, fill the form and our team will call you for appointment confirmation.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="sfq4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sfqc4" aria-expanded="false" aria-controls="sfqc4">
                  What should I bring or share during consultation?
                </button>
              </h2>
              <div id="sfqc4" class="accordion-collapse collapse" aria-labelledby="sfq4" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body">
                  Share your reports (if any), current medicines, and main symptoms. This helps the doctor guide you better.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="sfq5">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sfqc5" aria-expanded="false" aria-controls="sfqc5">
                  Do you provide online consultation for outstation patients?
                </button>
              </h2>
              <div id="sfqc5" class="accordion-collapse collapse" aria-labelledby="sfq5" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body">
                  Yes. You can share your details on WhatsApp and our team will schedule a call/video consultation as suitable.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="sfq6">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sfqc6" aria-expanded="false" aria-controls="sfqc6">
                  Are there any diet or lifestyle precautions during treatment?
                </button>
              </h2>
              <div id="sfqc6" class="accordion-collapse collapse" aria-labelledby="sfq6" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body">
                  Diet and lifestyle guidance depends on your condition. After consultation, the doctor will suggest a personalised plan.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="sfq7">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sfqc7" aria-expanded="false" aria-controls="sfqc7">
                  When will you contact me after I submit the form?
                </button>
              </h2>
              <div id="sfqc7" class="accordion-collapse collapse" aria-labelledby="sfq7" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body">
                  Usually within a few hours during working time. If you need urgent help, please call or WhatsApp us directly.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="svc-panel h-100">
          <h4 class="svc-panel-title"><i class="bi bi-calendar2-check"></i> Book an Appointment</h4>
          <form method="post" action="">
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
            </div>
            <div class="mb-3">
              <label for="date" class="form-label">Preferred Date</label>
              <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="mb-3">
              <label for="treatment" class="form-label">Treatment (Optional)</label>
              <input type="text" class="form-control" id="treatment" name="treatment" placeholder="E.g. Liver Treatment, Skin Care">
            </div>
            <button type="submit" class="btn btn-danger w-100" style="background:#d63b3b; border:none;">Book Appointment</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>