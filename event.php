<?php
require __DIR__ . '/includes/data.php';
$id = $_GET['id'] ?? '';
$ev = find_event($events, $id);
if (!$ev) {
    header('Location: evenements.php');
    exit;
}
$page_title = $ev['title'] . ' · Nomade';
$page_desc = $ev['description'];
$current_page = 'evenements';
$cat = $event_categories[$ev['category']] ?? null;
$d = new DateTime($ev['date']);
$day = $d->format('d');
$month = strtoupper(strftime_fr($d->format('n')));

$related = array_slice(array_filter(get_events_by_category($events, $ev['category']), fn($e) => $e['id'] !== $ev['id']), 0, 3);

include __DIR__ . '/includes/header.php';
?>

<article class="detail-page">
    <section class="detail-hero-v2">
        <div class="container">
            <a href="evenements.php" class="detail-back-v2">← Tous les événements</a>
            <div class="dhv2-grid">
                <div class="dhv2-text">
                    <div class="dhv2-tags-top">
                        <?php if ($cat): ?>
                        <span class="event-cat-pill" style="background: <?= $cat['color'] ?>;"><?= $cat['emoji'] ?> <?= htmlspecialchars($cat['label']) ?></span>
                        <?php endif; ?>
                        <?php if (!empty($ev['sponsored'])): ?>
                        <span class="sponsor-chip">★ Partenaire</span>
                        <?php endif; ?>
                    </div>
                    <h1 class="dhv2-title"><?= htmlspecialchars($ev['title']) ?></h1>
                    <p class="dhv2-lead"><?= htmlspecialchars($ev['description']) ?></p>
                    <div class="dhv2-meta">
                        <div class="dhv2-meta-item">
                            <em>Quand</em>
                            <strong><?= htmlspecialchars($ev['date_label']) ?> · <?= htmlspecialchars($ev['time']) ?></strong>
                        </div>
                        <div class="dhv2-meta-item">
                            <em>Où</em>
                            <strong><?= htmlspecialchars($ev['location']) ?></strong>
                        </div>
                        <div class="dhv2-meta-item">
                            <em>Tarif</em>
                            <strong><?= htmlspecialchars($ev['price_full']) ?></strong>
                        </div>
                    </div>
                    <?php if (!empty($ev['url']) && $ev['url'] !== '#'): ?>
                    <div class="dhv2-actions">
                        <a href="<?= htmlspecialchars($ev['url']) ?>" target="_blank" rel="noopener" class="btn btn-sunset">
                            Billetterie / Site officiel
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="dhv2-media">
                    <div class="dhv2-photo" style="background-image:url('<?= htmlspecialchars($ev['image']) ?>');">
                        <?php if (!empty($ev['sponsored'])): ?>
                        <span class="dhv2-sponsor-ribbon">★ Partenaire</span>
                        <?php endif; ?>
                        <div class="dhv2-date-stamp">
                            <strong><?= $day ?></strong>
                            <span><?= $month ?></span>
                        </div>
                        <span class="dhv2-price-stamp"><?= htmlspecialchars($ev['price']) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="detail-body-v2">
        <div class="container">
            <div class="dbv2-main">
                <p><?= htmlspecialchars($ev['long_description']) ?></p>
                <?php if (!empty($ev['tags'])): ?>
                <div class="detail-tags">
                    <?php foreach ($ev['tags'] as $t): ?>
                        <span class="tag-pill"><?= htmlspecialchars($t) ?></span>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

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
            <a href="event.php?id=<?= urlencode($rev['id']) ?>" class="event-card-v2 reveal reveal-delay-<?= ($i % 3) + 1 ?><?= !empty($rev['sponsored']) ? ' is-sponsored' : '' ?>" style="background-image:url('<?= htmlspecialchars($rev['image']) ?>');">
                <div class="ev2-scrim"></div>
                <?php if (!empty($rev['sponsored'])): ?>
                <span class="sponsor-chip ev2-sponso">★ Partenaire</span>
                <?php endif; ?>
                <div class="ev2-date">
                    <span class="ev2-day"><?= $rday ?></span>
                    <span class="ev2-month"><?= $rmonth ?></span>
                </div>
                <span class="ev2-price"><?= htmlspecialchars($rev['price']) ?></span>
                <div class="ev2-bottom">
                    <?php if ($rcat): ?>
                        <span class="ev2-cat" style="--cat-color: <?= $rcat['color'] ?>;"><?= $rcat['emoji'] ?> <?= htmlspecialchars($rcat['label']) ?></span>
                    <?php endif; ?>
                    <h3><?= htmlspecialchars($rev['title']) ?></h3>
                    <p class="ev2-desc"><?= htmlspecialchars($rev['description']) ?></p>
                    <div class="ev2-meta">
                        <span>📍 <?= htmlspecialchars($rev['location_tag']) ?></span>
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
