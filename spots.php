<?php
require __DIR__ . '/includes/data.php';
$page_title = 'Spots — Nomade';
$page_desc = 'Tous les spots du Bassin d\'Arcachon : restos, bars, plages, activités. Les meilleures adresses repérées par la team Nomade.';
$current_page = 'spots';
$sponsored = get_sponsored_spots($spots);
include __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <span class="label">Nos adresses</span>
        <h1>Tous les <span style="color:var(--sunset-deep);">spots</span><br>du Bassin.</h1>
        <p>Restos, bars, plages, activités. On teste, on sélectionne, on te file les bonnes adresses — classées par envie.</p>
    </div>
</section>

<?php if (!empty($sponsored)): ?>
<section class="section sponsor-section" style="padding: 60px 0 20px;">
    <div class="container">
        <div class="sponsor-head reveal">
            <span class="sponsor-label">★ Mise en avant</span>
            <h2>Nos partenaires du moment</h2>
            <p>Des adresses qu'on aime, qui nous soutiennent — et qu'on te recommande les yeux fermés.</p>
        </div>
        <div class="sponsor-grid">
            <?php foreach ($sponsored as $i => $sp): ?>
            <a href="spot.php?id=<?= urlencode($sp['id']) ?>" class="sponsor-card reveal reveal-delay-<?= ($i % 3) + 1 ?>">
                <div class="sponsor-media">
                    <img src="<?= htmlspecialchars($sp['image']) ?>" alt="<?= htmlspecialchars($sp['name']) ?>" loading="lazy">
                    <span class="sponsor-ribbon">★ Partenaire</span>
                </div>
                <div class="sponsor-body">
                    <span class="sponsor-cat"><?= htmlspecialchars($sp['category_label']) ?> · <?= htmlspecialchars($sp['location']) ?></span>
                    <h3><?= htmlspecialchars($sp['name']) ?></h3>
                    <p><?= htmlspecialchars($sp['description']) ?></p>
                    <div class="spot-tags">
                        <?php foreach (array_slice($sp['tags'], 0, 3) as $t): ?>
                            <span class="tag-pill"><?= htmlspecialchars($t) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="section spots-section" style="padding-top:60px;">
    <div class="container">
        <div class="category-tabs">
            <button class="category-tab active" data-category="all"><span class="emoji">✨</span> Tout (<?= count($spots) ?>)</button>
            <button class="category-tab" data-category="resto"><span class="emoji">🍽️</span> Restos (<?= count(get_spots_by_category($spots, 'resto')) ?>)</button>
            <button class="category-tab" data-category="bar"><span class="emoji">🍹</span> Bars (<?= count(get_spots_by_category($spots, 'bar')) ?>)</button>
            <button class="category-tab" data-category="plage"><span class="emoji">🏖️</span> Plages (<?= count(get_spots_by_category($spots, 'plage')) ?>)</button>
            <button class="category-tab" data-category="activite"><span class="emoji">🪂</span> Activités (<?= count(get_spots_by_category($spots, 'activite')) ?>)</button>
        </div>

        <div class="spot-grid" data-spot-grid>
            <?php foreach ($spots as $i => $sp): ?>
            <a href="spot.php?id=<?= urlencode($sp['id']) ?>" class="spot-card reveal reveal-delay-<?= ($i % 4) + 1 ?>" data-spot-category="<?= htmlspecialchars($sp['category']) ?>">
                <div class="spot-media">
                    <img src="<?= htmlspecialchars($sp['image']) ?>" alt="<?= htmlspecialchars($sp['name']) ?>" loading="lazy">
                    <span class="spot-tag"><?= htmlspecialchars($sp['category_label']) ?></span>
                    <span class="spot-price"><?= htmlspecialchars($sp['price_level']) ?></span>
                    <?php if (!empty($sp['sponsored'])): ?><span class="spot-sponsor-badge">★ Sponso</span><?php endif; ?>
                    <div class="spot-title-overlay">
                        <strong><?= htmlspecialchars($sp['name']) ?></strong>
                        <span>📍 <?= htmlspecialchars($sp['location']) ?></span>
                    </div>
                </div>
                <div class="spot-body">
                    <div class="spot-tags">
                        <?php foreach (array_slice($sp['tags'], 0, 4) as $t): ?>
                            <span class="tag-pill"><?= htmlspecialchars($t) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <p><?= htmlspecialchars($sp['description']) ?></p>
                </div>
            </a>
            <?php endforeach; ?>
            <div class="spot-empty" style="display:none;">Aucun spot dans cette catégorie pour le moment.</div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
