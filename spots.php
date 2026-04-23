<?php
require __DIR__ . '/includes/data.php';
$page_title = 'Spots — Nomade';
$page_desc = 'Tous les spots du Bassin d\'Arcachon : restos, bars, plages, activités. Les meilleures adresses repérées par la team Nomade.';
$current_page = 'spots';
include __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <span class="label">Nos adresses</span>
        <h1>Tous les <span style="color:var(--sunset-deep);">spots</span><br>du Bassin.</h1>
        <p>Restos, bars, plages, activités. On teste, on sélectionne, on te file les bonnes adresses — classées par envie.</p>
    </div>
</section>

<section class="section spots-section" style="padding-top:40px;">
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
            <article class="spot-card reveal reveal-delay-<?= ($i % 4) + 1 ?>" data-spot-category="<?= htmlspecialchars($sp['category']) ?>">
                <div class="spot-media">
                    <img src="<?= htmlspecialchars($sp['image']) ?>" alt="<?= htmlspecialchars($sp['name']) ?>" loading="lazy">
                    <span class="spot-tag"><?= htmlspecialchars($sp['category_label']) ?> · <?= htmlspecialchars($sp['tag']) ?></span>
                    <span class="spot-price"><?= htmlspecialchars($sp['price_level']) ?></span>
                    <div class="spot-title-overlay">
                        <strong><?= htmlspecialchars($sp['name']) ?></strong>
                        <span>📍 <?= htmlspecialchars($sp['location']) ?></span>
                    </div>
                </div>
                <div class="spot-body">
                    <p><?= htmlspecialchars($sp['description']) ?></p>
                </div>
            </article>
            <?php endforeach; ?>
            <div class="spot-empty" style="display:none;">Aucun spot dans cette catégorie pour le moment.</div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
