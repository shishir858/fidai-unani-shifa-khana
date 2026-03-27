<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/blog-functions.php';

$pdo = blog_get_pdo();
$posts = [];
$totalPosts = 0;
$totalPages = 1;
$page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;
$perPage = 6;
$dbError = '';

if ($pdo) {
    try {
        $totalPosts = (int)$pdo->query("SELECT COUNT(*) FROM posts WHERE status='published'")->fetchColumn();
        $totalPages = max(1, (int)ceil($totalPosts / $perPage));
        $offset = ($page - 1) * $perPage;

        $stmt = $pdo->prepare("
            SELECT p.id, p.title, p.slug, p.excerpt, p.created_at, p.published_at, p.featured_image, p.meta_description,
                   (SELECT c.name FROM categories c JOIN post_categories pc ON c.id=pc.category_id WHERE pc.post_id=p.id LIMIT 1) AS category
            FROM posts p
            WHERE p.status = 'published'
            ORDER BY COALESCE(p.published_at, p.created_at) DESC
            LIMIT :limit OFFSET :offset
        ");
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetchAll();
    } catch (Exception $e) {
        $dbError = $e->getMessage();
    }
}

$base = rtrim(BASE_PATH, '/') ? rtrim(BASE_PATH, '/') . '/' : '';
$page_title = 'Health Blog | Fidai Unani Shifa Khana';
$page_description = 'Health tips, Unani treatment insights, and wellness guidance from Fidai Unani Shifa Khana.';
$page_keywords = 'unani health blog, herbal treatment tips, wellness blog, fidai unani';
$page_canonical = rtrim(BASE_URL, '/') . '/blog';
require_once 'includes/header.php';
?>

<main>
<section class="services-hero-section section-bg" style="padding: 54px 0 26px 0; background: linear-gradient(90deg, #e6f2e6 60%, #f8f9fa 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-7">
                <h1 class="display-6 fw-bold" style="color:#1c4307;">Health <span style="color:#d63b3b;">Blog</span></h1>
                <p class="lead mb-0" style="color:#1c4307;max-width:680px;">Unani & herbal wellness tips, lifestyle guidance, and treatment insights.</p>
            </div>
            <div class="col-md-5 text-center mt-3 mt-md-0">
                <img src="assets/images/services/10.webp" alt="Health Blog" class="img-fluid rounded shadow" style="max-height:240px;background:#fff;padding:10px;">
            </div>
        </div>
    </div>
</section>

<section style="padding: 36px 0 54px 0;">
    <div class="container">
        <?php if ($dbError): ?>
        <div class="text-center py-5">
            <p class="text-muted mb-4">Blog is temporarily unavailable. Please try again later.</p>
            <a href="./" class="btn btn-danger">Back to Home</a>
        </div>
        <?php elseif (empty($posts)): ?>
        <div class="text-center py-5">
            <p class="text-muted mb-4">No blog posts yet. Check back soon!</p>
            <a href="./" class="btn btn-danger">Back to Home</a>
        </div>
        <?php else: ?>
        <div class="row g-4">
            <?php foreach ($posts as $post): ?>
            <?php
            $postDate = $post['published_at'] ?? $post['created_at'];
            $dateFormatted = date('M j, Y', strtotime($postDate));
            $excerpt = $post['excerpt'] ?: $post['meta_description'] ?: 'Read more...';
            if (strlen($excerpt) > 160) $excerpt = substr($excerpt, 0, 157) . '...';
            $img = !empty($post['featured_image']) ? ltrim($post['featured_image'], '/') : 'assets/images/backgrounds/1.jpg';
            $category = $post['category'] ?: 'Wellness';
            $readText = blog_est_read_time(($post['excerpt'] ?? '') . ' ' . ($post['meta_description'] ?? ''));
            ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <a href="blog/<?php echo htmlspecialchars($post['slug']); ?>" style="text-decoration:none;">
                        <img src="<?php echo htmlspecialchars($img); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="card-img-top" style="height:190px;object-fit:cover;">
                    </a>
                    <div class="card-body">
                        <div class="d-flex flex-wrap gap-2 mb-2">
                            <span class="badge bg-success"><?php echo htmlspecialchars($category); ?></span>
                            <span class="badge bg-light text-dark"><?php echo htmlspecialchars($dateFormatted); ?></span>
                            <span class="badge bg-light text-dark"><?php echo htmlspecialchars($readText); ?></span>
                        </div>
                        <h5 class="fw-bold" style="color:#1c4307;"><?php echo htmlspecialchars($post['title']); ?></h5>
                        <p class="text-muted mb-0"><?php echo htmlspecialchars($excerpt); ?></p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a class="btn btn-outline-success w-100" href="blog/<?php echo htmlspecialchars($post['slug']); ?>">Read More</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if ($totalPages > 1): ?>
        <nav class="d-flex justify-content-center align-items-center gap-3 mt-4" aria-label="Blog pagination">
            <?php if ($page > 1): ?>
            <a class="btn btn-outline-success" href="blog?page=<?php echo $page - 1; ?>">Previous</a>
            <?php endif; ?>
            <span class="text-muted">Page <?php echo $page; ?> of <?php echo $totalPages; ?></span>
            <?php if ($page < $totalPages): ?>
            <a class="btn btn-outline-success" href="blog?page=<?php echo $page + 1; ?>">Next</a>
            <?php endif; ?>
        </nav>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

</main>

<?php include 'includes/footer.php'; ?>
