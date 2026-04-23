<?php
/**
 * Header shared across all pages.
 * Pages set $page_title, $page_desc, $current_page before including.
 */
$page_title = $page_title ?? 'Nomade — Le média du Bassin d\'Arcachon';
$page_desc = $page_desc ?? 'Bons plans, événements, spots et soirées du Bassin d\'Arcachon. Le média qui fait vibrer la région.';
$current_page = $current_page ?? 'accueil';

$nav_items = [
    'accueil' => ['label' => 'Accueil', 'href' => 'index.php'],
    'evenements' => ['label' => 'Événements', 'href' => 'evenements.php'],
    'spots' => ['label' => 'Spots', 'href' => 'spots.php'],
    'communaute' => ['label' => 'Communauté', 'href' => 'communaute.php'],
];

$tide = get_tide_info();
$weather = get_weather_info();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_desc) ?>">
    <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($page_desc) ?>">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#8BA0C8">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&family=Caveat:wght@500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ccircle cx='50' cy='50' r='48' fill='%238BA0C8'/%3E%3Ctext x='50' y='62' text-anchor='middle' font-family='Georgia' font-size='40' font-weight='700' fill='white'%3EN%3C/text%3E%3C/svg%3E">
</head>
<body data-page="<?= htmlspecialchars($current_page) ?>">

<div class="top-bar">
    <div class="container top-bar-inner">
        <div class="top-bar-items">
            <span class="top-bar-item">
                <svg class="top-wave" width="28" height="10" viewBox="0 0 60 10" aria-hidden="true"><path d="M0 5 Q 7.5 0 15 5 T 30 5 T 45 5 T 60 5" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                Marée <strong><?= htmlspecialchars($tide['dir']) ?></strong> · <?= htmlspecialchars($tide['type']) ?> à <?= htmlspecialchars($tide['time']) ?>
                <span class="top-sep">·</span> coeff <?= $tide['coeff'] ?>
            </span>
            <span class="top-bar-item">
                <span class="top-emoji">☀️</span>
                <strong><?= $weather['temp'] ?>°C</strong> · vent <?= htmlspecialchars($weather['wind_dir']) ?> <?= $weather['wind_speed'] ?> nœuds
            </span>
            <span class="top-bar-item top-bar-location">
                📍 Arcachon · La Teste · Pyla · Cap Ferret
            </span>
        </div>
        <span class="top-bar-date"><?= date('l j F Y', strtotime('today')) ?></span>
    </div>
</div>

<header class="site-header" id="siteHeader">
    <div class="container nav-wrap">
        <a href="index.php" class="logo" aria-label="Nomade">
            <span class="logo-mark">N</span>
            <span>Nomade</span>
        </a>
        <nav class="main-nav" id="mainNav" aria-label="Navigation principale">
            <?php foreach ($nav_items as $key => $item): ?>
                <a href="<?= $item['href'] ?>" class="<?= $current_page === $key ? 'active' : '' ?>"><?= $item['label'] ?></a>
            <?php endforeach; ?>
        </nav>
        <a href="https://www.instagram.com/nomademediacom" target="_blank" rel="noopener" class="nav-cta">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
            Suivre
        </a>
        <button class="burger" id="burger" aria-label="Menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>

<main>
