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

Alpine.start();