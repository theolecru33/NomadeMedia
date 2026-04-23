<?php
require __DIR__ . '/includes/data.php';
$page_title = 'Nomade — Le Bassin, sans filtre';
$page_desc = 'Bons plans du week-end, événements, spots secrets du Bassin d\'Arcachon. Les nomades repèrent, tu profites.';
$current_page = 'accueil';
$weekend = get_weekend_events($events, 4);
$sponsored = get_sponsored_spots($spots);

// Homepage spots: curated mosaic picks (1 big + 4 others, one per category + 1 sponsor)
$mosaic_picks = [];
$mosaic_picks[] = get_spots_by_category($spots, 'plage')[0] ?? null;       // big
$mosaic_picks[] = get_spots_by_category($spots, 'resto')[0] ?? null;
$mosaic_picks[] = get_spots_by_category($spots, 'activite')[0] ?? null;
$mosaic_picks[] = get_spots_by_category($spots, 'resto')[1] ?? null;       // big
$mosaic_picks[] = get_spots_by_category($spots, 'activite')[2] ?? null;   // tall
$mosaic_picks[] = get_spots_by_category($spots, 'bar')[0] ?? null;
$mosaic_picks[] = get_spots_by_category($spots, 'plage')[1] ?? null;
$mosaic_picks = array_values(array_filter($mosaic_picks));

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

<!-- HERO -->
<header class="hero">
    <div class="hero-bg"></div>
    <svg class="hero-horizon" viewBox="0 0 1440 60" preserveAspectRatio="none">
        <path d="M0 30 Q 180 12 360 30 T 720 30 T 1080 30 T 1440 30" stroke="#3E5C76" stroke-width="1.2" fill="none" stroke-linecap="round"/>
        <path d="M0 44 Q 180 28 360 44 T 720 44 T 1080 44 T 1440 44" stroke="#8AA5C4" stroke-width="1" fill="none" stroke-linecap="round"/>
    </svg>
    <div class="hero-sun"></div>

    <div class="container hero-inner">
        <span class="hero-badge">
            <span class="hero-badge-dot"></span>
            <span class="hero-badge-text">Été 2026 · Bassin d'Arcachon</span>
        </span>

        <h1 class="hero-title">
            <span class="tag-line">Le Bassin,</span>
            <span class="hl" style="color:var(--lagoon);">sans filtre<svg viewBox="0 0 240 14" preserveAspectRatio="none"><path d="M2 9 C 50 2, 120 14, 238 5"/></svg></span><span>.</span>
        </h1>

        <p class="hero-desc">
            Bons plans, soirées, spots secrets.<br>
            Les nomades repèrent, tu profites. Chaque semaine.
        </p>

        <div class="hero-actions">
            <a href="#sortir" class="btn btn-coral">
                Ce week-end
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
            </a>
            <a href="#spots" class="btn btn-paper">Voir les bons spots</a>
        </div>
    </div>
</header>

<!-- OÙ SORTIR CE WEEK-END -->
<section id="sortir" class="section">
    <div class="container">
        <div class="section-head reveal">
            <div class="section-head-left">
                <div class="section-eyebrow">le programme hebdo</div>
                <h2 class="section-title">Où sortir<br><span class="circle-hand">ce week-end</span> ?</h2>
            </div>
            <div class="section-right">
                On trie, on teste, on recommande. Les vrais plans du week-end, repérés par la team Nomade.
            </div>
        </div>

        <div class="polaroid-grid">
            <?php foreach ($weekend as $i => $ev):
                $cat = $event_categories[$ev['category']] ?? null;
                $rot = $rotations[$i % 4];
                $tape_cls = $tape_classes[$i % 4];
                $tape_style = $tape_styles[$i % 4];
            ?>
            <a href="event.php?id=<?= urlencode($ev['id']) ?>" class="polaroid <?= $rot ?> reveal reveal-delay-<?= ($i % 4) + 1 ?>">
                <span class="<?= $tape_cls ?>" style="<?= $tape_style ?>"></span>
                <div class="polaroid-photo">
                    <img src="<?= htmlspecialchars($ev['image']) ?>" alt="<?= htmlspecialchars($ev['title']) ?>" loading="lazy">
                    <span class="polaroid-label"><?= htmlspecialchars($ev['location_tag']) ?></span>
                    <?php if ($cat): ?><span class="polaroid-cat"><?= htmlspecialchars($cat['label']) ?></span><?php endif; ?>
                </div>
                <div class="polaroid-text">
                    <span class="title"><?= htmlspecialchars($ev['title']) ?></span>
                    <span class="meta"><?= htmlspecialchars($ev['location']) ?> · <?= htmlspecialchars($ev['date_label']) ?> · <?= htmlspecialchars($ev['time']) ?></span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

        <div style="display:flex; justify-content:flex-end; margin-top:20px;" class="reveal">
            <a href="evenements.php" class="font-hand" style="font-size:1.4rem; color:var(--lagoon-ink); display:inline-flex; align-items:center; gap:8px;">
                Tous les plans du week-end
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- PLAYLIST -->
<section class="section" style="padding: 30px 0 50px;">
    <div class="container">
        <div class="playlist-wrap reveal">
            <span class="tape" style="top:-12px; left:28px; transform:rotate(-4deg);"></span>
            <div class="vinyl">
                <div class="vinyl-core"></div>
            </div>
            <div class="playlist-text">
                <div class="eyebrow">la playlist nomade</div>
                <h2>Le son du Bassin.</h2>
                <div class="note">MAJ chaque vendredi · 1h04 d'ondes marines</div>
            </div>
            <div class="playlist-embed">
                <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DWSpF87bP6JSF?utm_source=generator&theme=0" frameborder="0" allowfullscreen allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</section>

