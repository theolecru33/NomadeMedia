<?php
require __DIR__ . '/includes/data.php';
$id = $_GET['id'] ?? '';
$sp = find_spot($spots, $id);
if (!$sp) {
    header('Location: spots.php');
    exit;
}
$page_title = $sp['name'] . ' — Nomade';
$page_desc = $sp['description'];
$current_page = 'spots';

// Related spots (same category, not this one)
$related = array_slice(array_values(array_filter(get_spots_by_category($spots, $sp['category']), fn($s) => $s['id'] !== $sp['id'])), 0, 4);

include __DIR__ . '/includes/header.php';
?>

<article class="detail-page">
    <div class="detail-hero" style="background-image:url('<?= htmlspecialchars($sp['image']) ?>');">
        <div class="detail-hero-overlay"></div>
        <div class="container detail-hero-inner">
            <a href="spots.php" class="detail-back">← Tous les spots</a>
            <div style="margin-bottom: 10px; display:flex; gap:8px; flex-wrap:wrap;">
                <?php if (!empty($sp['sponsored'])): ?>
                <span class="tag-pill light" style="background: var(--coral); color: var(--paper); border-color: transparent;">★ Partenaire Nomade</span>
                <?php endif; ?>
                <span class="tag-pill light"><?= htmlspecialchars($sp['category_label']) ?> · <?= htmlspecialchars($sp['price_level']) ?></span>
            </div>
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
                <span class="tape" style="top:-12px; left:50%; transform:translateX(-50%) rotate(-2deg);"></span>
                <h3>📍 Infos pratiques</h3>
                <ul class="detail-info">
                    <li><span>🏷️</span> <?= htmlspecialchars($sp['category_label']) ?></li>
                    <li><span>📍</span> <?= htmlspecialchars($sp['location']) ?></li>
                    <?php if (!empty($sp['address'])): ?><li><span>🗺️</span> <?= htmlspecialchars($sp['address']) ?></li><?php endif; ?>
                    <?php if (!empty($sp['phone'])): ?><li><span>📞</span> <a href="tel:<?= htmlspecialchars(str_replace(' ', '', $sp['phone'])) ?>"><?= htmlspecialchars($sp['phone']) ?></a></li><?php endif; ?>
                    <li><span>💸</span> <?= htmlspecialchars($sp['price_level']) ?></li>
                </ul>
                <?php if (!empty($sp['instagram']) && $sp['instagram'] !== '#'): ?>
                <a href="<?= htmlspecialchars($sp['instagram']) ?>" target="_blank" rel="noopener" class="btn btn-coral" style="width:100%; justify-content:center; margin-top:16px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
                    Voir sur Instagram
                </a>
                <?php endif; ?>
            </div>
        </aside>
    </div>

    <?php if (!empty($related)): ?>
    <div class="container" style="margin-top: 80px;">
        <div class="section-head reveal">
            <div class="section-head-left">
                <div class="section-eyebrow">à voir aussi</div>
                <h2 class="section-title">Dans la même <span class="circle-hand">catégorie</span>.</h2>
            </div>
        </div>
        <div class="mosaic">
            <?php
            $rel_spans = ['col-2 row-2', '', '', 'col-2'];
            foreach ($related as $i => $rsp):
                $spans = $rel_spans[$i] ?? '';
            ?>
            <a href="spot.php?id=<?= urlencode($rsp['id']) ?>" class="tile <?= $spans ?> reveal reveal-delay-<?= $i + 1 ?>">
                <div class="tile-cover" style="background-image:url('<?= htmlspecialchars($rsp['image']) ?>');"></div>
                <div class="tile-veil"></div>
                <span class="tile-cat"><?= htmlspecialchars($rsp['category_label']) ?></span>
                <?php if (!empty($rsp['sponsored'])): ?><span class="tile-sponsor">★ Sponso</span><?php endif; ?>
                <h4 class="tile-title"><?= htmlspecialchars($rsp['name']) ?></h4>
                <span class="tile-sub"><?= htmlspecialchars($rsp['location']) ?></span>
                <span class="tile-price"><?= htmlspecialchars($rsp['price_level']) ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</article>

<?php include __DIR__ . '/includes/footer.php'; ?>
