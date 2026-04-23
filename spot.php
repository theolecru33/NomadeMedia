<?php
require __DIR__ . '/includes/data.php';
$id = $_GET['id'] ?? '';
$sp = find_spot($spots, $id);
if (!$sp) {
    header('Location: spots.php');
    exit;
}
$page_title = $sp['name'] . ' · Nomade';
$page_desc = $sp['description'];
$current_page = 'spots';

// Related spots (same category, not this one)
$related = array_slice(array_filter(get_spots_by_category($spots, $sp['category']), fn($s) => $s['id'] !== $sp['id']), 0, 3);

include __DIR__ . '/includes/header.php';
?>

<article class="detail-page">
    <div class="detail-hero" style="background-image:url('<?= htmlspecialchars($sp['image']) ?>');">
        <div class="detail-hero-overlay"></div>
        <div class="container detail-hero-inner">
            <a href="spots.php" class="detail-back">← Tous les spots</a>
            <?php if (!empty($sp['sponsored'])): ?>
            <span class="spot-sponsor-badge" style="position:relative; top:auto; right:auto; margin-bottom:8px;">★ Partenaire Nomade</span>
            <?php endif; ?>
            <span class="spot-tag" style="position:relative; top:auto; left:auto; margin-bottom:12px;"><?= htmlspecialchars($sp['category_label']) ?> · <?= htmlspecialchars($sp['price_level']) ?></span>
            <h1 class="detail-title"><?= htmlspecialchars($sp['name']) ?></h1>
            <div class="detail-tags">
                <?php foreach ($sp['tags'] as $t): ?>
                    <span class="tag-pill light"><?= htmlspecialchars($t) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="container detail-body">
        <div class="detail-main">
            <p class="detail-lead"><?= htmlspecialchars($sp['description']) ?></p>
            <p><?= htmlspecialchars($sp['long_description']) ?></p>
        </div>

        <aside class="detail-aside">
            <div class="detail-card">
                <h3>📍 Infos</h3>
                <ul class="detail-info">
                    <li><span>🏷️</span> <?= htmlspecialchars($sp['category_label']) ?></li>
                    <li><span>📍</span> <?= htmlspecialchars($sp['location']) ?></li>
                    <?php if (!empty($sp['address'])): ?><li><span>🗺️</span> <?= htmlspecialchars($sp['address']) ?></li><?php endif; ?>
                    <?php if (!empty($sp['phone'])): ?><li><span>📞</span> <a href="tel:<?= htmlspecialchars(str_replace(' ', '', $sp['phone'])) ?>"><?= htmlspecialchars($sp['phone']) ?></a></li><?php endif; ?>
                    <li><span>💸</span> <?= htmlspecialchars($sp['price_level']) ?></li>
                </ul>
                <?php if (!empty($sp['instagram']) && $sp['instagram'] !== '#'): ?>
                <a href="<?= htmlspecialchars($sp['instagram']) ?>" target="_blank" rel="noopener" class="btn btn-sunset" style="width:100%; justify-content:center; margin-top:16px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/></svg>
                    Voir sur Instagram
                </a>
                <?php endif; ?>
            </div>
        </aside>
    </div>

    <?php if (!empty($related)): ?>
    <div class="container" style="margin-top: 80px;">
        <div class="section-head reveal">
            <span class="label">À voir aussi</span>
            <h2>Dans la même catégorie</h2>
        </div>
        <div class="spot-grid">
            <?php foreach ($related as $i => $rsp): ?>
            <a href="spot.php?id=<?= urlencode($rsp['id']) ?>" class="spot-card reveal reveal-delay-<?= $i + 1 ?>">
                <div class="spot-media">
                    <img src="<?= htmlspecialchars($rsp['image']) ?>" alt="<?= htmlspecialchars($rsp['name']) ?>" loading="lazy">
                    <span class="spot-tag"><?= htmlspecialchars($rsp['category_label']) ?></span>
                    <span class="spot-price"><?= htmlspecialchars($rsp['price_level']) ?></span>
                    <?php if (!empty($rsp['sponsored'])): ?><span class="spot-sponsor-badge">★ Sponso</span><?php endif; ?>
                    <div class="spot-title-overlay">
                        <strong><?= htmlspecialchars($rsp['name']) ?></strong>
                        <span>📍 <?= htmlspecialchars($rsp['location']) ?></span>
                    </div>
                </div>
                <div class="spot-body">
                    <div class="spot-tags">
                        <?php foreach (array_slice($rsp['tags'], 0, 3) as $t): ?>
                            <span class="tag-pill"><?= htmlspecialchars($t) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <p><?= htmlspecialchars($rsp['description']) ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</article>

<?php include __DIR__ . '/includes/footer.php'; ?>
