<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($locales as $locale)
        <url>
            <loc>{{ route('home', ['locale' => $locale]) }}</loc>
            <lastmod>{{ now()->toDateString() }}</lastmod>
            <priority>1.0</priority>
            <xhtml:link rel="alternate" hreflang="id" href="{{ route('home', ['locale' => 'id']) }}" xmlns:xhtml="http://www.w3.org/1999/xhtml"/>
            <xhtml:link rel="alternate" hreflang="en" href="{{ route('home', ['locale' => 'en']) }}" xmlns:xhtml="http://www.w3.org/1999/xhtml"/>
        </url>
        <url>
            <loc>{{ route('work.index', ['locale' => $locale]) }}</loc>
            <lastmod>{{ now()->toDateString() }}</lastmod>
            <priority>0.9</priority>
        </url>
        <url>
            <loc>{{ route('about', ['locale' => $locale]) }}</loc>
            <lastmod>{{ now()->toDateString() }}</lastmod>
            <priority>0.8</priority>
        </url>
        <url>
            <loc>{{ route('contact', ['locale' => $locale]) }}</loc>
            <lastmod>{{ now()->toDateString() }}</lastmod>
            <priority>0.7</priority>
        </url>
        @foreach($projects as $slug => $project)
        <url>
            <loc>{{ route('work.show', ['locale' => $locale, 'slug' => $project['slug'] ?? $slug]) }}</loc>
            <lastmod>{{ now()->toDateString() }}</lastmod>
            <priority>0.8</priority>
        </url>
        @endforeach
    @endforeach
</urlset>