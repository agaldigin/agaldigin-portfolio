<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xhtml="http://www.w3.org/1999/xhtml">
    @foreach(config('site.locales', ['id', 'en']) as $locale)
        @php
            $alternates = [];
            foreach (config('site.locales', ['id', 'en']) as $altLocale) {
                $alternates[] = '<xhtml:link rel="alternate" hreflang="' . $altLocale . '" href="' . e(route('home', ['locale' => $altLocale])) . '" />';
            }
        @endphp
        <url>
            <loc>{{ route('home', ['locale' => $locale]) }}</loc>
            <lastmod>{{ now()->toDateString() }}</lastmod>
            <priority>1.0</priority>
            {!! implode("\n            ", $alternates) !!}
        </url>
        <url>
            <loc>{{ route('work.index', ['locale' => $locale]) }}</loc>
            <lastmod>{{ now()->toDateString() }}</lastmod>
            <priority>0.9</priority>
            {!! implode("\n            ", $alternates) !!}
        </url>
        <url>
            <loc>{{ route('about', ['locale' => $locale]) }}</loc>
            <lastmod>{{ now()->toDateString() }}</lastmod>
            <priority>0.8</priority>
            {!! implode("\n            ", $alternates) !!}
        </url>
        <url>
            <loc>{{ route('contact', ['locale' => $locale]) }}</loc>
            <lastmod>{{ now()->toDateString() }}</lastmod>
            <priority>0.7</priority>
            {!! implode("\n            ", $alternates) !!}
        </url>
        @php
            $content = app(App\Services\ContentRepository::class);
            $content->setLocale($locale);
            $projects = $content->getAllProjects();
        @endphp
        @foreach($projects as $slug => $project)
        <url>
            <loc>{{ route('work.show', ['locale' => $locale, 'slug' => $project['slug'] ?? $slug]) }}</loc>
            <lastmod>{{ now()->toDateString() }}</lastmod>
            <priority>0.8</priority>
            {!! implode("\n            ", $alternates) !!}
        </url>
        @endforeach
    @endforeach
</urlset>
