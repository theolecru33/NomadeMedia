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
$related = array_slice(array_filter(get_events_by_category($events, $ev['category']), fn($e) => $e['id'] !== $ev['id']), 0, 3);

include __DIR__ . '/includes/header.php';
?>

<article class="detail-page">
    <div class="detail-hero" style="background-image:url('<?= htmlspecialchars($ev['image']) ?>');">
        <div class="detail-hero-overlay"></div>
        <div class="container detail-hero-inner">
            <a href="evenements.php" class="detail-back">← Tous les événements</a>
            <?php if ($cat): ?>
            <span class="event-cat-pill" style="background: <?= $cat['color'] ?>;"><?= $cat['emoji'] ?> <?= htmlspecialchars($cat['label']) ?></span>
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
            <a href="<?= htmlspecialchars($ev['url']) ?>" target="_blank" rel="noopener" class="btn btn-sunset" style="margin-top:20px;">
                Site officiel / Billetterie
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <?php endif; ?>
        </div>

        <aside class="detail-aside">
            <div class="detail-card">
                <div class="detail-date-big">
                    <strong><?= $day ?></strong>
                    <span><?= $month ?></span>
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
            <span class="label">À voir aussi</span>
            <h2>Dans la même catégorie</h2>
        </div>
        <div class="event-grid">
            <?php foreach ($related as $i => $rev):
                $rd = new DateTime($rev['date']);
                $rday = $rd->format('d');
                $rmonth = strtoupper(strftime_fr($rd->format('n')));
                $rcat = $event_categories[$rev['category']] ?? null;
            ?>
            <a href="event.php?id=<?= urlencode($rev['id']) ?>" class="event-card reveal reveal-delay-<?= $i + 1 ?>">
                <div class="event-media">
                    <img src="<?= htmlspecialchars($rev['image']) ?>" alt="<?= htmlspecialchars($rev['title']) ?>" loading="lazy">
                    <div class="event-date-badge"><strong><?= $rday ?></strong><span><?= $rmonth ?></span></div>
                    <span class="event-tag"><?= htmlspecialchars($rev['price']) ?></span>
                    <?php if ($rcat): ?>
                    <span class="event-cat-pill" style="background: <?= $rcat['color'] ?>;"><?= $rcat['emoji'] ?> <?= htmlspecialchars($rcat['label']) ?></span>
                    <?php endif; ?>
                </div>
                <div class="event-body">
                    <h3><?= htmlspecialchars($rev['title']) ?></h3>
                    <p class="event-desc"><?= htmlspecialchars($rev['description']) ?></p>
                    <div class="event-meta">
                        <span>📍 <?= htmlspecialchars($rev['location']) ?></span>
                        <span>📅 <?= htmlspecialchars($rev['date_label']) ?></span>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</article>

<?php include __DIR__ . '/includes/footer.php'; ?>
