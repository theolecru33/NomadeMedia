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

$related = array_slice(array_filter(get_spots_by_category($spots, $sp['category']), fn($s) => $s['id'] !== $sp['id']), 0, 3);

include __DIR__ . '/includes/header.php';
?>

<article class="detail-page">
    <section class="detail-hero-v2">
        <div class="container">
            <a href="spots.php" class="detail-back-v2">← Tous les spots</a>
            <div class="dhv2-grid">
                <div class="dhv2-text">
                    <div class="dhv2-tags-top">
                        <span class="event-cat-pill" style="background: var(--periwinkle-deep);"><?= htmlspecialchars($sp['category_label']) ?></span>
                        <?php if (!empty($sp['sponsored'])): ?>
                        <span class="sponsor-chip">★ Partenaire Nomade</span>
                        <?php endif; ?>
                    </div>
                    <h1 class="dhv2-title"><?= htmlspecialchars($sp['name']) ?></h1>
                    <p class="dhv2-lead"><?= htmlspecialchars($sp['description']) ?></p>
                    <div class="dhv2-meta">
                        <div class="dhv2-meta-item">
                            <em>Où</em>
                            <strong><?= htmlspecialchars($sp['location']) ?></strong>
                        </div>
                        <div class="dhv2-meta-item">
                            <em>Tarif</em>
                            <strong><?= htmlspecialchars($sp['price_level']) ?></strong>
                        </div>
                        <?php if (!empty($sp['phone'])): ?>
                        <div class="dhv2-meta-item">
                            <em>Réserver</em>
                            <strong><a href="tel:<?= htmlspecialchars(str_replace(' ', '', $sp['phone'])) ?>"><?= htmlspecialchars($sp['phone']) ?></a></strong>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($sp['instagram']) && $sp['instagram'] !== '#'): ?>
                    <div class="dhv2-actions">
                        <a href="<?= htmlspecialchars($sp['instagram']) ?>" target="_blank" rel="noopener" class="btn btn-sunset">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/></svg>
                            Voir sur Instagram
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="dhv2-media">
                    <div class="dhv2-photo" style="background-image:url('<?= htmlspecialchars($sp['image']) ?>');">
                        <span class="dhv2-price-stamp"><?= htmlspecialchars($sp['price_level']) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="detail-body-v2">
        <div class="container">
            <div class="dbv2-grid">
                <div class="dbv2-main">
                    <p><?= htmlspecialchars($sp['long_description']) ?></p>
                    <?php if (!empty($sp['tags'])): ?>
                    <div class="detail-tags">
                        <?php foreach ($sp['tags'] as $t): ?>
                            <span class="tag-pill"><?= htmlspecialchars($t) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <aside class="dbv2-aside">
                    <div class="dbv2-card">
                        <h3>📍 Infos pratiques</h3>
                        <ul class="detail-info">
                            <li><span>🏷️</span> <?= htmlspecialchars($sp['category_label']) ?></li>
                            <li><span>📍</span> <?= htmlspecialchars($sp['location']) ?></li>
                            <?php if (!empty($sp['address'])): ?><li><span>🗺️</span> <?= htmlspecialchars($sp['address']) ?></li><?php endif; ?>
                            <?php if (!empty($sp['phone'])): ?><li><span>📞</span> <a href="tel:<?= htmlspecialchars(str_replace(' ', '', $sp['phone'])) ?>"><?= htmlspecialchars($sp['phone']) ?></a></li><?php endif; ?>
                            <li><span>💸</span> <?= htmlspecialchars($sp['price_level']) ?></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    <?php if (!empty($related)): ?>
    <div class="container" style="margin-top: 80px;">
        <div class="section-head reveal">
            <span class="label">À voir aussi</span>
            <h2>Dans la même catégorie</h2>
        </div>
        <div class="spot-grid">
            <?php foreach ($related as $i => $rsp): ?>
            <a href="spot.php?id=<?= urlencode($rsp['id']) ?>" class="spot-card reveal reveal-delay-<?= ($i % 3) + 1 ?><?= !empty($rsp['sponsored']) ? ' is-sponsored' : '' ?>" style="background-image:url('<?= htmlspecialchars($rsp['image']) ?>');">
                <div class="spot-scrim"></div>
                <div class="spot-top">
                    <span class="spot-chip spot-chip-cat"><?= htmlspecialchars($rsp['category_label']) ?></span>
                    <span class="spot-chip spot-chip-price"><?= htmlspecialchars($rsp['price_level']) ?></span>
                </div>
                <div class="spot-bottom">
                    <div class="spot-tags-row">
                        <span class="spot-location">📍 <?= htmlspecialchars($rsp['location']) ?></span>
                        <?php if (!empty($rsp['sponsored'])): ?>
                            <span class="sponsor-chip">★ Partenaire</span>
                        <?php endif; ?>
                    </div>
                    <h3 class="spot-name"><?= htmlspecialchars($rsp['name']) ?></h3>
                    <p class="spot-desc"><?= htmlspecialchars($rsp['description']) ?></p>
                    <div class="spot-tag-row">
                        <?php foreach (array_slice($rsp['tags'], 0, 3) as $t): ?>
                            <span class="tag-pill light"><?= htmlspecialchars($t) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</article>

<?php include __DIR__ . '/includes/footer.php'; ?>
