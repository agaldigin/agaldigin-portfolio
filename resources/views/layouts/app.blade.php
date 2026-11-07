<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? __('site.name') }}</title>
    <meta name="description" content="{{ $description ?? __('site.description') }}">

    {{-- Favicons --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" href="{{ asset('favicon-192.png') }}" sizes="192x192" type="image/png">
    <link rel="icon" href="{{ asset('favicon-512.png') }}" sizes="512x512" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    <link rel="canonical" href="{{ $canonical ?? request()->url() }}">

    @php
        $baseUrl = rtrim(config('site.site_url', 'http://localhost:8000'), '/');
        $ogImageUrl = isset($ogImage) ? $ogImage : asset('images/og.png');
        if (!str_starts_with($ogImageUrl, 'http')) {
            $ogImageUrl = $baseUrl . '/' . ltrim($ogImageUrl, '/');
        }
        $ogTitle = isset($ogTitle) ? $ogTitle : (($title ?? __('site.name')));
        $ogDescription = isset($ogDescription) ? $ogDescription : __('site.description');
    @endphp

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $baseUrl . '/' . ltrim(request()->path(), '/') }}">
    <meta property="og:site_name" content="{{ config('site.name') }}">
    <meta property="og:locale" content="{{ app()->getLocale() === 'id' ? 'id_ID' : 'en_US' }}">
    <meta property="og:title" content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDescription }}">
    <meta property="og:image" content="{{ $ogImageUrl }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $ogTitle }}">
    <meta name="twitter:description" content="{{ $ogDescription }}">
    <meta name="twitter:image" content="{{ $ogImageUrl }}">

    @yield('jsonld')

    @foreach(config('site.locales', ['id', 'en']) as $locale)
    <link rel="alternate" hreflang="{{ $locale }}" href="{{ route(request()->route()->getName(), array_merge(request()->route()->parameters(), ['locale' => $locale])) }}">
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ route('home', ['locale' => 'id']) }}">

    <script>
        (function () {
            var theme;
            try { theme = localStorage.getItem('theme'); } catch (e) { theme = null; }
            if (theme !== 'light' && theme !== 'dark' && theme !== 'system') {
                theme = 'system';
            }
            var html = document.documentElement;
            var systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            var isDark = theme === 'dark' || (theme === 'system' && systemDark);
            html.classList.toggle('dark', isDark);
            html.setAttribute('data-theme', theme);
            html.style.colorScheme = theme === 'system' ? (systemDark ? 'dark' : 'light') : theme;
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
<body class="min-h-full flex flex-col antialiased">
    <div class="scroll-progress" aria-hidden="true"></div>
    <a href="#main" class="skip-link">{{ __('site.skip_content') }}</a>

    <header class="sticky top-0 z-50 bg-bg/80 backdrop-blur-sm sm:shadow-sm" x-data="{ scrolled: false }" @window.scroll.passive="scrolled = window.scrollY > 0" :class="scrolled ? 'shadow-md' : ''">
        <div class="container">
            <div class="flex h-16 items-center justify-between gap-4">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="font-semibold text-lg shrink-0" aria-label="{{ __('site.name') }}">
                    Aldin Nur Adzin
                </a>

                <nav class="hidden md:flex items-center gap-1" aria-label="{{ __('site.main_nav') }}">
                    <a href="{{ route('work.index', ['locale' => app()->getLocale()]) }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('work.index') ? 'bg-accent/10 text-accent' : 'hover:bg-accent/5 hover:text-accent' }}">{{ __('nav.work') }}</a>
                    <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('about') ? 'bg-accent/10 text-accent' : 'hover:bg-accent/5 hover:text-accent' }}">{{ __('nav.about') }}</a>
                    <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('contact') ? 'bg-accent/10 text-accent' : 'hover:bg-accent/5 hover:text-accent' }}">{{ __('nav.contact') }}</a>
                </nav>

                <div class="flex items-center gap-3 shrink-0">
                    <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 bg-surface rounded-xl" x-data="clock" x-init="update()">
                        <span class="text-sm text-muted">{{ __('status.location') }}</span>
                        <span class="text-muted">·</span>
                        <span class="text-sm font-mono tabular-nums text-text" aria-live="polite" x-text="time"></span> WITA
                        <span class="text-xs px-2 py-0.5 bg-accent/10 text-accent rounded-full font-medium">{{ __('status.open_to_work') }}</span>
                    </div>

                    <div class="flex items-center gap-1" role="group" aria-label="{{ __('site.language_selection') }}">
                        <a href="{{ route(request()->route()->getName(), array_merge(request()->route()->parameters(), ['locale' => 'id'])) }}" class="px-2.5 py-1.5 rounded-lg text-sm font-medium transition-colors {{ app()->getLocale() === 'id' ? 'bg-accent/10 text-accent' : 'text-muted hover:text-text hover:bg-accent/5' }}" aria-current="{{ app()->getLocale() === 'id' ? 'page' : 'false' }}" aria-label="Indonesian">ID</a>
                        <a href="{{ route(request()->route()->getName(), array_merge(request()->route()->parameters(), ['locale' => 'en'])) }}" class="px-2.5 py-1.5 rounded-lg text-sm font-medium transition-colors {{ app()->getLocale() === 'en' ? 'bg-accent/10 text-accent' : 'text-muted hover:text-text hover:bg-accent/5' }}" aria-current="{{ app()->getLocale() === 'en' ? 'page' : 'false' }}" aria-label="English">EN</a>
                    </div>

                    <div x-data="themeSwitcher" class="flex items-center gap-1 p-1 bg-surface rounded-xl shadow-sm" role="group" aria-label="{{ __('site.theme_selection') }}">
                        <button type="button" @click="set('light')" :aria-pressed="mode === 'light'" :class="mode === 'light' ? 'bg-accent/10 text-accent' : 'text-muted hover:text-text hover:bg-accent/5'" class="p-2 rounded-md transition-colors" data-theme-option="light" aria-label="{{ __('theme.light') }}">{{ __('theme.light') }}</button>
                        <button type="button" @click="set('dark')" :aria-pressed="mode === 'dark'" :class="mode === 'dark' ? 'bg-accent/10 text-accent' : 'text-muted hover:text-text hover:bg-accent/5'" class="p-2 rounded-md transition-colors" data-theme-option="dark" aria-label="{{ __('theme.dark') }}">{{ __('theme.dark') }}</button>
                        <button type="button" @click="set('system')" :aria-pressed="mode === 'system'" :class="mode === 'system' ? 'bg-accent/10 text-accent' : 'text-muted hover:text-text hover:bg-accent/5'" class="p-2 rounded-md transition-colors" data-theme-option="system" aria-label="{{ __('theme.system') }}">{{ __('theme.system') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main id="main" class="flex-1">
        @yield('content')
    </main>

    <footer class="bg-surface/50 mt-20 sm:mt-28">
        <div class="container py-8 md:py-12">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <p class="text-sm text-muted">&copy; 2026 Aldin Nur Adzin</p>

                <div class="flex flex-wrap items-center justify-center gap-4">
                    <a href="mailto:{{ config('site.email') }}" class="flex items-center gap-2 text-sm text-muted hover:text-accent transition-colors" aria-label="{{ __('contact.email') }}">{{ config('site.email') }}</a>
                    <a href="{{ config('site.github') }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-sm text-muted hover:text-accent transition-colors" aria-label="{{ __('contact.github') }}">GitHub</a>
                    <a href="{{ config('site.whatsapp') }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 px-3 py-1.5 bg-accent/10 text-accent rounded-lg text-sm font-medium hover:bg-accent/20 transition-colors" aria-label="{{ __('contact.whatsapp') }}">{{ __('contact.whatsapp') }}</a>

                    @if(config('site.linkedin'))
                    <a href="{{ config('site.linkedin') }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 text-sm text-muted hover:text-accent transition-colors" aria-label="{{ __('contact.linkedin') }}">{{ __('contact.linkedin') }}</a>
                    @endif

                    @if(file_exists(public_path('cv/Aldin-Nur-Adzin-CV.pdf')))
                    <a href="{{ asset('cv/Aldin-Nur-Adzin-CV.pdf') }}" class="flex items-center gap-2 px-3 py-1.5 rounded-lg text-sm font-medium text-text hover:text-accent transition-colors" aria-label="{{ __('footer.cv') }}">{{ __('Download CV') }}</a>
                    @endif
                </div>
                <div class="w-full md:w-auto" />
            </div>
        </div>
    </footer>
</body>
</html>