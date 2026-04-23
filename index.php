<?php
require __DIR__ . '/includes/data.php';
$page_title = 'Nomade · Le média du Bassin d\'Arcachon';
$page_desc = 'Bons plans du week-end, événements, spots triés par catégorie. Le média qui fait vibrer le Bassin d\'Arcachon.';
$current_page = 'accueil';
$weekend = get_weekend_events($events, 8);
$weekend_count = count($weekend);
$upcoming = array_slice(array_filter($events, fn($e) => strtotime($e['date']) >= strtotime('today')), 0, 4);
usort($upcoming, fn($a, $b) => strcmp($a['date'], $b['date']));
$sponsored = get_sponsored_spots($spots);
include __DIR__ . '/includes/header.php';
?>

<!-- HERO V3 : éditorial magazine avec touche DA -->
<section class="hero hero-v3">
    <div class="hero-watercolor"></div>
    <div class="hero-sun" aria-hidden="true"></div>
    <svg class="hero-horizon" viewBox="0 0 1440 60" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 30 Q 180 12 360 30 T 720 30 T 1080 30 T 1440 30" stroke="#3E5C76" stroke-width="1.2" fill="none" stroke-linecap="round"/>
        <path d="M0 44 Q 180 28 360 44 T 720 44 T 1080 44 T 1440 44" stroke="#8AA5C4" stroke-width="1" fill="none" stroke-linecap="round"/>
    </svg>
    <div class="container hero-v3-inner">
        <div class="hero-v3-text reveal">
            <span class="hero-badge">
                <span class="hero-badge-dot">☀️</span>
                ÉTÉ 2026 · BASSIN D'ARCACHON
            </span>
            <h1 class="hero-hand-title">
                <span class="line-top">Le</span>
                <span class="line-main">Bassin,</span>
                <span class="line-sub">sans <span class="brush-word">filtre<svg class="brush-underline" viewBox="0 0 280 22" preserveAspectRatio="none"><path d="M4 14 Q 70 2, 140 10 T 276 8" stroke="currentColor" stroke-width="7" fill="none" stroke-linecap="round"/></svg></span>.</span>
            </h1>
            <p class="hero-v3-desc">
                On repère les bons plans, les soirées, les spots secrets et les événements du Bassin. Toi, t'as plus qu'à venir et profiter.
            </p>
            <div class="hero-v3-actions">
                <a href="#weekend" class="btn btn-sunset">
                    Ce week-end sur le bassin
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="spots.php" class="btn btn-ghost">Voir les bons spots</a>
            </div>
            <div class="hero-v3-signature">
                <span class="hv3-edition">N°04 · Édition été</span>
                <span class="hv3-dot">·</span>
                <span class="hv3-count"><strong><?= count($events) ?></strong> événements à venir</span>
            </div>
        </div>
        <div class="hero-v3-visual reveal reveal-delay-1">
            <div class="hv3-photo-main">
                <img src="https://images.pexels.com/photos/22735929/pexels-photo-22735929.jpeg?auto=compress&cs=tinysrgb&h=1200&w=900&fit=crop" alt="Dune du Pilat">
                <span class="hv3-photo-caption">
                    <span class="hv3-cap-pin">📍</span>
                    <span>Dune du Pilat</span>
                </span>
            </div>
            <div class="hv3-photo-alt">
                <img src="https://images.pexels.com/photos/13492229/pexels-photo-13492229.jpeg?auto=compress&cs=tinysrgb&h=600&w=600&fit=crop" alt="Cabanes tchanquées">
            </div>
            <div class="hv3-live-card" aria-label="Live Bassin">
                <div class="hv3-live-head">
                    <span class="hv3-live-dot"></span>
                    <span>LIVE BASSIN</span>
                </div>
                <div class="hv3-live-body">
                    <span class="hv3-live-main">🌊 Marée haute · 16h42</span>
                    <span class="hv3-live-sub">☀️ 21° · vent NO 8 nds</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BONS PLANS DU WEEK-END (magazine hero + mini) -->
