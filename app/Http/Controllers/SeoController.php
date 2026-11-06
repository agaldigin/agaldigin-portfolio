<?php

namespace App\Http\Controllers;

use App\Services\ContentRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        $locales = config('site.locales', ['id', 'en']);
        $baseUrl = rtrim(config('site.site_url'), '/');
        $now = now()->toAtomString();

        $urls = [];

        // Static pages for each locale
        $staticRoutes = ['home', 'work.index', 'about', 'contact'];

        foreach ($locales as $locale) {
            foreach ($staticRoutes as $routeName) {
                $url = route($routeName, ['locale' => $locale], false);
                $urls[] = [
                    'loc' => $baseUrl . $url,
                    'lastmod' => $now,
                    'changefreq' => 'weekly',
                    'priority' => $routeName === 'home' ? '1.0' : '0.8',
                    'alternates' => [],
                ];
            }

            // Project pages
            $repo = new ContentRepository($locale);
            $projects = $repo->getAllProjects();

            foreach ($projects as $slug => $project) {
                $url = route('work.show', ['locale' => $locale, 'slug' => $slug], false);
                $urls[] = [
                    'loc' => $baseUrl . $url,
                    'lastmod' => $now,
                    'changefreq' => 'monthly',
                    'priority' => '0.7',
                    'alternates' => [],
                ];
            }
        }

        // Add hreflang alternates
        foreach ($urls as &$url) {
            foreach ($locales as $locale) {
                $altUrl = $this->getAlternateUrl($url['loc'], $locale, $baseUrl);
                if ($altUrl !== $url['loc']) {
                    $url['alternates'][] = [
                        'href' => $altUrl,
                        'hreflang' => $locale,
                    ];
                }
            }
            // x-default points to Indonesian (first locale)
            $url['alternates'][] = [
                'href' => $this->getAlternateUrl($url['loc'], $locales[0], $baseUrl),
                'hreflang' => 'x-default',
            ];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        $xml .= '        xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

        foreach ($urls as $url) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . htmlspecialchars($url['loc'], ENT_QUOTES, 'UTF-8') . '</loc>' . "\n";
            $xml .= '    <lastmod>' . $url['lastmod'] . '</lastmod>' . "\n";
            $xml .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . "\n";
            $xml .= '    <priority>' . $url['priority'] . '</priority>' . "\n";

            foreach ($url['alternates'] as $alt) {
                $xml .= '    <xhtml:link rel="alternate" hreflang="' . $alt['hreflang'] . '" href="' . htmlspecialchars($alt['href'], ENT_QUOTES, 'UTF-8') . '" />' . "\n";
            }

            $xml .= '  </url>' . "\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml')
            ->header('Cache-Control', 'public, max-age=3600, s-maxage=3600');
    }

    public function robots(): Response
    {
        $baseUrl = rtrim(config('site.site_url'), '/');
        $sitemapUrl = $baseUrl . route('seo.sitemap', [], false);

        $content = "User-agent: *\n";
        $content .= "Allow: /\n\n";
        $content .= "Sitemap: {$sitemapUrl}\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain')
            ->header('Cache-Control', 'public, max-age=86400, s-maxage=86400');
    }

    private function getAlternateUrl(string $currentUrl, string $targetLocale, string $baseUrl): string
    {
        $locales = config('site.locales', ['id', 'en']);
        $currentLocale = null;

        foreach ($locales as $locale) {
            if (str_starts_with($currentUrl, $baseUrl . '/' . $locale . '/') || $currentUrl === $baseUrl . '/' . $locale) {
                $currentLocale = $locale;
                break;
            }
        }

        if ($currentLocale === $targetLocale) {
            return $currentUrl;
        }

        if ($currentLocale) {
            return str_replace('/' . $currentLocale . '/', '/' . $targetLocale . '/', $currentUrl);
        }

        // Fallback: try to determine from route
        return $baseUrl . '/' . $targetLocale . '/';
    }
}