<?php
require __DIR__ . '/includes/data.php';
$page_title = 'Communauté · Nomade';
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
            <article class="group-card reveal reveal-delay-<?= ($i % 3) + 1 ?>" style="--group-color: <?= htmlspecialchars($group['color']) ?>;">
                <div class="group-card-top">
                    <span class="group-emoji"><?= $group['emoji'] ?></span>
                    <a href="<?= htmlspecialchars($group['url']) ?>" target="_blank" rel="noopener" class="whatsapp-icon" aria-label="Rejoindre sur WhatsApp">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413"/></svg>
                    </a>
                </div>
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
