<?php
/**
 * Data source for Nomade Media — events, spots, community.
 * Photos: Pexels (real Bassin d'Arcachon photos) + Unsplash fallbacks.
 */

// ===== EVENT CATEGORIES =====
$event_categories = [
    'concert'    => ['label' => 'Concert',    'emoji' => '🎤', 'color' => '#E77B4C'],
    'dj-set'     => ['label' => 'DJ Set',     'emoji' => '🎧', 'color' => '#8BA0C8'],
    'festival'   => ['label' => 'Festival',   'emoji' => '🎪', 'color' => '#D88FB5'],
    'sport'      => ['label' => 'Sport',      'emoji' => '🏃', 'color' => '#6B8E78'],
    'tradition'  => ['label' => 'Tradition',  'emoji' => '⚓', 'color' => '#3E4E6E'],
    'marche'     => ['label' => 'Marché',     'emoji' => '🛍️', 'color' => '#C7965D'],
];

// ===== EVENTS =====
$events = [
    [
        'id' => 'escapades-musicales-2026',
        'title' => 'Les Escapades Musicales',
        'date' => '2026-06-18',
        'date_end' => '2026-07-18',
        'date_label' => '18 juin → 18 juillet',
        'time' => '20h30',
        'location' => 'Tout le bassin',
        'location_tag' => 'BASSIN D\'ARCACHON',
        'category' => 'festival',
        'tags' => ['Musique classique', 'International'],
        'price' => 'Gratuit - 18 ans',
        'price_full' => 'De 12€ à 35€ · Gratuit -18 ans',
        'image' => 'https://images.pexels.com/photos/19362300/pexels-photo-19362300.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Festival international de musique classique dans les plus beaux lieux du bassin. Un mois de concerts d\'exception au cœur du patrimoine arcachonnais.',
        'long_description' => 'Pendant un mois, les plus grandes salles et lieux patrimoniaux du Bassin s\'ouvrent aux orchestres venus du monde entier. Concerts en plein air, récitals intimistes, surprises symphoniques. Un programme exigeant et accessible, avec la gratuité totale pour les moins de 18 ans.',
        'url' => 'https://www.lesescapadesmusicales.com/',
        'highlight' => true,
    ],
    [
        'id' => 'suzane-velodrome',
        'title' => 'Suzane · Arcachon en Scène',
        'date' => '2026-08-03',
        'date_label' => '3 août 2026',
        'time' => '21h00',
        'location' => 'Vélodrome d\'Arcachon',
        'location_tag' => 'ARCACHON',
        'category' => 'concert',
        'tags' => ['Électro-pop', 'Français'],
        'price' => '35€',
        'price_full' => 'Placement libre · 35€',
        'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=1200&auto=format&fit=crop',
        'description' => 'La chanteuse Suzane embrase le Vélodrome pour une soirée Arcachon en Scène sous les étoiles.',
        'long_description' => 'Un des moments forts de l\'été 2026 sur le Bassin. Suzane, sa pop électro engagée et ses mises en scène visuelles, pour une soirée à ciel ouvert au Vélodrome. Ouverture des portes à 19h30, première partie à 20h30.',
        'url' => '#',
        'highlight' => true,
    ],
    [
        'id' => 'mika-velodrome',
        'title' => 'Mika · Arcachon en Scène',
        'date' => '2026-08-04',
        'date_label' => '4 août 2026',
        'time' => '21h00',
        'location' => 'Vélodrome d\'Arcachon',
        'location_tag' => 'ARCACHON',
        'category' => 'concert',
        'tags' => ['Pop internationale', 'Live band'],
        'price' => '49€',
        'price_full' => 'Fosse 49€ · Gradin 59€',
        'image' => 'https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=1200&auto=format&fit=crop',
        'description' => 'Mika revient en France pour une soirée explosive face au bassin. Un des temps forts de l\'été 2026.',
        'long_description' => 'Mika pose ses valises au Vélodrome pour une nuit unique sur le bassin. Les tubes, le live band, la fête. Un concert à ne pas rater.',
        'url' => '#',
        'highlight' => true,
    ],
    [
        'id' => 'fetes-de-la-mer',
        'title' => 'Fêtes de la Mer',
        'date' => '2026-08-14',
        'date_end' => '2026-08-15',
        'date_label' => '14 & 15 août',
        'time' => 'Toute la journée',
        'location' => 'Front de mer d\'Arcachon',
        'location_tag' => 'ARCACHON',
        'category' => 'tradition',
        'tags' => ['Gratuit', 'Familial', 'Patrimoine'],
        'price' => 'Gratuit',
        'price_full' => 'Entrée libre',
        'image' => 'https://images.pexels.com/photos/13678581/pexels-photo-13678581.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Pique-nique géant, défilé nautique, traditions et animations. Le plus gros rassemblement populaire de l\'été.',
        'long_description' => 'Deux jours de fête sur le front de mer : pique-nique géant le 14 au soir, grand défilé nautique de pinasses, bénédiction de la mer, concerts, feu d\'artifice. Le rassemblement culte de l\'été.',
        'url' => '#',
        'highlight' => false,
    ],
    [
        'id' => 'cadences-2026',
        'title' => 'Festival Cadences',
        'date' => '2026-09-29',
        'date_end' => '2026-10-04',
        'date_label' => '29 sept → 4 oct',
        'time' => 'Soirs & dimanches',
        'location' => 'Théâtre Olympia & Théâtre de la Mer',
        'location_tag' => 'ARCACHON',
        'category' => 'festival',
        'tags' => ['Danse', 'Contemporain', 'Théâtre'],
        'price' => 'Dès 12€',
        'price_full' => 'Tarifs de 12€ à 28€',
        'image' => 'https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?w=1200&auto=format&fit=crop',
        'description' => 'La danse sous toutes ses formes envahit Arcachon : spectacles en salle, sur la plage et dans la rue.',
        'long_description' => 'Une semaine de danse à Arcachon : compagnies nationales et internationales, pièces intimes et grands formats, performances en extérieur sur la plage et dans les rues. Un festival exigeant, accessible à tous.',
        'url' => '#',
        'highlight' => false,
    ],
    [
        'id' => 'frappadingue-arcachon',
        'title' => 'La Frappadingue',
        'date' => '2026-05-03',
        'date_label' => '3 mai 2026',
        'time' => 'Départs à partir de 9h',
        'location' => 'Plage d\'Arcachon',
        'location_tag' => 'ARCACHON',
        'category' => 'sport',
        'tags' => ['Course à obstacles', 'Ambiance', 'Plage'],
        'price' => 'Dès 29€',
        'price_full' => '29€ - 49€ selon parcours',
        'image' => 'https://images.unsplash.com/photo-1552674605-db6ffd4facb5?w=1200&auto=format&fit=crop',
        'description' => 'La course à obstacles XXL qui transforme la plage d\'Arcachon en terrain de jeu géant. Ambiance garantie.',
        'long_description' => 'La Frappadingue débarque sur la plage d\'Arcachon : parcours de 6, 12 ou 18 km, obstacles XXL, boue, rires et déguisements. Pas besoin d\'être un champion, l\'ambiance fait tout.',
        'url' => '#',
        'highlight' => true,
    ],
    [
        'id' => 'marche-nocturne-teste',
        'title' => 'Marché nocturne de La Teste',
        'date' => '2026-07-10',
        'date_end' => '2026-08-28',
        'date_label' => 'Tous les vendredis',
        'time' => '18h → 23h',
        'location' => 'Port de La Teste-de-Buch',
        'location_tag' => 'LA TESTE',
        'category' => 'marche',
        'tags' => ['Food', 'Artisanat', 'Concert live'],
        'price' => 'Gratuit',
        'price_full' => 'Entrée libre',
        'image' => 'https://images.unsplash.com/photo-1555529902-5261145633bf?w=1200&auto=format&fit=crop',
        'description' => 'Producteurs locaux, street food, artisans et concerts live. Le rendez-vous du vendredi soir de juillet à août.',
        'long_description' => 'Tous les vendredis soirs de l\'été, le port de La Teste s\'anime : producteurs, artisans, food trucks et concert live dès 20h. Le spot pour finir la semaine les pieds dans l\'eau.',
        'url' => '#',
        'highlight' => true,
    ],
    [
        'id' => 'regate-pinasses',
        'title' => 'Régate des Pinasses',
        'date' => '2026-07-19',
        'date_label' => '19 juillet 2026',
        'time' => '14h → 19h',
        'location' => 'Bassin d\'Arcachon',
        'location_tag' => 'BASSIN',
        'category' => 'tradition',
        'tags' => ['Nautisme', 'Patrimoine', 'Gratuit'],
        'price' => 'Gratuit',
        'price_full' => 'Spectacle gratuit depuis la côte',
        'image' => 'https://images.pexels.com/photos/11001469/pexels-photo-11001469.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Les bateaux traditionnels du bassin s\'affrontent sous voile. Un spectacle inscrit au patrimoine du bassin.',
        'long_description' => 'Les pinasses, bateaux traditionnels du bassin, s\'affrontent sur un parcours chronométré. Spectacle visible depuis toutes les plages d\'Arcachon et du Pyla. Gratuit pour les spectateurs.',
        'url' => '#',
        'highlight' => false,
    ],
    [
        'id' => 'dj-set-domaine-ferret',
        'title' => 'DJ Set au Domaine du Ferret',
        'date' => '2026-07-24',
        'date_label' => 'Vendredi 24 juillet',
        'time' => '19h → 01h',
        'location' => 'Domaine du Ferret, Claouey',
        'location_tag' => 'CAP FERRET',
        'category' => 'dj-set',
        'tags' => ['House', 'Rooftop', 'Sunset'],
        'price' => 'Entrée 10€',
        'price_full' => 'Entrée 10€ avec conso',
        'image' => 'https://images.pexels.com/photos/8817296/pexels-photo-8817296.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Coucher de soleil face au bassin, house music, cocktails. Le sunset idéal du Cap.',
        'long_description' => 'Rendez-vous au Domaine du Ferret pour un DJ set sunset face au bassin. Deux artistes locaux aux platines, cocktails signature et vue carte postale.',
        'url' => '#',
        'highlight' => true,
    ],
    [
        'id' => 'soiree-white-garden',
        'title' => 'Soirée dansante au White Garden',
        'date' => '2026-07-26',
        'date_label' => 'Dimanche 26 juillet',
        'time' => '20h → 02h',
        'location' => 'White Garden, Port de La Vigne',
        'location_tag' => 'CAP FERRET',
        'category' => 'dj-set',
        'tags' => ['Dancefloor', 'Club', 'Terrasse'],
        'price' => 'Gratuit avant 23h',
        'price_full' => 'Gratuit avant 23h · 15€ après',
        'image' => 'https://images.pexels.com/photos/2531184/pexels-photo-2531184.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Le dimanche soir se danse au White Garden. Terrasse, dancefloor et DJs live.',
        'long_description' => 'Le White Garden transforme son dimanche soir en soirée dansante : DJs live, terrasse face au bassin, dancefloor. Entrée gratuite avant 23h.',
        'url' => '#',
        'highlight' => true,
    ],
];

