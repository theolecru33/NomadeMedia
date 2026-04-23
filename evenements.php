<?php
require __DIR__ . '/includes/data.php';
$page_title = 'Événements · Nomade';
$page_desc = 'Tous les événements du Bassin d\'Arcachon : concerts, festivals, soirées, traditions. L\'agenda de l\'été et au-delà.';
$current_page = 'evenements';
usort($events, fn($a, $b) => strcmp($a['date'], $b['date']));
$events = sort_sponsored_first($events);
include __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <span class="label">L'agenda</span>
        <h1>Tous les <span style="color:var(--sunset-deep);">événements</span><br>du Bassin.</h1>
        <p>Concerts, festivals, DJ sets, marchés nocturnes, traditions. La programmation complète, mise à jour par la team Nomade.</p>
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
            <a href="event.php?id=<?= urlencode($ev['id']) ?>" class="event-card-v2 reveal reveal-delay-<?= ($i % 3) + 1 ?><?= !empty($ev['sponsored']) ? ' is-sponsored' : '' ?>" data-event-category="<?= htmlspecialchars($ev['category']) ?>" style="background-image:url('<?= htmlspecialchars($ev['image']) ?>');">
                <div class="ev2-scrim"></div>
                <?php if (!empty($ev['sponsored'])): ?>
                <span class="sponsor-chip ev2-sponso">★ Partenaire</span>
                <?php endif; ?>
                <div class="ev2-date">
                    <span class="ev2-day"><?= $day ?></span>
                    <span class="ev2-month"><?= $month ?></span>
                </div>
                <span class="ev2-price"><?= htmlspecialchars($ev['price']) ?></span>
                <div class="ev2-bottom">
                    <?php if ($cat): ?>
                        <span class="ev2-cat" style="--cat-color: <?= $cat['color'] ?>;"><?= $cat['emoji'] ?> <?= htmlspecialchars($cat['label']) ?></span>
                    <?php endif; ?>
                    <h3><?= htmlspecialchars($ev['title']) ?></h3>
                    <p class="ev2-desc"><?= htmlspecialchars($ev['description']) ?></p>
                    <div class="ev2-meta">
                        <span>📍 <?= htmlspecialchars($ev['location_tag']) ?></span>
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
