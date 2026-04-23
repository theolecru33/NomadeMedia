<?php
require __DIR__ . '/includes/data.php';
$page_title = 'Nomade — Le média du Bassin d\'Arcachon';
$page_desc = 'Bons plans du week-end, événements, spots triés par catégorie. Le média qui fait vibrer le Bassin d\'Arcachon.';
$current_page = 'accueil';
$weekend = get_weekend_events($events, 4);
$sponsored = get_sponsored_spots($spots);
include __DIR__ . '/includes/header.php';
?>

<!-- HERO V2 : watercolor + handwritten -->
<section class="hero hero-v2">
    <div class="hero-watercolor"></div>
    <div class="hero-sun" aria-hidden="true"></div>
    <svg class="hero-horizon" viewBox="0 0 1440 60" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0 30 Q 180 12 360 30 T 720 30 T 1080 30 T 1440 30" stroke="#3E5C76" stroke-width="1.2" fill="none" stroke-linecap="round"/>
        <path d="M0 44 Q 180 28 360 44 T 720 44 T 1080 44 T 1440 44" stroke="#8AA5C4" stroke-width="1" fill="none" stroke-linecap="round"/>
    </svg>
    <div class="container hero-v2-inner">
        <div class="hero-v2-text reveal">
            <span class="hero-badge">
                <span class="hero-badge-dot">☀️</span>
                ÉTÉ 2026 · BASSIN D'ARCACHON
            </span>
            <h1 class="hero-hand-title">
                <span class="line-top">Le</span>
                <span class="line-main">Bassin,</span>
                <span class="line-sub">sans <span class="brush-word">filtre<svg class="brush-underline" viewBox="0 0 280 22" preserveAspectRatio="none"><path d="M4 14 Q 70 2, 140 10 T 276 8" stroke="currentColor" stroke-width="7" fill="none" stroke-linecap="round"/></svg></span>.</span>
            </h1>
            <p class="hero-v2-desc">
                On repère les bons plans, les soirées, les spots secrets et les événements du Bassin. Toi, t'as plus qu'à venir et profiter.
            </p>
            <div class="hero-v2-actions">
                <a href="#weekend" class="btn btn-sunset">
                    Ce week-end sur le bassin
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="spots.php" class="btn btn-ghost">Voir les bons spots</a>
            </div>
        </div>
        <div class="hero-v2-visual reveal reveal-delay-1">
            <div class="postcard postcard-main">
                <img src="https://images.pexels.com/photos/22735929/pexels-photo-22735929.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop" alt="Dune du Pilat">
                <span class="postcard-tape"></span>
            </div>
            <div class="postcard postcard-alt">
                <img src="https://images.pexels.com/photos/13492229/pexels-photo-13492229.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop" alt="Cabanes tchanquées">
                <span class="postcard-caption">Île aux Oiseaux</span>
            </div>
            <div class="postcard-sticker">
                <span>📍</span>
                <div>
                    <strong>Bassin</strong>
                    <span>d'Arcachon</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BONS PLANS DU WEEK-END (polaroids) -->
<section class="section weekend-section" id="weekend">
    <div class="container">
        <div class="weekend-head reveal">
            <span class="label">Les bons plans</span>
            <h2>Où sortir <span class="scribble-circle">ce week-end<svg viewBox="0 0 300 60" preserveAspectRatio="none"><path d="M150 4 Q 290 6 288 30 T 150 56 Q 10 54 12 30 T 150 4" stroke="currentColor" stroke-width="3.4" fill="none" stroke-linecap="round"/></svg></span>&nbsp;?</h2>
            <p>Les meilleures sorties repérées par la team. Clique, tu sauras tout.</p>
        </div>
        <div class="polaroid-grid">
            <?php foreach ($weekend as $i => $ev):
                $d = new DateTime($ev['date']);
                $day = $d->format('d');
                $month = strtoupper(strftime_fr($d->format('n')));
                $cat = $event_categories[$ev['category']] ?? null;
                $rotations = ['-2.2deg','1.6deg','-1.1deg','2.4deg'];
                $rot = $rotations[$i % 4];
            ?>
            <a href="event.php?id=<?= urlencode($ev['id']) ?>" class="polaroid reveal reveal-delay-<?= ($i % 4) + 1 ?>" style="--rot: <?= $rot ?>;">
                <span class="polaroid-tape"></span>
                <div class="polaroid-photo">
                    <img src="<?= htmlspecialchars($ev['image']) ?>" alt="<?= htmlspecialchars($ev['title']) ?>" loading="lazy">
                    <span class="polaroid-location">📍 <?= htmlspecialchars($ev['location_tag']) ?></span>
                    <?php if ($cat): ?>
                    <span class="polaroid-cat" style="background: <?= $cat['color'] ?>;"><?= $cat['emoji'] ?> <?= htmlspecialchars($cat['label']) ?></span>
                    <?php endif; ?>
                </div>
                <div class="polaroid-caption">
                    <div class="polaroid-date">
                        <strong><?= $day ?></strong>
                        <span><?= $month ?></span>
                    </div>
                    <div class="polaroid-text">
                        <strong><?= htmlspecialchars($ev['title']) ?></strong>
                        <span><?= htmlspecialchars($ev['time']) ?> · <?= htmlspecialchars($ev['price']) ?></span>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <div style="text-align:center; margin-top:60px;" class="reveal">
            <a href="evenements.php" class="btn btn-secondary">
                Voir tous les événements
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
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
            foreach ($preview_spots as $i => $sp): ?>
            <a href="spot.php?id=<?= urlencode($sp['id']) ?>" class="spot-card reveal reveal-delay-<?= ($i % 4) + 1 ?>" data-spot-category="<?= htmlspecialchars($sp['category']) ?>">
                <div class="spot-media">
                    <img src="<?= htmlspecialchars($sp['image']) ?>" alt="<?= htmlspecialchars($sp['name']) ?>" loading="lazy">
                    <span class="spot-tag"><?= htmlspecialchars($sp['category_label']) ?></span>
                    <span class="spot-price"><?= htmlspecialchars($sp['price_level']) ?></span>
                    <?php if (!empty($sp['sponsored'])): ?><span class="spot-sponsor-badge">★ Sponso</span><?php endif; ?>
                    <div class="spot-title-overlay">
                        <strong><?= htmlspecialchars($sp['name']) ?></strong>
                        <span>📍 <?= htmlspecialchars($sp['location']) ?></span>
                    </div>
                </div>
                <div class="spot-body">
                    <div class="spot-tags">
                        <?php foreach (array_slice($sp['tags'], 0, 3) as $t): ?>
                            <span class="tag-pill"><?= htmlspecialchars($t) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <p><?= htmlspecialchars($sp['description']) ?></p>
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
            <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DWSpF87bP6JSF?utm_source=generator&theme=0" allowfullscreen allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
