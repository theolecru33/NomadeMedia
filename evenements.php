<?php
require __DIR__ . '/includes/data.php';
$page_title = 'Sortir — Nomade';
$page_desc = 'Tous les événements du Bassin d\'Arcachon : concerts, festivals, soirées, traditions. L\'agenda de l\'été et au-delà.';
$current_page = 'evenements';
usort($events, fn($a, $b) => strcmp($a['date'], $b['date']));

$tape_styles = [
    'top:-10px; left:50%; transform:translateX(-50%) rotate(-3deg);',
    'top:-10px; right:12px; transform: rotate(6deg);',
    'top:-10px; left:14px; transform: rotate(-8deg);',
    'top:-10px; left:50%; transform: translateX(-50%) rotate(4deg);',
];
$tape_classes = ['tape', 'tape tape-blue', 'tape', 'tape tape-blue'];
$rotations = ['rot-1', 'rot-2', 'rot-3', 'rot-4'];

include __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <div class="section-eyebrow">l'agenda hebdo</div>
        <h1 class="font-hand">Où <span class="accent">sortir</span><br>sur le Bassin ?</h1>
        <p>Concerts, festivals, DJ sets, marchés nocturnes, traditions — toute la programmation, mise à jour chaque semaine par la team Nomade.</p>
    </div>
</section>

<section class="section" style="padding-top: 30px;">
    <div class="container">
        <div class="section-head reveal">
            <div class="section-head-left">
                <div class="section-eyebrow">filtre</div>
                <h2 class="section-title">Toutes les <span class="circle-hand">envies</span>.</h2>
            </div>
            <div class="pills-row" data-event-filter>
                <button class="pill active" data-event-category="all">Tout (<?= count($events) ?>)</button>
                <?php foreach ($event_categories as $key => $cat):
                    $count = count(get_events_by_category($events, $key));
                    if ($count === 0) continue;
                ?>
                <button class="pill" data-event-category="<?= htmlspecialchars($key) ?>">
                    <span class="emoji"><?= $cat['emoji'] ?></span> <?= htmlspecialchars($cat['label']) ?> (<?= $count ?>)
                </button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="polaroid-grid" data-event-grid>
            <?php foreach ($events as $i => $ev):
                $cat = $event_categories[$ev['category']] ?? null;
                $rot = $rotations[$i % 4];
                $tape_cls = $tape_classes[$i % 4];
                $tape_style = $tape_styles[$i % 4];
            ?>
            <a href="event.php?id=<?= urlencode($ev['id']) ?>" class="polaroid <?= $rot ?> reveal reveal-delay-<?= ($i % 4) + 1 ?>" data-event-category="<?= htmlspecialchars($ev['category']) ?>">
                <span class="<?= $tape_cls ?>" style="<?= $tape_style ?>"></span>
                <div class="polaroid-photo">
                    <img src="<?= htmlspecialchars($ev['image']) ?>" alt="<?= htmlspecialchars($ev['title']) ?>" loading="lazy">
                    <span class="polaroid-label"><?= htmlspecialchars($ev['location_tag']) ?></span>
                    <?php if ($cat): ?><span class="polaroid-cat"><?= $cat['emoji'] ?> <?= htmlspecialchars($cat['label']) ?></span><?php endif; ?>
                </div>
                <div class="polaroid-text">
                    <span class="title"><?= htmlspecialchars($ev['title']) ?></span>
                    <span class="meta"><?= htmlspecialchars($ev['location']) ?> · <?= htmlspecialchars($ev['date_label']) ?> · <?= htmlspecialchars($ev['time']) ?></span>
                </div>
            </a>
            <?php endforeach; ?>
            <div class="event-empty" style="display:none; grid-column:1/-1; text-align:center; padding:60px; font-family:var(--font-hand); font-size:1.6rem; color:var(--lagoon-ink);">Aucun événement dans cette catégorie 🤷</div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