<?php
$weekend = sort_sponsored_first($weekend);
$hero_ev = $weekend[0] ?? null;
$mini_evs = array_slice($weekend, 1);
?>
<section class="section weekend-section" id="weekend">
    <div class="container">
        <div class="weekend-head reveal">
            <span class="label">Les bons plans</span>
            <h2>Où sortir <span class="scribble-circle">ce week-end<svg viewBox="0 0 300 60" preserveAspectRatio="none"><path d="M150 4 Q 290 6 288 30 T 150 56 Q 10 54 12 30 T 150 4" stroke="currentColor" stroke-width="3.4" fill="none" stroke-linecap="round"/></svg></span>&nbsp;?</h2>
            <p>Les meilleures sorties repérées par la team. Clique, tu sauras tout.</p>
        </div>

        <?php if ($hero_ev):
            $d = new DateTime($hero_ev['date']);
            $day = $d->format('d');
            $month = strtoupper(strftime_fr($d->format('n')));
            $cat = $event_categories[$hero_ev['category']] ?? null;
        ?>
        <div class="weekend-layout" data-count="<?= $weekend_count ?>">
            <a href="event.php?id=<?= urlencode($hero_ev['id']) ?>" class="weekend-hero reveal<?= !empty($hero_ev['sponsored']) ? ' is-sponsored' : '' ?>" style="background-image:url('<?= htmlspecialchars($hero_ev['image']) ?>');">
                <div class="weekend-hero-scrim"></div>
                <div class="weekend-hero-top">
                    <?php if (!empty($hero_ev['sponsored'])): ?>
                        <span class="sponsor-chip">★ Partenaire</span>
                    <?php endif; ?>
                    <span class="weekend-hero-flag">
                        <span>À la une</span>
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </span>
                </div>
                <div class="weekend-hero-date">
                    <span class="wh-day"><?= $day ?></span>
                    <span class="wh-month"><?= $month ?></span>
                </div>
                <div class="weekend-hero-bottom">
                    <?php if ($cat): ?>
                        <span class="weekend-hero-cat" style="--cat-color: <?= $cat['color'] ?>;"><?= $cat['emoji'] ?> <?= htmlspecialchars($cat['label']) ?></span>
                    <?php endif; ?>
                    <h3><?= htmlspecialchars($hero_ev['title']) ?></h3>
                    <div class="weekend-hero-meta">
                        <span>📍 <?= htmlspecialchars($hero_ev['location_tag']) ?></span>
                        <span>🕘 <?= htmlspecialchars($hero_ev['time']) ?></span>
                        <span>💸 <?= htmlspecialchars($hero_ev['price']) ?></span>
                    </div>
                </div>
            </a>

            <?php if (!empty($mini_evs)): ?>
            <div class="weekend-list">
                <?php foreach ($mini_evs as $i => $ev):
                    $d = new DateTime($ev['date']);
                    $day = $d->format('d');
                    $month = strtoupper(strftime_fr($d->format('n')));
                    $cat = $event_categories[$ev['category']] ?? null;
                ?>
                <a href="event.php?id=<?= urlencode($ev['id']) ?>" class="weekend-mini reveal reveal-delay-<?= ($i % 4) + 1 ?><?= !empty($ev['sponsored']) ? ' is-sponsored' : '' ?>">
                    <div class="wm-media">
                        <img src="<?= htmlspecialchars($ev['image']) ?>" alt="<?= htmlspecialchars($ev['title']) ?>" loading="lazy">
                    </div>
                    <div class="wm-body">
                        <div class="wm-date">
                            <strong><?= $day ?></strong>
                            <span><?= $month ?></span>
                        </div>
                        <div class="wm-text">
                            <div class="wm-tags-row">
                                <?php if ($cat): ?>
                                    <span class="wm-cat" style="color: <?= $cat['color'] ?>;"><?= $cat['emoji'] ?> <?= htmlspecialchars($cat['label']) ?></span>
                                <?php endif; ?>
                                <?php if (!empty($ev['sponsored'])): ?>
                                    <span class="sponsor-chip">★ Partenaire</span>
                                <?php endif; ?>
                            </div>
                            <h4><?= htmlspecialchars($ev['title']) ?></h4>
                            <span class="wm-meta">📍 <?= htmlspecialchars($ev['location_tag']) ?> · <?= htmlspecialchars($ev['time']) ?></span>
                        </div>
                        <svg class="wm-arrow" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- SPOTS PAR CATÉGORIE -->
