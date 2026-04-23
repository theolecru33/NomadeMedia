<?php
require __DIR__ . '/includes/data.php';
$page_title = 'Communauté — Nomade';
$page_desc = 'Rejoins la communauté Nomade : groupes WhatsApp bons plans, sorties, food, surf du Bassin d\'Arcachon.';
$current_page = 'communaute';
include __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <span class="label">La team</span>
        <h1>Rejoins la <span style="color:var(--sunset-deep);">communauté</span>.</h1>
        <p>Des groupes WhatsApp thématiques pour échanger bons plans, sorties, tips et infos entre habitants et amoureux du Bassin.</p>
    </div>
</section>

<section class="section" style="padding-top:40px;">
    <div class="container">
        <div class="community-grid">
            <?php foreach ($community_groups as $i => $group): ?>
            <article class="group-card reveal reveal-delay-<?= ($i % 3) + 1 ?>">
                <span class="group-emoji"><?= $group['emoji'] ?></span>
                <h3><?= htmlspecialchars($group['name']) ?></h3>
                <p><?= htmlspecialchars($group['description']) ?></p>
                <div class="group-meta">
                    <span class="group-members">👥 <?= htmlspecialchars($group['members']) ?> membres</span>
                    <a href="<?= htmlspecialchars($group['url']) ?>" target="_blank" rel="noopener" class="group-join">
                        Rejoindre
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <div class="reveal" style="margin-top:80px; background:white; border-radius:var(--radius-lg); padding:50px; text-align:center; box-shadow:var(--shadow-sm); border:1px solid rgba(139,160,200,0.15);">
            <span style="font-size:3rem; display:block; margin-bottom:14px;">💬</span>
            <h2 style="margin-bottom:14px;">Tu veux créer ton propre groupe&nbsp;?</h2>
            <p style="color:var(--ink-soft); max-width:540px; margin:0 auto 28px;">Une passion, un quartier, un hobby&nbsp;? On peut référencer ton groupe dans la communauté Nomade. Contacte-nous sur Instagram.</p>
            <a href="https://www.instagram.com/nomademediacom" target="_blank" rel="noopener" class="btn btn-primary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/></svg>
                Nous contacter
            </a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
