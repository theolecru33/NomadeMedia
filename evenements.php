<?php
require __DIR__ . '/includes/data.php';
$page_title = 'Événements — Nomade';
$page_desc = 'Tous les événements du Bassin d\'Arcachon : concerts, festivals, soirées, traditions. L\'agenda de l\'été et au-delà.';
$current_page = 'evenements';
usort($events, fn($a, $b) => strcmp($a['date'], $b['date']));
include __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <span class="label">L'agenda</span>
        <h1>Tous les <span style="color:var(--sunset-deep);">événements</span><br>du Bassin.</h1>
        <p>Concerts, festivals, DJ sets, marchés nocturnes, traditions — la programmation complète, mise à jour par la team Nomade.</p>
    </div>
</section>

<section class="section" style="padding-top:40px;">
    <div class="container">
        <div class="category-tabs reveal" data-event-filter>
            <button class="category-tab active" data-event-category="all"><span class="emoji">✨</span> Tout (<?= count($events) ?>)</button>
            <?php foreach ($event_categories as $key => $cat):
                $count = count(get_events_by_category($events, $key));
                if ($count === 0) continue;
            ?>
            <button class="category-tab" data-event-category="<?= htmlspecialchars($key) ?>" style="--cat-color: <?= $cat['color'] ?>;">
                <span class="emoji"><?= $cat['emoji'] ?></span> <?= htmlspecialchars($cat['label']) ?> (<?= $count ?>)
            </button>
            <?php endforeach; ?>
        </div>

        <div class="event-grid" data-event-grid>
            <?php foreach ($events as $i => $ev):
                $d = new DateTime($ev['date']);
                $day = $d->format('d');
                $month = strtoupper(strftime_fr($d->format('n')));
                $cat = $event_categories[$ev['category']] ?? null;
            ?>
            <a href="event.php?id=<?= urlencode($ev['id']) ?>" class="event-card reveal reveal-delay-<?= ($i % 3) + 1 ?>" data-event-category="<?= htmlspecialchars($ev['category']) ?>">
                <div class="event-media">
                    <img src="<?= htmlspecialchars($ev['image']) ?>" alt="<?= htmlspecialchars($ev['title']) ?>" loading="lazy">
                    <div class="event-date-badge">
                        <strong><?= $day ?></strong>
                        <span><?= $month ?></span>
                    </div>
                    <span class="event-tag"><?= htmlspecialchars($ev['price']) ?></span>
                    <?php if ($cat): ?>
                    <span class="event-cat-pill" style="background: <?= $cat['color'] ?>;"><?= $cat['emoji'] ?> <?= htmlspecialchars($cat['label']) ?></span>
                    <?php endif; ?>
                </div>
                <div class="event-body">
                    <div class="event-tags">
                        <?php foreach (array_slice($ev['tags'] ?? [], 0, 3) as $t): ?>
                            <span class="tag-pill"><?= htmlspecialchars($t) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <h3><?= htmlspecialchars($ev['title']) ?></h3>
                    <p class="event-desc"><?= htmlspecialchars($ev['description']) ?></p>
                    <div class="event-meta">
                        <span>📍 <?= htmlspecialchars($ev['location']) ?></span>
                        <span>📅 <?= htmlspecialchars($ev['date_label']) ?></span>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
            <div class="event-empty" style="display:none; grid-column:1/-1; text-align:center; padding:60px; color:var(--muted);">Aucun événement dans cette catégorie.</div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
