<?php
require __DIR__ . '/includes/data.php';
$page_title = 'Nomade — Le média du Bassin d\'Arcachon';
$page_desc = 'Bons plans du week-end, événements, spots triés par catégorie. Le média qui fait vibrer le Bassin d\'Arcachon.';
$current_page = 'accueil';
$weekend = get_weekend_events($events, 3);
include __DIR__ . '/includes/header.php';
?>

<!-- HERO -->
<section class="hero">
    <div class="hero-bg"></div>
    <div class="container hero-inner">
        <div class="hero-text reveal">
            <span class="eyebrow"><span class="dot"></span> Live sur le bassin</span>
            <h1>
                Le <span class="underline">Bassin</span><br>
                comme <span class="handwritten">tu ne l'as</span><br>
                jamais vécu.
            </h1>
            <p class="hero-desc">Bons plans, événements, soirées, spots secrets. On arpente le bassin d'Arcachon pour toi — tu n'as plus qu'à profiter.</p>
            <div class="hero-actions">
                <a href="#weekend" class="btn btn-primary">
                    Les bons plans du week-end
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="spots.php" class="btn btn-secondary">Explorer les spots</a>
            </div>
            <div class="hero-stats">
                <div class="hero-stat"><strong>5 669</strong><span>followers Instagram</span></div>
                <div class="hero-stat"><strong>88+</strong><span>publications</span></div>
                <div class="hero-stat"><strong>17</strong><span>spots référencés</span></div>
            </div>
        </div>
        <div class="hero-visual reveal reveal-delay-1">
            <div class="hero-card hero-card-main">
                <img src="https://images.unsplash.com/photo-1509316785289-025f5b846b35?w=900&auto=format&fit=crop" alt="Dune du Pilat">
            </div>
            <div class="hero-card hero-card-tiny">
                <span class="big-emoji">🌅</span>
                <div>
                    <strong>Sunset<br>du jour</strong>
                    <span>Plage Pereire · 21h34</span>
                </div>
            </div>
            <div class="hero-card hero-card-small">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=600&auto=format&fit=crop" alt="Bassin d'Arcachon">
            </div>
        </div>
    </div>
    <div class="hero-scroll">Scroll</div>
</section>

<!-- BONS PLANS DU WEEK-END -->
<section class="section" id="weekend">
    <div class="container">
        <div class="section-head reveal">
            <span class="label">Les bons plans</span>
            <h2>Ce week-end sur le bassin</h2>
            <p>Ce qu'il ne faut pas rater. Concerts, fêtes, festivals — les meilleures sorties repérées par la team.</p>
        </div>
        <div class="event-grid">
            <?php foreach ($weekend as $i => $ev):
                $d = new DateTime($ev['date']);
                $day = $d->format('d');
                $month = strtoupper(strftime_fr($d->format('n')));
            ?>
            <article class="event-card reveal reveal-delay-<?= $i + 1 ?>" data-event="<?= htmlspecialchars($ev['id']) ?>">
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
        <div style="text-align:center; margin-top:48px;" class="reveal">
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
            <article class="spot-card reveal reveal-delay-<?= ($i % 4) + 1 ?>" data-spot-category="<?= htmlspecialchars($sp['category']) ?>">
                <div class="spot-media">
                    <img src="<?= htmlspecialchars($sp['image']) ?>" alt="<?= htmlspecialchars($sp['name']) ?>" loading="lazy">
                    <span class="spot-tag"><?= htmlspecialchars($sp['category_label']) ?> · <?= htmlspecialchars($sp['tag']) ?></span>
                    <span class="spot-price"><?= htmlspecialchars($sp['price_level']) ?></span>
                    <div class="spot-title-overlay">
                        <strong><?= htmlspecialchars($sp['name']) ?></strong>
                        <span>📍 <?= htmlspecialchars($sp['location']) ?></span>
                    </div>
                </div>
                <div class="spot-body">
                    <p><?= htmlspecialchars($sp['description']) ?></p>
                </div>
            </article>
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

<!-- INSTAGRAM STRIP -->
<section class="insta-strip">
    <div class="container insta-strip-inner">
        <div class="reveal">
            <span class="eyebrow" style="background:rgba(255,255,255,0.15); border-color:rgba(255,255,255,0.2); color:white;"><span class="dot"></span> @nomademediacom</span>
            <h2 style="margin-top:18px;">Le meilleur <span class="highlight">média</span> du bassin vit sur Insta.</h2>
            <p>Paysages, bons plans, soirées, annonces d'événements : on y poste chaque jour. Viens voir.</p>
            <div class="insta-stats">
                <div class="insta-stat"><strong>5 669</strong><span>followers</span></div>
                <div class="insta-stat"><strong>88+</strong><span>publications</span></div>
                <div class="insta-stat"><strong>🌅</strong><span>tous les jours</span></div>
            </div>
            <a href="https://www.instagram.com/nomademediacom" target="_blank" rel="noopener" class="insta-cta">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                Suivre Nomade sur Instagram
            </a>
        </div>
        <div class="insta-grid reveal reveal-delay-2">
            <div class="insta-grid-item"><img src="https://images.unsplash.com/photo-1509316785289-025f5b846b35?w=400&auto=format&fit=crop" alt=""></div>
            <div class="insta-grid-item"><img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=400&auto=format&fit=crop" alt=""></div>
            <div class="insta-grid-item"><img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=400&auto=format&fit=crop" alt=""></div>
            <div class="insta-grid-item"><img src="https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?w=400&auto=format&fit=crop" alt=""></div>
            <div class="insta-grid-item"><img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=400&auto=format&fit=crop" alt=""></div>
            <div class="insta-grid-item"><img src="https://images.unsplash.com/photo-1519046904884-53103b34b206?w=400&auto=format&fit=crop" alt=""></div>
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
