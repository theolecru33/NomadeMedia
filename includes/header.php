<?php
$page_title = $page_title ?? 'Nomade — Le média du Bassin d\'Arcachon';
$page_desc = $page_desc ?? 'Bons plans, événements, spots et soirées du Bassin d\'Arcachon. Le média qui fait vibrer la région.';
$current_page = $current_page ?? 'accueil';

$nav_items = [
    'accueil' => ['label' => 'Accueil', 'href' => 'index.php'],
    'evenements' => ['label' => 'Sortir', 'href' => 'evenements.php'],
    'spots' => ['label' => 'Les bons spots', 'href' => 'spots.php'],
    'communaute' => ['label' => 'Communauté', 'href' => 'communaute.php'],
];

$tide = get_tide_info();
$weather = get_weather_info();
$date_fr = (function() {
    $days = ['Sunday'=>'dimanche','Monday'=>'lundi','Tuesday'=>'mardi','Wednesday'=>'mercredi','Thursday'=>'jeudi','Friday'=>'vendredi','Saturday'=>'samedi'];
    $months = [1=>'janvier',2=>'février',3=>'mars',4=>'avril',5=>'mai',6=>'juin',7=>'juillet',8=>'août',9=>'septembre',10=>'octobre',11=>'novembre',12=>'décembre'];
    return $days[date('l')] . ' ' . (int)date('j') . ' ' . $months[(int)date('n')];
})();
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
    <meta name="theme-color" content="#8AA5C4">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat+Brush&family=DM+Sans:opsz,wght@9..40,300..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cdefs%3E%3CradialGradient id='g' cx='35%25' cy='30%25'%3E%3Cstop offset='0%25' stop-color='%23A7BDD4'/%3E%3Cstop offset='100%25' stop-color='%238AA5C4'/%3E%3C/radialGradient%3E%3C/defs%3E%3Ccircle cx='50' cy='50' r='46' fill='url(%23g)' stroke='%233E5C76' stroke-width='2'/%3E%3Cpath d='M30 72 L30 30 L40 30 L60 60 L60 30 L70 30 L70 72 L60 72 L40 42 L40 72 Z' fill='%23FFFDF7'/%3E%3C/svg%3E">
</head>
<body data-page="<?= htmlspecialchars($current_page) ?>">

<div class="sticky-wrap">
    <!-- TIDE RIBBON -->
    <div class="top-bar">
        <div class="container top-bar-inner">
            <div class="top-bar-items">
                <span class="top-bar-item">
                    <svg class="top-wave" width="24" height="10" viewBox="0 0 60 10"><path d="M0 5 Q 7.5 0 15 5 T 30 5 T 45 5 T 60 5" fill="none" stroke="#3E5C76" stroke-width="1.4" stroke-linecap="round"/></svg>
                    Marée <strong><?= htmlspecialchars($tide['dir']) ?></strong> · <?= htmlspecialchars($tide['type']) ?> <?= htmlspecialchars($tide['time']) ?> · coeff <?= $tide['coeff'] ?>
                </span>
                <span class="top-bar-item top-bar-location">
                    Arcachon · <strong><?= $weather['temp'] ?>°C</strong> · vent <?= htmlspecialchars($weather['wind_dir']) ?> <?= $weather['wind_speed'] ?> nds
                </span>
            </div>
            <span class="top-bar-date"><?= $date_fr ?></span>
        </div>
    </div>

    <header class="site-header" id="siteHeader">
        <div class="container nav-wrap">
            <a href="index.php" class="logo" aria-label="Nomade">
                <span class="logo-badge">
                    <span class="ln">NOMADE</span>
                    <span class="sub">COMMUNICATION</span>
                </span>
            </a>
            <nav class="main-nav" id="mainNav" aria-label="Navigation principale">
                <?php foreach ($nav_items as $key => $item): ?>
                    <a href="<?= $item['href'] ?>" class="<?= $current_page === $key ? 'active' : '' ?>"><?= $item['label'] ?></a>
                <?php endforeach; ?>
            </nav>
            <a href="https://www.instagram.com/nomademediacom" target="_blank" rel="noopener" class="nav-cta">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
                <span class="hidden-sm">@nomademediacom</span>
            </a>
            <button class="burger" id="burger" aria-label="Menu" aria-expanded="false">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>
</div>

<main>
