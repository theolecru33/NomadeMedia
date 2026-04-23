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
        <p>Concerts, festivals, marchés nocturnes, traditions — la programmation complète, mise à jour par la team Nomade.</p>
    </div>
</section>

<section class="section" style="padding-top:40px;">
    <div class="container">
        <div class="event-grid">
            <?php foreach ($events as $i => $ev):
                $d = new DateTime($ev['date']);
                $day = $d->format('d');
                $month = strtoupper(strftime_fr($d->format('n')));
            ?>
            <article class="event-card reveal reveal-delay-<?= ($i % 3) + 1 ?>">
                <div class="event-media">
                    <img src="<?= htmlspecialchars($ev['image']) ?>" alt="<?= htmlspecialchars($ev['title']) ?>" loading="lazy">
                    <div class="event-date-badge">
                        <strong><?= $day ?></strong>
                        <span><?= $month ?></span>
                    </div>
                    <span class="event-tag"><?= htmlspecialchars($ev['price']) ?></span>
                </div>
                <div class="event-body">
                    <span class="event-category"><?= htmlspecialchars($ev['category']) ?> · <?= htmlspecialchars($ev['tag']) ?></span>
                    <h3><?= htmlspecialchars($ev['title']) ?></h3>
                    <p class="event-desc"><?= htmlspecialchars($ev['description']) ?></p>
                    <div class="event-meta">
                        <span>📍 <?= htmlspecialchars($ev['location']) ?></span>
                        <span>📅 <?= htmlspecialchars($ev['date_label']) ?></span>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