// ===== SPOT TAGS POOL =====
// (Just reference — free-form on each spot)

$spots = [
    // RESTOS
    [
        'id' => 'chez-hortense',
        'name' => 'Chez Hortense',
        'category' => 'resto',
        'category_label' => 'Resto',
        'location' => 'Cap Ferret',
        'tags' => ['Institution', 'Moules-frites', 'Terrasse', 'Vue Dune'],
        'price_level' => '€€€',
        'image' => 'https://images.pexels.com/photos/32506944/pexels-photo-32506944.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Institution du Cap Ferret depuis 4 générations. Terrasse face à la Dune du Pilat, moules-frites mythiques.',
        'long_description' => 'Chez Hortense, c\'est l\'institution. Quatre générations, une terrasse face à la Dune, une carte simple mais parfaite. On y va pour les moules-frites, on y reste pour la vue et l\'ambiance familiale. Réservation indispensable en été.',
        'address' => '26 Av. du Sémaphore, 33970 Lège-Cap-Ferret',
        'phone' => '05 56 60 62 56',
        'instagram' => 'https://www.instagram.com/chezhortense/',
        'sponsored' => false,
    ],
    [
        'id' => 'cabane-mimbeau',
        'name' => 'La Cabane du Mimbeau',
        'category' => 'resto',
        'category_label' => 'Resto',
        'location' => 'Cap Ferret',
        'tags' => ['Huîtres', 'Dégustation', 'Panorama', 'Ostréiculteur'],
        'price_level' => '€€',
        'image' => 'https://images.pexels.com/photos/34178396/pexels-photo-34178396.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Terrasse panoramique sur la conche du Mimbeau, les meilleures huîtres du bassin loin de l\'agitation du village.',
        'long_description' => 'Loin des terrasses bondées du village, la Cabane du Mimbeau propose une dégustation d\'huîtres directement face à la conche. L\'ostréiculteur produit sur place, la terrasse en bois invite à la contemplation.',
        'address' => 'Conche du Mimbeau, 33970 Lège-Cap-Ferret',
        'phone' => '05 56 60 50 50',
        'instagram' => '#',
        'sponsored' => true,
    ],
    [
        'id' => 'le-sail-fish',
        'name' => 'Le Sail Fish',
        'category' => 'resto',
        'category_label' => 'Resto',
        'location' => 'Lège-Cap-Ferret',
        'tags' => ['DJ & dîner', 'Poisson', 'Dancefloor', 'Été'],
        'price_level' => '€€€',
        'image' => 'https://images.pexels.com/photos/5555878/pexels-photo-5555878.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Poissons, viandes grillées, cocktails, puis DJ et piste de danse. La soirée commence à table.',
        'long_description' => 'Le Sail Fish fait le grand écart entre table gastro et club. Dîner fin, cocktails pointus, puis DJ set à partir de 23h et piste de danse. Le spot hybride du Cap.',
        'address' => 'Lège-Cap-Ferret',
        'phone' => '',
        'instagram' => '#',
        'sponsored' => false,
    ],
    [
        'id' => 'bon-endroit-teste',
        'name' => 'Bon Endroit',
        'category' => 'resto',
        'category_label' => 'Resto',
        'location' => 'La Teste-de-Buch',
        'tags' => ['Brunch', 'Concept store', 'Bohème', 'Local'],
        'price_level' => '€€',
        'image' => 'https://images.pexels.com/photos/1660918/pexels-photo-1660918.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Concept store / café / cantine : brunch le dimanche, ambiance déco bohème et produits locaux.',
        'long_description' => 'Bon Endroit, c\'est le lieu hybride qui manquait à La Teste : café, cantine, concept store. Brunch le dimanche (réservation conseillée), déco bohème, carte courte et fraîche avec des produits du bassin.',
        'address' => 'Centre-ville, La Teste-de-Buch',
        'phone' => '',
        'instagram' => '#',
        'sponsored' => false,
    ],
    // BARS
    [
        'id' => 'la-madrague',
        'name' => 'La Madrague',
        'category' => 'bar',
        'category_label' => 'Bar',
        'location' => 'Cap Ferret',
        'tags' => ['Cocktails XXL', 'À partager', 'Terrasse', 'Sunset'],
        'price_level' => '€€',
        'image' => 'https://images.pexels.com/photos/2531184/pexels-photo-2531184.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Les cocktails XXL à partager entre potes. Spot incontournable des étés au Cap.',
        'long_description' => 'La Madrague a inventé le cocktail XXL : des créations à partager en bande, avec paille géante. Ambiance décontractée, terrasse côté bassin, DJ sets certains soirs.',
        'address' => 'Village du Cap, Lège-Cap-Ferret',
        'phone' => '',
        'instagram' => 'https://www.instagram.com/la_madrague_ferret/',
        'sponsored' => true,
    ],
    [
        'id' => 'paris-pyla',
        'name' => 'Paris Pyla',
        'category' => 'bar',
        'category_label' => 'Bar',
        'location' => 'Le Moulleau',
        'tags' => ['Légendaire', 'Chic', 'Zone piétonne', 'Tapas'],
        'price_level' => '€€€',
        'image' => 'https://images.pexels.com/photos/8817296/pexels-photo-8817296.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Le bar mythique du Moulleau de retour. Au cœur de la zone piétonne, pour voir et être vu.',
        'long_description' => 'Le Paris Pyla est de retour dans la zone piétonne du Moulleau. Cocktails pointus, tapas, ambiance qui monte crescendo. Le lieu où la journée finit souvent en soirée.',
        'address' => 'Le Moulleau, Arcachon',
        'phone' => '',
        'instagram' => '#',
        'sponsored' => false,
    ],
    [
        'id' => 'la-guitoune',
        'name' => 'La Guitoune',
        'category' => 'bar',
        'category_label' => 'Bar',
        'location' => 'Pyla-sur-Mer',
        'tags' => ['Summer vibes', 'Apéro', 'Convivial', 'Tard'],
        'price_level' => '€€',
        'image' => 'https://images.pexels.com/photos/8250764/pexels-photo-8250764.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Ambiance conviviale, good vibes et soirées d\'été qui durent tard. Le spot à apéro du Pyla.',
        'long_description' => 'La Guitoune, c\'est l\'apéro qui s\'étire jusqu\'à très tard. Good vibes, staff de vieux routiers de la nuit du bassin, musique forte et conviviale.',
        'address' => 'Pyla-sur-Mer',
        'phone' => '',
        'instagram' => '#',
        'sponsored' => false,
    ],
    [
        'id' => 'chez-fernande',
        'name' => 'Chez Fernande',
        'category' => 'bar',
        'category_label' => 'Bar',
        'location' => 'Arcachon',
        'tags' => ['Cocktails', 'Maison', 'Sunset', 'Créations'],
        'price_level' => '€€',
        'image' => 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?w=1200&auto=format&fit=crop',
        'description' => 'Les meilleurs cocktails du Sud-Ouest : créations maison, ingrédients frais, ambiance coucher de soleil.',
        'long_description' => 'Chez Fernande, chaque cocktail est une création maison avec des ingrédients frais et locaux. Ambiance feutrée, coucher de soleil garanti depuis la terrasse.',
        'address' => 'Arcachon',
        'phone' => '',
        'instagram' => '#',
        'sponsored' => false,
    ],
    // PLAGES
    [
        'id' => 'dune-pilat',
        'name' => 'Dune du Pilat',
        'category' => 'plage',
        'category_label' => 'Plage',
        'location' => 'La Teste-de-Buch',
        'tags' => ['Iconique', 'Sunset', 'Randonnée', 'Panorama'],
        'price_level' => '€',
        'image' => 'https://images.pexels.com/photos/22735929/pexels-photo-22735929.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'La plus haute dune d\'Europe. Coucher de soleil obligatoire au moins une fois dans ta vie.',
        'long_description' => 'La Dune du Pilat culmine à 106 mètres. La montée fait mal aux mollets, mais la vue sur le bassin, le banc d\'Arguin et l\'océan est inoubliable. Arrive au moins 1h avant le coucher du soleil.',
        'address' => '33115 La Teste-de-Buch',
        'phone' => '',
        'instagram' => '#',
        'sponsored' => false,
    ],
    [
        'id' => 'plage-pereire',
        'name' => 'Plage Pereire',
        'category' => 'plage',
        'category_label' => 'Plage',
        'location' => 'Arcachon',
        'tags' => ['Pins', 'Vue bassin', 'Famille', 'Journée'],
        'price_level' => 'Gratuit',
        'image' => 'https://images.pexels.com/photos/9722071/pexels-photo-9722071.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Sable fin, pinède en arrière-plan et vue imprenable sur le bassin. La plage parfaite pour la journée.',
        'long_description' => 'La plage Pereire est l\'une des plus agréables d\'Arcachon : sable fin, pinède en arrière-plan, vue directe sur le bassin. Parfaite pour une journée en famille, restaurants à proximité.',
        'address' => 'Avenue du Parc Pereire, 33120 Arcachon',
        'phone' => '',
        'instagram' => '#',
        'sponsored' => false,
    ],
    [
        'id' => 'plage-lagune',
        'name' => 'Plage de la Lagune',
        'category' => 'plage',
        'category_label' => 'Plage',
        'location' => 'La Teste-de-Buch',
        'tags' => ['Océan', 'Surf', 'Sauvage', 'Grande plage'],
        'price_level' => 'Gratuit',
        'image' => 'https://images.pexels.com/photos/4081219/pexels-photo-4081219.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Plage océan au sud du Pilat, vagues et grands espaces. Le spot des surfeurs et des longues balades.',
        'long_description' => 'Au sud de la Dune du Pilat, la plage de la Lagune s\'étire sur des kilomètres. Grande plage océane, vagues correctes pour le surf, ambiance sauvage. Parking gratuit à 15 min à pied.',
        'address' => '33260 La Teste-de-Buch',
        'phone' => '',
        'instagram' => '#',
        'sponsored' => false,
    ],
    [
        'id' => 'grand-crohot',
        'name' => 'Le Grand Crohot',
        'category' => 'plage',
        'category_label' => 'Plage',
        'location' => 'Lège-Cap-Ferret',
        'tags' => ['Océan', 'Forêt', 'Sunset', 'Sauvage'],
        'price_level' => 'Gratuit',
        'image' => 'https://images.pexels.com/photos/9729432/pexels-photo-9729432.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Océan, forêt de pins et coucher de soleil côté ouest. Une des plus belles plages sauvages du coin.',
        'long_description' => 'Le Grand Crohot, c\'est l\'océan brut côté Cap Ferret : forêt de pins, dunes, vagues, ambiance sauvage. Un des plus beaux couchers de soleil de la côte atlantique.',
        'address' => 'Route du Grand Crohot, 33950 Lège-Cap-Ferret',
        'phone' => '',
        'instagram' => '#',
        'sponsored' => false,
    ],
    // ACTIVITÉS
    [
        'id' => 'ile-aux-oiseaux',
        'name' => 'Île aux Oiseaux',
        'category' => 'activite',
        'category_label' => 'Activité',
        'location' => 'Bassin d\'Arcachon',
        'tags' => ['Pinasse', 'Cabanes tchanquées', 'Iconique', 'Balade'],
        'price_level' => '€€',
        'image' => 'https://images.pexels.com/photos/13492229/pexels-photo-13492229.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Balade en pinasse autour des célèbres cabanes tchanquées. Le symbole du bassin.',
        'long_description' => 'L\'Île aux Oiseaux et ses deux cabanes tchanquées sur pilotis, c\'est le symbole du Bassin. Balades en pinasse depuis Arcachon, La Teste ou Le Cap Ferret, 2 à 3h sur l\'eau.',
        'address' => 'Bassin d\'Arcachon',
        'phone' => '',
        'instagram' => '#',
        'sponsored' => false,
    ],
    [
        'id' => 'banc-arguin',
        'name' => 'Banc d\'Arguin',
        'category' => 'activite',
        'category_label' => 'Activité',
        'location' => 'Bassin d\'Arcachon',
        'tags' => ['Bateau', 'Eau turquoise', 'Pique-nique', 'Marée'],
        'price_level' => '€€',
        'image' => 'https://images.pexels.com/photos/13678581/pexels-photo-13678581.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Le banc de sable qui change de forme avec les marées. Pique-nique les pieds dans l\'eau turquoise.',
        'long_description' => 'Le Banc d\'Arguin est une réserve naturelle : banc de sable qui apparaît à marée basse face à la Dune du Pilat. Eau turquoise, oiseaux, pique-nique mémorable. Accès en bateau uniquement.',
        'address' => 'Bassin d\'Arcachon',
        'phone' => '',
        'instagram' => '#',
        'sponsored' => true,
    ],
    [
        'id' => 'surf-porge',
        'name' => 'Surf au Porge',
        'category' => 'activite',
        'category_label' => 'Activité',
        'location' => 'Le Porge',
        'tags' => ['Surf', 'École', 'Tous niveaux', 'Vagues'],
        'price_level' => '€€',
        'image' => 'https://images.pexels.com/photos/11059786/pexels-photo-11059786.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Session surf ou école pour débuter. Des vagues pour tous les niveaux, sans la foule de Lacanau.',
        'long_description' => 'Le Porge est la plage surf à 30 min du bassin. Vagues adaptées aux débutants comme aux confirmés, plusieurs écoles locales, ambiance plus tranquille que Lacanau.',
        'address' => '33680 Le Porge',
        'phone' => '',
        'instagram' => '#',
        'sponsored' => false,
    ],
    [
        'id' => 'parapente-pilat',
        'name' => 'Parapente à la Dune',
        'category' => 'activite',
        'category_label' => 'Activité',
        'location' => 'Dune du Pilat',
        'tags' => ['Sensations', 'Vue aérienne', 'Biplace', 'Expérience'],
        'price_level' => '€€€',
        'image' => 'https://images.pexels.com/photos/13722036/pexels-photo-13722036.jpeg?auto=compress&cs=tinysrgb&h=900&w=1200&fit=crop',
        'description' => 'Décoller du haut de la Dune du Pilat, survoler la forêt et le bassin. L\'expérience ultime.',
        'long_description' => 'Décoller du sommet de la plus haute dune d\'Europe, survoler la forêt des Landes et le Bassin d\'Arcachon. Baptêmes biplace avec moniteur diplômé, 20 à 30 min de vol.',
        'address' => 'Dune du Pilat, 33115 La Teste-de-Buch',
        'phone' => '',
        'instagram' => '#',
        'sponsored' => false,
    ],
];

