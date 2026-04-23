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

    // Reveal on scroll
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

    // Spot category tabs
    const tabs = document.querySelectorAll('.category-tab[data-category]');
    const spotGrid = document.querySelector('[data-spot-grid]');
    if (tabs.length && spotGrid) {
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const cat = tab.dataset.category;
                tabs.forEach(t => t.classList.toggle('active', t === tab));
                const cards = spotGrid.querySelectorAll('[data-spot-category]');
                let visible = 0;
                cards.forEach(card => {
                    const match = cat === 'all' || card.dataset.spotCategory === cat;
                    card.style.display = match ? '' : 'none';
                    if (match) visible++;
                });
                const empty = spotGrid.querySelector('.spot-empty');
                if (empty) empty.style.display = visible === 0 ? '' : 'none';
            });
        });

        const urlCat = new URLSearchParams(window.location.search).get('cat');
        if (urlCat) {
            const preset = document.querySelector(`.category-tab[data-category="${urlCat}"]`);
            if (preset) preset.click();
        }
    }

    // Event category tabs
    const eventTabs = document.querySelectorAll('.category-tab[data-event-category]');
    const eventGrid = document.querySelector('[data-event-grid]');
    if (eventTabs.length && eventGrid) {
        eventTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const cat = tab.dataset.eventCategory;
                eventTabs.forEach(t => t.classList.toggle('active', t === tab));
                const cards = eventGrid.querySelectorAll('[data-event-category]');
                let visible = 0;
                cards.forEach(card => {
                    const match = cat === 'all' || card.dataset.eventCategory === cat;
                    card.style.display = match ? '' : 'none';
                    if (match) visible++;
                });
                const empty = eventGrid.querySelector('.event-empty');
                if (empty) empty.style.display = visible === 0 ? '' : 'none';
            });
        });

        const urlCat = new URLSearchParams(window.location.search).get('cat');
        if (urlCat) {
            const preset = document.querySelector(`.category-tab[data-event-category="${urlCat}"]`);
            if (preset) preset.click();
        }
    }

    // Subtle parallax on polaroid grid
    const polaroids = document.querySelectorAll('.polaroid');
    if (polaroids.length && window.matchMedia('(hover: hover)').matches) {
        polaroids.forEach(p => {
            p.addEventListener('mouseenter', () => { p.style.setProperty('--hover-lift', '1'); });
            p.addEventListener('mouseleave', () => { p.style.setProperty('--hover-lift', '0'); });
        });
    }
});
