<?php
require __DIR__ . '/includes/data.php';
$page_title = 'Les bons spots — Nomade';
$page_desc = 'Tous les spots du Bassin d\'Arcachon : restos, bars, plages, activités. Les meilleures adresses repérées par la team Nomade.';
$current_page = 'spots';
$sponsored = get_sponsored_spots($spots);

// Build a mosaic span map that cycles big/small/tall for a magazine feel
$span_cycle = ['col-2 row-2', '', '', 'col-2', '', 'row-2', '', '', 'col-2 row-2', '', ''];

include __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <div class="section-eyebrow">carnet d'adresses</div>
        <h1 class="font-hand">Tous les <span class="accent">bons spots</span><br>du Bassin.</h1>
        <p>Restos, bars, plages, activités. On teste, on sélectionne, on te file les bonnes adresses — sans filtre, juste ce qu'on aime.</p>
    </div>
</section>

<?php if (!empty($sponsored)): ?>
<section class="section sponsor-section" style="padding: 20px 0 40px;">
    <div class="container">
        <div class="section-head reveal">
            <div class="section-head-left">
                <div class="section-eyebrow">★ mise en avant</div>
                <h2 class="section-title">Les <span class="circle-hand">partenaires</span> du moment.</h2>
            </div>
            <div class="section-right">
                Des adresses qui nous soutiennent — et qu'on te recommande les yeux fermés.
            </div>
        </div>
        <div class="sponsor-row">
            <?php foreach ($sponsored as $i => $sp): ?>
            <a href="spot.php?id=<?= urlencode($sp['id']) ?>" class="sponsor-card reveal reveal-delay-<?= ($i % 3) + 1 ?>">
                <div class="sponsor-card-photo">
                    <img src="<?= htmlspecialchars($sp['image']) ?>" alt="<?= htmlspecialchars($sp['name']) ?>" loading="lazy">
                    <span class="sponsor-card-ribbon">★ Partenaire</span>
                </div>
                <div class="sponsor-card-body">
                    <div class="sponsor-card-title"><?= htmlspecialchars($sp['name']) ?></div>
                    <div class="sponsor-card-loc"><?= htmlspecialchars($sp['category_label']) ?> · <?= htmlspecialchars($sp['location']) ?></div>
                    <p class="sponsor-card-desc"><?= htmlspecialchars($sp['description']) ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="section" style="padding-top: 20px;">
    <div class="container">
        <div class="section-head reveal">
            <div class="section-head-left">
                <div class="section-eyebrow">le classement</div>
                <h2 class="section-title">Filtre par <span class="circle-hand">envie</span>.</h2>
            </div>
            <div class="pills-row" data-spot-filter>
                <button class="pill active" data-category="all">Tout (<?= count($spots) ?>)</button>
                <button class="pill" data-category="plage"><span class="emoji">🏖️</span> Plages (<?= count(get_spots_by_category($spots, 'plage')) ?>)</button>
                <button class="pill" data-category="resto"><span class="emoji">🍽️</span> Restos (<?= count(get_spots_by_category($spots, 'resto')) ?>)</button>
                <button class="pill" data-category="bar"><span class="emoji">🍹</span> Bars (<?= count(get_spots_by_category($spots, 'bar')) ?>)</button>
                <button class="pill" data-category="activite"><span class="emoji">🪂</span> Activités (<?= count(get_spots_by_category($spots, 'activite')) ?>)</button>
            </div>
        </div>

        <div class="mosaic" data-spot-grid>
            <?php foreach ($spots as $i => $sp):
                $spans = $span_cycle[$i % count($span_cycle)] ?? '';
            ?>
            <a href="spot.php?id=<?= urlencode($sp['id']) ?>" class="tile <?= $spans ?> reveal" data-spot-category="<?= htmlspecialchars($sp['category']) ?>">
                <div class="tile-cover" style="background-image:url('<?= htmlspecialchars($sp['image']) ?>');"></div>
                <div class="tile-veil"></div>
                <span class="tile-cat"><?= htmlspecialchars($sp['category_label']) ?></span>
                <?php if (!empty($sp['sponsored'])): ?><span class="tile-sponsor">★ Sponso</span><?php endif; ?>
                <h4 class="tile-title"><?= htmlspecialchars($sp['name']) ?></h4>
                <span class="tile-sub"><?= htmlspecialchars($sp['location']) ?></span>
                <span class="tile-price"><?= htmlspecialchars($sp['price_level']) ?></span>
            </a>
            <?php endforeach; ?>
            <div class="spot-empty" style="display:none; grid-column:1/-1; text-align:center; padding:60px; font-family:var(--font-hand); font-size:1.6rem; color:var(--lagoon-ink);">Aucun spot dans cette catégorie 🤷</div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
