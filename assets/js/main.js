// ===== NOMADE — main interactions =====

document.addEventListener('DOMContentLoaded', () => {

    // Header scroll state
    const header = document.getElementById('siteHeader');
    const onScroll = () => {
        if (!header) return;
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

    // Spot filter pills
    const spotFilter = document.querySelector('[data-spot-filter]');
    const spotGrid = document.querySelector('[data-spot-grid]');
    if (spotFilter && spotGrid) {
        const pills = spotFilter.querySelectorAll('.pill');
        const filterSpots = (cat) => {
            pills.forEach(p => p.classList.toggle('active', p.dataset.category === cat));
            const cards = spotGrid.querySelectorAll('[data-spot-category]');
            let visible = 0;
            cards.forEach(card => {
                const match = cat === 'all' || card.dataset.spotCategory === cat;
                card.style.display = match ? '' : 'none';
                if (match) visible++;
            });
            const empty = spotGrid.querySelector('.spot-empty');
            if (empty) empty.style.display = visible === 0 ? '' : 'none';
        };
        pills.forEach(pill => pill.addEventListener('click', () => filterSpots(pill.dataset.category)));

        const urlCat = new URLSearchParams(window.location.search).get('cat');
        if (urlCat && spotFilter.querySelector(`.pill[data-category="${urlCat}"]`)) {
            filterSpots(urlCat);
        }
    }

    // Event filter pills
    const eventFilter = document.querySelector('[data-event-filter]');
    const eventGrid = document.querySelector('[data-event-grid]');
    if (eventFilter && eventGrid) {
        const pills = eventFilter.querySelectorAll('.pill');
        const filterEvents = (cat) => {
            pills.forEach(p => p.classList.toggle('active', p.dataset.eventCategory === cat));
            const cards = eventGrid.querySelectorAll('[data-event-category]');
            let visible = 0;
            cards.forEach(card => {
                const match = cat === 'all' || card.dataset.eventCategory === cat;
                card.style.display = match ? '' : 'none';
                if (match) visible++;
            });
            const empty = eventGrid.querySelector('.event-empty');
            if (empty) empty.style.display = visible === 0 ? '' : 'none';
        };
        pills.forEach(pill => pill.addEventListener('click', () => filterEvents(pill.dataset.eventCategory)));

        const urlCat = new URLSearchParams(window.location.search).get('cat');
        if (urlCat && eventFilter.querySelector(`.pill[data-event-category="${urlCat}"]`)) {
            filterEvents(urlCat);
        }
    }

    // Subtle hover lift on polaroids (hover-capable devices only)
    const polaroids = document.querySelectorAll('.polaroid');
    if (polaroids.length && window.matchMedia('(hover: hover)').matches) {
        polaroids.forEach(p => {
            p.addEventListener('mouseenter', () => { p.style.setProperty('--hover-lift', '1'); });
            p.addEventListener('mouseleave', () => { p.style.setProperty('--hover-lift', '0'); });
        });
    }
});