<section class="section spots-section">
    <div class="container">
        <div class="section-head center reveal">
            <span class="label">Les spots</span>
            <h2>Nos adresses favorites</h2>
            <p>Triées par envie du moment. On teste, on recommande, on te file le bon plan.</p>
        </div>

        <div class="category-tabs reveal">
            <button class="category-tab active" data-category="all"><span class="emoji">✨</span> Tout</button>
            <button class="category-tab" data-category="resto"><span class="emoji">🍽️</span> Restos</button>
            <button class="category-tab" data-category="bar"><span class="emoji">🍹</span> Bars</button>
            <button class="category-tab" data-category="plage"><span class="emoji">🏖️</span> Plages</button>
            <button class="category-tab" data-category="activite"><span class="emoji">🪂</span> Activités</button>
        </div>

        <div class="spot-grid" data-spot-grid>
            <?php
            $preview_spots = [];
            foreach (['resto','bar','plage','activite'] as $cat) {
                $preview_spots = array_merge($preview_spots, array_slice(get_spots_by_category($spots, $cat), 0, 2));
            }
            $preview_spots = sort_sponsored_first($preview_spots);
            foreach ($preview_spots as $i => $sp): ?>
            <a href="spot.php?id=<?= urlencode($sp['id']) ?>" class="spot-card reveal reveal-delay-<?= ($i % 4) + 1 ?><?= !empty($sp['sponsored']) ? ' is-sponsored' : '' ?>" data-spot-category="<?= htmlspecialchars($sp['category']) ?>" style="background-image:url('<?= htmlspecialchars($sp['image']) ?>');">
                <div class="spot-scrim"></div>
                <div class="spot-top">
                    <span class="spot-chip spot-chip-cat"><?= htmlspecialchars($sp['category_label']) ?></span>
                    <span class="spot-chip spot-chip-price"><?= htmlspecialchars($sp['price_level']) ?></span>
                </div>
                <div class="spot-bottom">
                    <div class="spot-tags-row">
                        <span class="spot-location">📍 <?= htmlspecialchars($sp['location']) ?></span>
                        <?php if (!empty($sp['sponsored'])): ?>
                            <span class="sponsor-chip">★ Partenaire</span>
                        <?php endif; ?>
                    </div>
                    <h3 class="spot-name"><?= htmlspecialchars($sp['name']) ?></h3>
                    <p class="spot-desc"><?= htmlspecialchars($sp['description']) ?></p>
                    <div class="spot-tag-row">
                        <?php foreach (array_slice($sp['tags'], 0, 3) as $t): ?>
                            <span class="tag-pill light"><?= htmlspecialchars($t) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
            <div class="spot-empty" style="display:none;">Aucun spot dans cette catégorie pour le moment.</div>
        </div>

        <div style="text-align:center; margin-top:48px;" class="reveal">
            <a href="spots.php" class="btn btn-primary">
                Tous les spots du bassin
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- AGENDA : timeline éditoriale -->
<?php $upcoming = sort_sponsored_first($upcoming); if (!empty($upcoming)): ?>
<section class="section agenda-section">
    <div class="container">
        <div class="agenda-head reveal">
            <div>
                <span class="label">L'agenda</span>
                <h2>Les <span style="color:var(--sunset-deep);">prochains</span> rendez-vous</h2>
            </div>
            <p>Concerts, festivals, marchés, soirées. Ce qui bouge dans les prochains jours sur le Bassin.</p>
        </div>
        <ol class="agenda-timeline">
            <?php foreach ($upcoming as $i => $ev):
                $d = new DateTime($ev['date']);
                $day = $d->format('d');
                $month = strtolower(strftime_fr($d->format('n')));
                $cat = $event_categories[$ev['category']] ?? null;
            ?>
            <li class="agenda-row reveal reveal-delay-<?= ($i % 4) + 1 ?><?= !empty($ev['sponsored']) ? ' is-sponsored' : '' ?>">
                <a href="event.php?id=<?= urlencode($ev['id']) ?>" class="agenda-row-link">
                    <div class="agenda-date">
                        <strong><?= $day ?></strong>
                        <span><?= htmlspecialchars($month) ?></span>
                    </div>
                    <div class="agenda-photo" style="background-image:url('<?= htmlspecialchars($ev['image']) ?>');"></div>
                    <div class="agenda-content">
                        <div class="agenda-tags">
                            <?php if ($cat): ?>
                                <span class="agenda-cat" style="--cat-color: <?= $cat['color'] ?>;"><?= $cat['emoji'] ?> <?= htmlspecialchars($cat['label']) ?></span>
                            <?php endif; ?>
                            <?php if (!empty($ev['sponsored'])): ?>
                                <span class="sponsor-chip">★ Partenaire</span>
                            <?php endif; ?>
                        </div>
                        <h3><?= htmlspecialchars($ev['title']) ?></h3>
                        <p class="agenda-desc"><?= htmlspecialchars($ev['description']) ?></p>
                        <div class="agenda-meta">
                            <span>📍 <?= htmlspecialchars($ev['location_tag']) ?></span>
                            <span>🕘 <?= htmlspecialchars($ev['time']) ?></span>
                            <span>💸 <?= htmlspecialchars($ev['price']) ?></span>
                        </div>
                    </div>
                    <svg class="agenda-arrow" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </li>
            <?php endforeach; ?>
        </ol>
        <div style="text-align:center; margin-top:48px;" class="reveal">
            <a href="evenements.php" class="btn btn-sunset">
                Tous les événements
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- INSTAGRAM STRIP (stats retirées) -->
<section class="insta-strip">
    <div class="container insta-strip-inner">
        <div class="reveal">
            <span class="eyebrow" style="background:rgba(255,255,255,0.15); border-color:rgba(255,255,255,0.2); color:white;"><span class="dot"></span> @nomademediacom</span>
            <h2 style="margin-top:18px;">Le meilleur <span class="highlight">média</span> du bassin vit sur Insta.</h2>
            <p>Paysages, bons plans, soirées, annonces d'événements : on y poste chaque jour. Viens voir.</p>
            <a href="https://www.instagram.com/nomademediacom" target="_blank" rel="noopener" class="insta-cta">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                Suivre Nomade sur Instagram
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

<!-- PLAYLIST SPOTIFY -->
<section class="section playlist-section">
    <div class="container playlist-inner">
        <div class="playlist-text reveal">
            <span class="eyebrow"><span class="dot"></span> Playlist maison</span>
            <h2 style="margin-top:14px;">Le <span class="hand">son</span> du bassin.</h2>
            <p>Une playlist pour la route vers le Cap Ferret, pour le sunset au Pilat, pour le afterwork au Moulleau. Mets-la à fond et fenêtre ouverte.</p>
            <a href="https://open.spotify.com/" target="_blank" rel="noopener" class="btn btn-sunset">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.42 1.56-.299.421-1.02.599-1.56.3z"/></svg>
                Ouvrir sur Spotify
            </a>
        </div>
        <div class="playlist-embed reveal reveal-delay-1">
            <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DX0AMssoUKCz7?utm_source=generator&theme=0" allowfullscreen allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