// ===== COMMUNITY GROUPS =====
$community_groups = [
    [
        'name' => 'Bons plans Bassin',
        'description' => 'Le groupe pour repérer les meilleurs bons plans, restos et événements du week-end.',
        'members' => '420+',
        'emoji' => '🌅',
        'color' => '#FF9A6B',
        'url' => 'https://chat.whatsapp.com/placeholder1',
    ],
    [
        'name' => 'Sorties Arcachon 18-30',
        'description' => 'Soirées, afterwork, rencontres. Pour les jeunes du bassin qui veulent bouger.',
        'members' => '180+',
        'emoji' => '🍹',
        'color' => '#D88FB5',
        'url' => 'https://chat.whatsapp.com/placeholder2',
    ],
    [
        'name' => 'Surf & océan',
        'description' => 'Sessions surf, covoiturage vers Le Porge et Lacanau, bulletins météo entre passionnés.',
        'members' => '95+',
        'emoji' => '🏄',
        'color' => '#8BA0C8',
        'url' => 'https://chat.whatsapp.com/placeholder3',
    ],
    [
        'name' => 'Food du Bassin',
        'description' => 'On partage les nouvelles tables, cabanes à huîtres et adresses à tester.',
        'members' => '260+',
        'emoji' => '🦪',
        'color' => '#6B8E78',
        'url' => 'https://chat.whatsapp.com/placeholder4',
    ],
    [
        'name' => 'Familles du Bassin',
        'description' => 'Activités enfants, sorties familiales, bons plans week-end.',
        'members' => '310+',
        'emoji' => '👨‍👩‍👧',
        'color' => '#C7965D',
        'url' => 'https://chat.whatsapp.com/placeholder5',
    ],
    [
        'name' => 'Concerts & festivals',
        'description' => 'Billetterie, covoiturage, alertes annulations : on ne rate plus une date.',
        'members' => '145+',
        'emoji' => '🎶',
        'color' => '#3E4E6E',
        'url' => 'https://chat.whatsapp.com/placeholder6',
    ],
];

