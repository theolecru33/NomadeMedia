// ===== NOMADE — main interactions =====

document.addEventListener('DOMContentLoaded', () => {

    // Header scroll state
    const header = document.getElementById('siteHeader');
    const onScroll = () => {
        if (window.scrollY > 24) header.classList.add('scrolled');
        else header.classList.remove('scrolled');
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    // Burger menu
    const burger = document.getElementById('burger');
    const mainNav = document.getElementById('mainNav');
    if (burger && mainNav) {
        burger.addEventListener('click', () => {
            const open = mainNav.classList.toggle('open');
            burger.classList.toggle('open', open);
            burger.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    }

    // Reveal on scroll (IntersectionObserver)
    const revealEls = document.querySelectorAll('.reveal');
    if (revealEls.length) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('in');
                    io.unobserve(e.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach(el => io.observe(el));
    }

    // Category tabs (spots filter on homepage & spots page)
    const tabs = document.querySelectorAll('.category-tab');
    const grid = document.querySelector('[data-spot-grid]');
    if (tabs.length && grid) {
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const cat = tab.dataset.category;
                tabs.forEach(t => t.classList.toggle('active', t === tab));

                const cards = grid.querySelectorAll('[data-spot-category]');
                let visible = 0;
                cards.forEach(card => {
                    const match = cat === 'all' || card.dataset.spotCategory === cat;
                    card.style.display = match ? '' : 'none';
                    if (match) visible++;
                });

                const empty = grid.querySelector('.spot-empty');
                if (empty) empty.style.display = visible === 0 ? '' : 'none';
            });
        });

        // Preselect from URL ?cat=
        const urlCat = new URLSearchParams(window.location.search).get('cat');
        if (urlCat) {
            const preset = document.querySelector(`.category-tab[data-category="${urlCat}"]`);
            if (preset) preset.click();
        }
    }

    // Event cards: expand detail on click (toggle)
    document.querySelectorAll('.event-card').forEach(card => {
        card.addEventListener('click', (e) => {
            // if clicking an inner link, let it happen
            if (e.target.closest('a, button')) return;
            card.classList.toggle('expanded');
        });
    });

    // Parallax subtle on hero visual
    const heroVisual = document.querySelector('.hero-visual');
    if (heroVisual && window.matchMedia('(min-width: 960px)').matches) {
        const cards = heroVisual.querySelectorAll('.hero-card');
        heroVisual.addEventListener('mousemove', (e) => {
            const rect = heroVisual.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;
            cards.forEach((c, i) => {
                const depth = (i + 1) * 6;
                c.style.transform = `${c.dataset.baseTransform || ''} translate(${x * depth}px, ${y * depth}px)`;
            });
        });
        cards.forEach(c => { c.dataset.baseTransform = getComputedStyle(c).transform === 'none' ? '' : getComputedStyle(c).transform; });
    }
});
