
<?php 
require_once 'admin/includes/config.php';
$slug = isset($_GET['service']) ? mysqli_real_escape_string($conn, $_GET['service']) : '';
$service = false;
if($slug) {
  $result = mysqli_query($conn, "SELECT * FROM treatments WHERE slug='$slug' AND status='active' LIMIT 1");
  if($result && mysqli_num_rows($result) > 0) {
    $service = mysqli_fetch_assoc($result);
  }
}
include 'includes/form-handler.php';
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
        <p class="lead" style="color:#1c4307;">
          <?php echo htmlspecialchars($service['short_description']); ?>
        </p>
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
<!-- Service Details Content Section -->
<section class="service-details-content-section" style="padding: 48px 0 32px 0;">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="card shadow-sm border-0 p-4 mb-4">
          <h3 class="fw-bold mb-3" style="color:#1c4307;">About This Service</h3>
          <div class="mb-3 text-muted" style="font-size:1.13rem;">
            <?php echo nl2br(htmlspecialchars($service['full_description'])); ?>
          </div>
          <!-- Key Features, Care Plans, Core Values, Health Tips -->
          <div class="row g-4 mb-4">
            <?php if(!empty($service['features'])): ?>
            <div class="col-md-12">
              <div class="mb-3">
                <h4 class="fw-bold mb-3" style="color:#1c4307;"><i class="bi bi-stars"></i> Key Features</h4>
                <div class="d-flex flex-wrap gap-3">
                  <?php 
                  $featureIcons = ['bi-shield-check', 'bi-droplet-half', 'bi-battery-charging', 'bi-flower2', 'bi-emoji-smile', 'bi-heart-pulse', 'bi-sun', 'bi-leaf'];
                  $features = array_filter(array_map('trim', explode("\n", $service['features'])));
                  foreach($features as $i => $feature): 
                  ?>
                  <div class="feature-modern-card p-3 px-4 rounded shadow-sm d-flex align-items-center" style="background:linear-gradient(90deg,#e6f2e6 70%,#f8f9fa 100%); min-width:220px;">
                    <span class="me-3 fs-3 text-success"><i class="bi <?php echo $featureIcons[$i%count($featureIcons)]; ?>"></i></span>
                    <span class="fw-semibold text-dark"> <?php echo htmlspecialchars($feature); ?> </span>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if(!empty($service['care_plans'])): ?>
            <div class="col-md-12">
              <div class="mb-3">
                <h4 class="fw-bold mb-3" style="color:#1c4307;"><i class="bi bi-heart-pulse"></i> Care Plans</h4>
                <div class="d-flex flex-wrap gap-3">
                  <?php 
                  $planIcons = ['bi-lungs', 'bi-droplet', 'bi-capsule', 'bi-activity', 'bi-clipboard2-heart', 'bi-clipboard2-pulse', 'bi-clipboard2-check', 'bi-clipboard2-data'];
                  $carePlans = array_filter(array_map('trim', explode("\n", $service['care_plans'])));
                  foreach($carePlans as $i => $plan): 
                  ?>
                  <div class="feature-modern-card p-3 px-4 rounded shadow-sm d-flex align-items-center" style="background:linear-gradient(90deg,#f8f9fa 60%,#e6f2e6 100%); min-width:220px;">
                    <span class="me-3 fs-3 text-danger"><i class="bi <?php echo $planIcons[$i%count($planIcons)]; ?>"></i></span>
                    <span class="fw-semibold text-dark"> <?php echo htmlspecialchars($plan); ?> </span>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if(!empty($service['core_values'])): ?>
            <div class="col-md-12">
              <div class="mb-3">
                <h4 class="fw-bold mb-3" style="color:#1c4307;"><i class="bi bi-gem"></i> Our Core Values</h4>
                <div class="d-flex flex-wrap gap-3">
                  <?php 
                  $coreIcons = ['bi-gem', 'bi-lightbulb', 'bi-people', 'bi-award', 'bi-globe', 'bi-emoji-heart-eyes', 'bi-star', 'bi-shield-lock'];
                  $coreValues = array_filter(array_map('trim', explode("\n", $service['core_values'])));
                  foreach($coreValues as $i => $value): 
                  ?>
                  <div class="feature-modern-card p-3 px-4 rounded shadow-sm d-flex align-items-center" style="background:linear-gradient(90deg,#e6f2e6 70%,#f8f9fa 100%); min-width:220px;">
                    <span class="me-3 fs-3 text-primary"><i class="bi <?php echo $coreIcons[$i%count($coreIcons)]; ?>"></i></span>
                    <span class="fw-semibold text-dark"> <?php echo htmlspecialchars($value); ?> </span>
                  </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
          <!-- Medical Details -->
          <div class="row g-3">
            <?php if(!empty($service['symptoms'])): ?>
            <div class="col-md-6">
              <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                  <h5 class="fw-bold mb-2" style="color:#d63b3b;"><i class="bi bi-exclamation-triangle"></i> Symptoms</h5>
                  <div class="text-muted"> <?php echo nl2br(htmlspecialchars($service['symptoms'])); ?> </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if(!empty($service['causes'])): ?>
            <div class="col-md-6">
              <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                  <h5 class="fw-bold mb-2" style="color:#d63b3b;"><i class="bi bi-bug"></i> Causes</h5>
                  <div class="text-muted"> <?php echo nl2br(htmlspecialchars($service['causes'])); ?> </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if(!empty($service['procedure'])): ?>
            <div class="col-md-6">
              <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                  <h5 class="fw-bold mb-2" style="color:#d63b3b;"><i class="bi bi-gear"></i> Procedure</h5>
                  <div class="text-muted"> <?php echo nl2br(htmlspecialchars($service['procedure'])); ?> </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if(!empty($service['medicines'])): ?>
            <div class="col-md-6">
              <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                  <h5 class="fw-bold mb-2" style="color:#d63b3b;"><i class="bi bi-capsule"></i> Medicines</h5>
                  <div class="text-muted"> <?php echo nl2br(htmlspecialchars($service['medicines'])); ?> </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if(!empty($service['duration'])): ?>
            <div class="col-md-6">
              <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                  <h5 class="fw-bold mb-2" style="color:#d63b3b;"><i class="bi bi-clock-history"></i> Duration</h5>
                  <div class="text-muted"> <?php echo nl2br(htmlspecialchars($service['duration'])); ?> </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if(!empty($service['side_effects'])): ?>
            <div class="col-md-6">
              <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                  <h5 class="fw-bold mb-2" style="color:#d63b3b;"><i class="bi bi-shield-exclamation"></i> Side Effects</h5>
                  <div class="text-muted"> <?php echo nl2br(htmlspecialchars($service['side_effects'])); ?> </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if(!empty($service['precautions'])): ?>
            <div class="col-md-6">
              <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                  <h5 class="fw-bold mb-2" style="color:#d63b3b;"><i class="bi bi-shield-check"></i> Precautions</h5>
                  <div class="text-muted"> <?php echo nl2br(htmlspecialchars($service['precautions'])); ?> </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card shadow-sm border-0 p-4 mb-4">
          <h5 class="fw-bold mb-3" style="color:#1c4307;">Book an Appointment</h5>
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