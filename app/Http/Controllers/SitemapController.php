<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Services\ContentRepository;

class SitemapController extends Controller
{
    public function index(ContentRepository $content): Response
    {
        $locales = config('site.locales', ['id', 'en']);
        $routes = [
            ['route' => 'home', 'priority' => 1.0],
            ['route' => 'work.index', 'priority' => 0.9],
            ['route' => 'work.show', 'priority' => 0.8, 'slug' => 'ansor-kaltim'],
            ['route' => 'work.show', 'priority' => 0.8, 'slug' => 'bappeda-kaltim'],
            ['route' => 'work.show', 'priority' => 0.8, 'slug' => 'koetai-mahkota-soundline'],
            ['route' => 'about', 'priority' => 0.8],
            ['route' => 'contact', 'priority' => 0.7],
        ];

        $content->setLocale('id');
        $projects = $content->getAllProjects();

        $sitemap = view('sitemap.index', [
            'locales' => $locales,
            'routes' => $routes,
            'projects' => $projects,
        ]);

        return response($sitemap)->header('Content-Type', 'application/xml');
    }
}