<!-- LES BONS SPOTS -->
<section id="spots" class="section" style="background: linear-gradient(180deg, transparent, rgba(232, 220, 196, 0.5), transparent);">
    <div class="container">
        <div class="section-head reveal">
            <div class="section-head-left">
                <div class="section-eyebrow">les coups de cœur</div>
                <h2 class="section-title">Les bons spots.</h2>
            </div>
            <div class="pills-row" data-spot-filter>
                <button class="pill active" data-category="all">Tout</button>
                <button class="pill" data-category="plage"><span class="emoji">🏖️</span> Plages</button>
                <button class="pill" data-category="resto"><span class="emoji">🍽️</span> Restos</button>
                <button class="pill" data-category="bar"><span class="emoji">🍹</span> Bars</button>
                <button class="pill" data-category="activite"><span class="emoji">🪂</span> Activités</button>
            </div>
        </div>

        <div class="mosaic" data-spot-grid>
            <?php
            $span_map = [
                0 => 'col-2 row-2',
                1 => '',
                2 => '',
                3 => 'col-2 row-2',
                4 => 'row-2',
                5 => '',
                6 => 'col-2',
            ];
            foreach ($mosaic_picks as $i => $sp):
                $spans = $span_map[$i] ?? '';
            ?>
            <a href="spot.php?id=<?= urlencode($sp['id']) ?>" class="tile <?= $spans ?> reveal" data-spot-category="<?= htmlspecialchars($sp['category']) ?>">
                <div class="tile-cover" style="background-image:url('<?= htmlspecialchars($sp['image']) ?>');"></div>
                <div class="tile-veil"></div>
                <span class="tile-cat"><?= htmlspecialchars($sp['category_label']) ?></span>
                <?php if (!empty($sp['sponsored'])): ?><span class="tile-sponsor">★ Sponso</span><?php endif; ?>
                <h4 class="tile-title"><?= htmlspecialchars($sp['name']) ?></h4>
                <span class="tile-price"><?= htmlspecialchars($sp['price_level']) ?></span>
            </a>
            <?php endforeach; ?>
        </div>

        <div style="display:flex; justify-content:center; margin-top: 40px;" class="reveal">
            <a href="spots.php" class="btn btn-lagoon">
                Tous les spots du bassin
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- INSTAGRAM -->
<section class="insta-strip">
    <div class="container insta-inner">
        <div class="reveal">
            <span class="eyebrow"><span class="dot"></span> @nomademediacom</span>
            <h2>Le meilleur <span class="highlight">média</span> du bassin vit sur Insta.</h2>
            <p>Paysages, bons plans, soirées, annonces d'événements : on y poste chaque jour. Viens voir.</p>
            <a href="https://www.instagram.com/nomademediacom" target="_blank" rel="noopener" class="insta-cta">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
                Suivre sur Instagram
            </a>
        </div>
        <div class="insta-grid reveal reveal-delay-2">
            <div class="insta-grid-item"><img src="https://images.pexels.com/photos/22735929/pexels-photo-22735929.jpeg?auto=compress&cs=tinysrgb&h=500&w=500&fit=crop" alt=""></div>
            <div class="insta-grid-item"><img src="https://images.pexels.com/photos/13492229/pexels-photo-13492229.jpeg?auto=compress&cs=tinysrgb&h=500&w=500&fit=crop" alt=""></div>
            <div class="insta-grid-item"><img src="https://images.pexels.com/photos/9722071/pexels-photo-9722071.jpeg?auto=compress&cs=tinysrgb&h=500&w=500&fit=crop" alt=""></div>
            <div class="insta-grid-item"><img src="https://images.pexels.com/photos/13678581/pexels-photo-13678581.jpeg?auto=compress&cs=tinysrgb&h=500&w=500&fit=crop" alt=""></div>
            <div class="insta-grid-item"><img src="https://images.pexels.com/photos/34178396/pexels-photo-34178396.jpeg?auto=compress&cs=tinysrgb&h=500&w=500&fit=crop" alt=""></div>
            <div class="insta-grid-item"><img src="https://images.pexels.com/photos/9729432/pexels-photo-9729432.jpeg?auto=compress&cs=tinysrgb&h=500&w=500&fit=crop" alt=""></div>
        </div>
    </div>
</section>

<!-- CTA COMMUNITY -->
<section class="section">
    <div class="container">
        <div class="cta-card reveal">
            <span class="tape" style="top:-12px; left:50%; transform:translateX(-50%) rotate(-2deg);"></span>
            <div class="eyebrow">la team nomade</div>
            <h2>Rejoins la <span class="circle-hand">communauté</span>.</h2>
            <p>Des groupes WhatsApp thématiques pour partager bons plans, sorties et tips entre habitants et amoureux du Bassin.</p>
            <div style="margin-top: 24px;">
                <a href="communaute.php" class="btn btn-coral">Voir les groupes</a>
            </div>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
