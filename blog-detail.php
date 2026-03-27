<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/blog-functions.php';

$post_slug = $_GET['post'] ?? '';
if (empty($post_slug)) {
    header('Location: blog');
    exit;
}

$post = null;
$others = [];
$pdo = blog_get_pdo();

if ($pdo) {
    try {
        $stmt = $pdo->prepare("
            SELECT p.id, p.title, p.slug, p.content, p.excerpt, p.featured_image, p.featured_image_alt,
                   p.created_at, p.updated_at, p.published_at, p.meta_title, p.meta_keywords, p.meta_description,
                   p.canonical_url, p.index_status, p.schema_type, p.schema_organization, p.schema_logo,
                   (SELECT c.name FROM categories c JOIN post_categories pc ON c.id=pc.category_id WHERE pc.post_id=p.id LIMIT 1) AS category
            FROM posts p
            WHERE p.slug = ? AND p.status = 'published'
        ");
        $stmt->execute([$post_slug]);
        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($post) {
            $relatedStmt = $pdo->prepare("
                SELECT p.id, p.title, p.slug, p.excerpt, p.featured_image, p.published_at, p.created_at,
                       (SELECT c.name FROM categories c JOIN post_categories pc ON c.id=pc.category_id WHERE pc.post_id=p.id LIMIT 1) AS category
                FROM posts p
                WHERE p.status = 'published' AND p.id != ?
                ORDER BY COALESCE(p.published_at, p.created_at) DESC
                LIMIT 2
            ");
            $relatedStmt->execute([$post['id']]);
            $others = $relatedStmt->fetchAll();
        }
    } catch (Exception $e) {
        $post = null;
    }
}

if (!$post) {
    header('Location: blog');
    exit;
}

$page_title = $post['meta_title'] ?: $post['title'];
$page_description = $post['meta_description'] ?: $post['excerpt'];
$page_keywords = !empty($post['meta_keywords']) ? $post['meta_keywords'] : null;
$page_robots = (!empty($post['index_status']) && $post['index_status'] === 'noindex') ? 'noindex, nofollow' : null;
$page_canonical = !empty($post['canonical_url']) ? $post['canonical_url'] : (rtrim(BASE_URL, '/') . '/blog/' . $post['slug']);
$postDate = $post['published_at'] ?? $post['created_at'];
$dateFormatted = date('M j, Y', strtotime($postDate));
$readTime = blog_est_read_time($post['content']);
$featuredImg = !empty($post['featured_image']) ? ltrim($post['featured_image'], '/') : 'assets/images/backgrounds/2.jpg';
$schemaType = !empty($post['schema_type']) ? $post['schema_type'] : 'BlogPosting';
$schemaOrg = !empty($post['schema_organization']) ? $post['schema_organization'] : 'Fidai Unani Shifa Khana';
$schemaLogo = !empty($post['schema_logo']) ? $post['schema_logo'] : (rtrim(BASE_URL, '/') . '/assets/images/favicon/favicon.PNG');
$schemaImage = (strpos($featuredImg, 'http') === 0) ? $featuredImg : (rtrim(BASE_URL, '/') . '/' . ltrim($featuredImg, '/'));
$extra_head = '<script type="application/ld+json">' . json_encode([
    '@context' => 'https://schema.org',
    '@type' => $schemaType,
    'headline' => $post['title'],
    'description' => $page_description,
    'datePublished' => $postDate,
    'dateModified' => $post['updated_at'] ?? $postDate,
    'image' => $schemaImage,
    'publisher' => ['@type' => 'Organization', 'name' => $schemaOrg, 'logo' => ['@type' => 'ImageObject', 'url' => $schemaLogo]],
    'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $page_canonical]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
$category = $post['category'] ?: 'Wellness';

require_once 'includes/header.php';
?>

<main>
<section class="services-hero-section section-bg" style="padding: 54px 0 26px 0; background: linear-gradient(90deg, #e6f2e6 60%, #f8f9fa 100%);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-8">
        <div class="d-flex flex-wrap gap-2 mb-2">
          <span class="badge bg-success"><?php echo htmlspecialchars($category); ?></span>
          <span class="badge bg-light text-dark"><?php echo htmlspecialchars($dateFormatted); ?></span>
          <span class="badge bg-light text-dark"><?php echo htmlspecialchars($readTime); ?></span>
        </div>
        <h1 class="display-6 fw-bold" style="color:#1c4307;"><?php echo htmlspecialchars($post['title']); ?></h1>
        <?php if (!empty($post['excerpt'])): ?>
          <p class="lead mb-0" style="color:#1c4307;max-width:900px;"><?php echo htmlspecialchars($post['excerpt']); ?></p>
        <?php endif; ?>
      </div>
      <div class="col-md-4 text-center mt-3 mt-md-0">
        <img src="<?php echo htmlspecialchars($featuredImg); ?>" alt="<?php echo htmlspecialchars($post['featured_image_alt'] ?: $post['title']); ?>" class="img-fluid rounded shadow" style="max-height:220px;background:#fff;padding:10px;object-fit:cover;">
      </div>
    </div>
  </div>
</section>

<section style="padding: 34px 0 54px 0;">
  <div class="container">
    <div class="card border-0 shadow-sm">
      <div class="card-body p-4">
        <div class="blog-article-content">
          <?php echo blog_fix_content_images($post['content'] ?? ''); ?>
        </div>
        <div class="d-flex flex-wrap gap-2 mt-4">
          <a href="blog" class="btn btn-outline-success">Back to Blog</a>
          <a href="contact" class="btn btn-danger">Book Appointment</a>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>
