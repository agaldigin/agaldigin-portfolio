<?php

namespace Tests\Feature;

use Tests\TestCase;

class RouteTest extends TestCase
{
    protected array $locales = ['id', 'en'];
    protected array $projectSlugs = ['ansor-kaltim', 'bappeda-kaltim', 'koetai-mahkota-soundline'];

    public function testHomeRouteInAllLocales(): void
    {
        foreach ($this->locales as $locale) {
            $response = $this->get("/{$locale}");
            $response->assertStatus(200);
            $response->assertViewIs('home.index');
        }
    }

    public function testHomeShowsSelectedWorkInAllLocales(): void
    {
        $titles = [
            'id' => ['Aplikasi Ansor Kaltim', 'BAPPEDA Kaltim Website', 'Koetai Mahkota Soundline'],
            'en' => ['Ansor Kaltim Application', 'BAPPEDA Kaltim Website', 'Koetai Mahkota Soundline'],
        ];

        foreach ($this->locales as $locale) {
            $response = $this->get("/{$locale}");
            $response->assertStatus(200);

            foreach ($titles[$locale] as $title) {
                $response->assertSee($title);
            }

            foreach ($this->projectSlugs as $slug) {
                $response->assertSee("/{$locale}/work/{$slug}");
            }

            $projects = [
                'ansor-kaltim' => 'projects/ansor-kaltim/thumbnail.png',
                'bappeda-kaltim' => 'projects/bappeda-kaltim/thumbnail.png',
                'koetai-mahkota-soundline' => 'projects/koetai-mahkota-soundline/thumbnail.png',
            ];

            foreach ($projects as $slug => $image) {
                $this->assertFileExists(public_path($image), "Thumbnail untuk {$slug} harus ada: {$image}");
            }
        }
    }

    public function testWorkIndexRouteInAllLocales(): void
    {
        foreach ($this->locales as $locale) {
            $response = $this->get("/{$locale}/work");
            $response->assertStatus(200);
            $response->assertViewIs('work.index');
        }
    }

    public function testWorkShowRouteForAllProjectsInAllLocales(): void
    {
        foreach ($this->locales as $locale) {
            foreach ($this->projectSlugs as $slug) {
                $response = $this->withoutExceptionHandling()->get("/{$locale}/work/{$slug}");
                $response->assertStatus(200);
                $response->assertViewIs('work.show');
            }
        }
    }

    public function testAboutRouteInAllLocales(): void
    {
        foreach ($this->locales as $locale) {
            $response = $this->get("/{$locale}/about");
            $response->assertStatus(200);
            $response->assertViewIs('about.index');
        }
    }

    public function testContactRouteInAllLocales(): void
    {
        foreach ($this->locales as $locale) {
            $response = $this->get("/{$locale}/contact");
            $response->assertStatus(200);
            $response->assertViewIs('contact.index');
        }
    }

    public function testUnknownProjectSlugReturns404(): void
    {
        foreach ($this->locales as $locale) {
            $response = $this->get("/{$locale}/work/unknown-project");
            $response->assertStatus(404);
        }
    }

    public function testInvalidLocaleRedirectsToDefault(): void
    {
        $response = $this->get('/fr');
        $response->assertStatus(302);
        $response->assertRedirect('/id');

        $response = $this->get('/invalid/work/ansor-kaltim');
        $response->assertStatus(302);
        $response->assertRedirect('/id');
    }
    public function testLanguageKeysAreIdenticalBetweenLocales(): void
    {
        $id = require base_path('lang/id/site.php');
        $en = require base_path('lang/en/site.php');
        $this->assertSame(array_keys($id), array_keys($en), 'lang/site.php kunci tidak sama antara id dan en');

        $idContent = require base_path('resources/content/id/projects.php');
        $enContent = require base_path('resources/content/en/projects.php');
        $this->assertSame(array_keys($idContent), array_keys($enContent), 'projects.php slug tidak sama antara id dan en');

        foreach ($idContent as $slug => $project) {
            $this->assertSame(array_keys($project), array_keys($enContent[$slug]), "projects.php[$slug] kunci tidak sama antara id dan en");
        }
    }

    public function testAllPagesAreFreeOfTODO(): void
    {
        $paths = array_merge(
            ['/id', '/en'],
            array_map(fn ($s) => "/id/work/$s", $this->projectSlugs),
            array_map(fn ($s) => "/en/work/$s", $this->projectSlugs),
            ['/id/about', '/en/about', '/id/contact', '/en/contact', '/id/work', '/en/work']
        );

        foreach ($paths as $path) {
            $response = $this->get($path);
            $response->assertStatus(200);
            $response->assertDontSee('TODO(owner)');
        }
    }

    public function testRootRedirectsToDefaultLocale(): void
    {
        $response = $this->get('/');
        $response->assertStatus(302);
        $response->assertRedirect('/id');
    }
}