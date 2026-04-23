<?php
require __DIR__ . '/includes/data.php';
$id = $_GET['id'] ?? '';
$ev = find_event($events, $id);
if (!$ev) {
    header('Location: evenements.php');
    exit;
}
$page_title = $ev['title'] . ' — Nomade';
$page_desc = $ev['description'];
$current_page = 'evenements';
$cat = $event_categories[$ev['category']] ?? null;
$d = new DateTime($ev['date']);
$day = $d->format('d');
$month = strtoupper(strftime_fr($d->format('n')));

// Related events (same category, not this one)
$related = array_slice(array_values(array_filter(get_events_by_category($events, $ev['category']), fn($e) => $e['id'] !== $ev['id'])), 0, 3);

$tape_styles = [
    'top:-10px; left:50%; transform:translateX(-50%) rotate(-3deg);',
    'top:-10px; right:12px; transform: rotate(6deg);',
    'top:-10px; left:14px; transform: rotate(-8deg);',
];
$tape_classes = ['tape', 'tape tape-blue', 'tape'];
$rotations = ['rot-1', 'rot-2', 'rot-3'];

include __DIR__ . '/includes/header.php';
?>

<article class="detail-page">
    <div class="detail-hero" style="background-image:url('<?= htmlspecialchars($ev['image']) ?>');">
        <div class="detail-hero-overlay"></div>
        <div class="container detail-hero-inner">
            <a href="evenements.php" class="detail-back">← Tous les événements</a>
            <?php if ($cat): ?>
            <div style="margin-bottom: 10px;">
                <span class="tag-pill light" style="background: <?= $cat['color'] ?>; color: var(--paper); border-color: transparent;"><?= $cat['emoji'] ?> <?= htmlspecialchars($cat['label']) ?></span>
            </div>
            <?php endif; ?>
            <h1 class="detail-title"><?= htmlspecialchars($ev['title']) ?></h1>
            <div class="detail-tags">
                <?php foreach ($ev['tags'] ?? [] as $t): ?>
                    <span class="tag-pill light"><?= htmlspecialchars($t) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="container detail-body">
        <div class="detail-main">
            <p class="detail-lead"><?= htmlspecialchars($ev['description']) ?></p>
            <p><?= htmlspecialchars($ev['long_description']) ?></p>

            <?php if (!empty($ev['url']) && $ev['url'] !== '#'): ?>
            <a href="<?= htmlspecialchars($ev['url']) ?>" target="_blank" rel="noopener" class="btn btn-coral" style="margin-top:20px;">
                Site officiel / Billetterie
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <?php endif; ?>
        </div>

        <aside class="detail-aside">
            <div class="detail-card">
                <span class="tape" style="top:-12px; left:50%; transform:translateX(-50%) rotate(-2deg);"></span>
                <div style="display:flex; align-items:baseline; gap:14px; margin-bottom: 4px;">
                    <span class="font-hand" style="font-size: 3.4rem; line-height:1; color:var(--coral-deep);"><?= $day ?></span>
                    <span class="font-hand" style="font-size: 1.6rem; color:var(--lagoon-ink);"><?= $month ?></span>
                </div>
                <h3><?= htmlspecialchars($ev['date_label']) ?></h3>
                <ul class="detail-info">
                    <li><span>⏰</span> <?= htmlspecialchars($ev['time']) ?></li>
                    <li><span>📍</span> <?= htmlspecialchars($ev['location']) ?></li>
                    <li><span>💸</span> <?= htmlspecialchars($ev['price_full']) ?></li>
                </ul>
            </div>
        </aside>
    </div>

    <?php if (!empty($related)): ?>
    <div class="container" style="margin-top: 80px;">
        <div class="section-head reveal">
            <div class="section-head-left">
                <div class="section-eyebrow">à voir aussi</div>
                <h2 class="section-title">Dans la même <span class="circle-hand">vibe</span>.</h2>
            </div>
        </div>
        <div class="polaroid-grid">
            <?php foreach ($related as $i => $rev):
                $rcat = $event_categories[$rev['category']] ?? null;
                $rot = $rotations[$i % 3];
                $tape_cls = $tape_classes[$i % 3];
                $tape_style = $tape_styles[$i % 3];
            ?>
            <a href="event.php?id=<?= urlencode($rev['id']) ?>" class="polaroid <?= $rot ?> reveal reveal-delay-<?= $i + 1 ?>">
                <span class="<?= $tape_cls ?>" style="<?= $tape_style ?>"></span>
                <div class="polaroid-photo">
                    <img src="<?= htmlspecialchars($rev['image']) ?>" alt="<?= htmlspecialchars($rev['title']) ?>" loading="lazy">
                    <span class="polaroid-label"><?= htmlspecialchars($rev['location_tag']) ?></span>
                    <?php if ($rcat): ?><span class="polaroid-cat"><?= $rcat['emoji'] ?> <?= htmlspecialchars($rcat['label']) ?></span><?php endif; ?>
                </div>
                <div class="polaroid-text">
                    <span class="title"><?= htmlspecialchars($rev['title']) ?></span>
                    <span class="meta"><?= htmlspecialchars($rev['location']) ?> · <?= htmlspecialchars($rev['date_label']) ?></span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</article>

<?php include __DIR__ . '/includes/footer.php'; ?>