// ===== HELPERS =====

function get_weekend_events($events, $limit = 4) {
    $highlighted = array_filter($events, fn($e) => !empty($e['highlight']));
    usort($highlighted, fn($a, $b) => strcmp($a['date'], $b['date']));
    return array_slice($highlighted, 0, $limit);
}

function get_spots_by_category($spots, $category) {
    return array_values(array_filter($spots, fn($s) => $s['category'] === $category));
}

function get_sponsored_spots($spots) {
    return array_values(array_filter($spots, fn($s) => !empty($s['sponsored'])));
}

function get_events_by_category($events, $category) {
    return array_values(array_filter($events, fn($e) => $e['category'] === $category));
}

function find_event($events, $id) {
    foreach ($events as $e) if ($e['id'] === $id) return $e;
    return null;
}

function find_spot($spots, $id) {
    foreach ($spots as $s) if ($s['id'] === $id) return $s;
    return null;
}

function strftime_fr($month_num) {
    $months = [1=>'Jan',2=>'Fév',3=>'Mar',4=>'Avr',5=>'Mai',6=>'Juin',7=>'Juil',8=>'Août',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Déc'];
    return $months[(int)$month_num] ?? '';
}

/**
 * Cache utilitaire — stocke un tableau JSON en /tmp pour TTL secondes.
 */
function _cache_fetch($key, $ttl, callable $fetcher) {
    $file = sys_get_temp_dir() . '/nomade_' . preg_replace('/[^a-z0-9_]/i', '', $key) . '.json';
    if (is_file($file) && (time() - filemtime($file)) < $ttl) {
        $data = json_decode(@file_get_contents($file), true);
        if (is_array($data)) return $data;
    }
    try {
        $data = $fetcher();
        if (is_array($data)) @file_put_contents($file, json_encode($data));
        return $data;
    } catch (\Throwable $e) {
        if (is_file($file)) {
            $stale = json_decode(@file_get_contents($file), true);
            if (is_array($stale)) return $stale;
        }
        return null;
    }
}

/**
 * Fetch distant robuste : essaie HTTPS via cURL si dispo, sinon HTTP (pour les envs sans openssl).
 */
function _http_get($url, $timeout = 4) {
    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => $timeout,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_USERAGENT => 'Nomade Media',
        ]);
        $raw = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($raw !== false && $code >= 200 && $code < 300) return $raw;
    }
    $ctx = stream_context_create(['http' => ['timeout' => $timeout, 'header' => "User-Agent: Nomade\r\n"]]);
    $raw = @file_get_contents($url, false, $ctx);
    if ($raw !== false) return $raw;
    // Fallback : bascule en HTTP si HTTPS n'est pas dispo (envs sans openssl)
    if (strpos($url, 'https://') === 0) {
        $httpUrl = 'http://' . substr($url, 8);
        $raw = @file_get_contents($httpUrl, false, $ctx);
        if ($raw !== false) return $raw;
    }
    return null;
}

