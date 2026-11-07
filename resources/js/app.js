import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Theme initialization (runs before paint to avoid flash)
(function () {
    const theme = localStorage.getItem('theme');
    const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const effective = theme === 'dark' || (!theme && systemDark);
    document.documentElement.classList.toggle('dark', effective);
})();

Alpine.data('themeSwitcher', () => ({
    mode: 'system',
    init() {
        this.mode = this.loadMode() || 'system';
        this.apply(this.mode);

        this.$watch('mode', (value) => {
            this.saveMode(value);
            this.apply(value);
        });

        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
            if (this.mode === 'system') {
                this.apply('system');
            }
        });
    },
    loadMode() {
        try {
            const value = localStorage.getItem('theme');
            return value === 'light' || value === 'dark' || value === 'system' ? value : null;
        } catch (e) {
            return null;
        }
    },
    saveMode(value) {
        try {
            localStorage.setItem('theme', value);
        } catch (e) {
            // ignore quota/private-mode errors
        }
    },
    apply(value) {
        const html = document.documentElement;
        const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isDark = value === 'dark' || (value === 'system' && systemDark);

        html.classList.toggle('dark', isDark);
        html.setAttribute('data-theme', value);
        html.style.colorScheme = value === 'system' ? (systemDark ? 'dark' : 'light') : value;
    },
    set(value) {
        this.mode = value;
    },
}));

Alpine.data('locale', () => ({
    current: document.documentElement.lang || 'id',
    switchLocale(lang) {
        const path = window.location.pathname;
        const newPath = path.replace(/^\/(id|en)/, '/' + lang);
        window.location.href = newPath;
    },
}));

Alpine.data('clock', () => ({
    time: '',
    init() {
        this.update();
        setInterval(() => this.update(), 60000);
    },
    update() {
        const now = new Date();
        const options = {
            timeZone: 'Asia/Makassar',
            hour: '2-digit',
            minute: '2-digit',
            hour12: false,
        };
        this.time = now.toLocaleTimeString(
            document.documentElement.lang === 'id' ? 'id-ID' : 'en-US',
            options
        );
    },
}));

Alpine.data('mobileMenu', () => ({
    open: false,
    toggle() {
        this.open = !this.open;
    },
    close() {
        this.open = false;
    },
}));

Alpine.data('workFilter', () => ({
    category: 'all',
    tech: 'all',
    projects: [],
    init() {
        this.projects = this.$el.querySelectorAll('[data-project]');
    },
    filter() {
        this.projects.forEach((project) => {
            const cat = project.dataset.category;
            const tech = project.dataset.tech;
            const catMatch = this.category === 'all' || cat === this.category;
            const techMatch = this.tech === 'all' || tech.split(',').includes(this.tech);
            project.style.display = catMatch && techMatch ? '' : 'none';
        });
    },
}));

// D3: Scroll parallax hero layers + scroll-progress bar (rAF, non-blocking)
(function () {
    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const isNarrow = window.matchMedia('(max-width: 767px)').matches;
    const isCoarse = window.matchMedia('(pointer: coarse)').matches;

    if (prefersReduced || isNarrow || isCoarse) return;

    const layers = document.querySelectorAll('.parallax-layer');
    const progress = document.querySelector('.scroll-progress');
    if (!layers.length && !progress) return;

    let ticking = false;
    function onScroll() {
        if (ticking) return;
        ticking = true;
        window.requestAnimationFrame(() => {
            const y = window.scrollY;
            const max = Math.max(document.body.scrollHeight - window.innerHeight, 1);
            const pct = y / max;

            layers.forEach((layer) => {
                const speed = layer.classList.contains('parallax-layer-1') ? 0.15 : 0.3;
                const offset = Math.max(-80, Math.min(80, y * -speed));
                layer.style.transform = `translate3d(0, ${offset}px, 0)`;
            });

            if (progress) progress.style.transform = `scaleX(${pct})`;
            ticking = false;
        });
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
})();

// D3: Reveal saat scroll via IntersectionObserver
(function () {
    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReduced) return;

    const revealEls = document.querySelectorAll('.reveal');
    if (!revealEls.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1 }
    );

    revealEls.forEach((el) => {
        el.classList.add('reveal-init');
        observer.observe(el);
    });

    // Safety: if after 2s any .reveal-init not visible, show all
    setTimeout(() => {
        document.querySelectorAll('.reveal-init').forEach((el) => {
            el.classList.remove('reveal-init');
            el.style.opacity = '1';
            el.style.transform = 'none';
        });
    }, 2000);
})();

Alpine.start();