/**
 * Récupère la marée réelle via Open-Meteo Marine (sea_level_height_msl) sur Arcachon.
 * Détecte la prochaine pleine/basse mer + le sens actuel (montante/descendante).
 */
function get_tide_info() {
    $default = ['dir' => 'montante', 'type' => 'pleine mer', 'time' => '—'];
    $data = _cache_fetch('tide', 1800, function() {
        $url = 'https://marine-api.open-meteo.com/v1/marine?latitude=44.6630&longitude=-1.1683&hourly=sea_level_height_msl&timezone=Europe%2FParis&forecast_days=2';
        $raw = _http_get($url);
        if ($raw === null) return null;
        $j = json_decode($raw, true);
        if (!isset($j['hourly']['time'], $j['hourly']['sea_level_height_msl'])) return null;
        return ['t' => $j['hourly']['time'], 'h' => $j['hourly']['sea_level_height_msl']];
    });
    if (!$data) return $default;

    $times = $data['t']; $levels = $data['h'];
    $nowTs = time();
    // Index courant (dernière heure passée)
    $curIdx = 0;
    foreach ($times as $i => $t) {
        $ts = strtotime($t);
        if ($ts !== false && $ts <= $nowTs) $curIdx = $i;
    }
    $curLvl = $levels[$curIdx] ?? null;
    $nextLvl = $levels[$curIdx + 1] ?? $curLvl;
    $dir = ($nextLvl !== null && $curLvl !== null && $nextLvl > $curLvl) ? 'montante' : 'descendante';

    // Prochain extremum (peak ou trough)
    $target = null; $targetIdx = null;
    for ($i = $curIdx + 1; $i < count($levels) - 1; $i++) {
        $prev = $levels[$i - 1] ?? null;
        $cur  = $levels[$i] ?? null;
        $next = $levels[$i + 1] ?? null;
        if ($prev === null || $cur === null || $next === null) continue;
        if (($cur >= $prev && $cur >= $next) || ($cur <= $prev && $cur <= $next)) {
            $target = ($cur >= $prev) ? 'pleine mer' : 'basse mer';
            $targetIdx = $i;
            break;
        }
    }
    if ($targetIdx === null) return $default;
    $t = strtotime($times[$targetIdx]);
    return [
        'dir'  => $dir,
        'type' => $target,
        'time' => $t ? date('H\hi', $t) : '—',
    ];
}

/**
 * Récupère la météo réelle via Open-Meteo sur Arcachon.
 */
function get_weather_info() {
    $default = ['temp' => '—', 'wind_dir' => '', 'wind_speed' => '—'];
    $data = _cache_fetch('weather', 900, function() {
        $url = 'https://api.open-meteo.com/v1/forecast?latitude=44.6630&longitude=-1.1683&current=temperature_2m,wind_speed_10m,wind_direction_10m&wind_speed_unit=kn&timezone=Europe%2FParis';
        $raw = _http_get($url);
        if ($raw === null) return null;
        $j = json_decode($raw, true);
        if (!isset($j['current'])) return null;
        return $j['current'];
    });
    if (!$data) return $default;
    $degToCompass = function($deg) {
        $dirs = ['N','NNE','NE','ENE','E','ESE','SE','SSE','S','SSO','SO','OSO','O','ONO','NO','NNO'];
        return $dirs[(int)floor((((float)$deg) % 360) / 22.5 + 0.5) % 16];
    };
    return [
        'temp' => isset($data['temperature_2m']) ? (int)round($data['temperature_2m']) : '—',
        'wind_dir' => isset($data['wind_direction_10m']) ? $degToCompass($data['wind_direction_10m']) : '',
        'wind_speed' => isset($data['wind_speed_10m']) ? (int)round($data['wind_speed_10m']) : '—',
    ];
}

/**
 * Formate la date du jour en français, ex. « jeudi 24 avril 2026 ».
 */
function date_fr_long($ts = null) {
    $ts = $ts ?? time();
    $jours = ['Sunday'=>'dimanche','Monday'=>'lundi','Tuesday'=>'mardi','Wednesday'=>'mercredi','Thursday'=>'jeudi','Friday'=>'vendredi','Saturday'=>'samedi'];
    $mois  = [1=>'janvier',2=>'février',3=>'mars',4=>'avril',5=>'mai',6=>'juin',7=>'juillet',8=>'août',9=>'septembre',10=>'octobre',11=>'novembre',12=>'décembre'];
    $j = $jours[date('l', $ts)] ?? '';
    $d = (int) date('j', $ts);
    $m = $mois[(int) date('n', $ts)] ?? '';
    $y = date('Y', $ts);
    return trim(ucfirst("$j $d $m $y"));
}
