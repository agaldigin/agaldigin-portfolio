<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class ContentRepository
{
    protected string $locale;
    protected string $contentPath;

    public function __construct(string $locale = 'id')
    {
        $this->locale = in_array($locale, ['id', 'en']) ? $locale : 'id';
        $this->contentPath = resource_path("content/{$this->locale}");
    }

    public function setLocale(string $locale): self
    {
        $this->locale = in_array($locale, ['id', 'en']) ? $locale : 'id';
        $this->contentPath = resource_path("content/{$this->locale}");
        return $this;
    }
    /**
     * Hapus nilai/field bernilai 'TODO(owner)' dan field kosong secara rekursif
     * sebelum konten dirender ke UI.
     *
     * @param  mixed  $value
     * @return mixed
     */
    public function sanitize($value)
    {
        if (is_array($value)) {
            $result = [];
            foreach ($value as $key => $item) {
                $item = $this->sanitize($item);
                if ($item === '') {
                    continue;
                }
                if (is_string($item) && str_contains($item, 'TODO(owner)')) {
                    continue;
                }
                $result[$key] = $item;
            }

            return $result;
        }

        return $value;
    }

    public function get(string $file): array
    {
        $path = "{$this->contentPath}/{$file}.php";

        if (!File::exists($path)) {
            return [];
        }

        return $this->sanitize(require $path);
    }

    public function getProject(string $slug): ?array
    {
        $projects = $this->get('projects');
        return $projects[$slug] ?? null;
    }

    public function getAllProjects(): array
    {
        return $this->get('projects');
    }

    public function getTimeline(): array
    {
        return $this->get('timeline');
    }

    public function getCredentials(): array
    {
        return $this->get('credentials');
    }

    public function getSkills(): array
    {
        return $this->get('skills');
    }

    public function getBio(): array
    {
        return $this->get('bio');
    }

    public function getHero(): array
    {
        return $this->get('hero');
    }

    public function getJourney(): array
    {
        return $this->get('journey');
    }

    public function getWhatIDo(): array
    {
        return $this->get('whatido');
    }
}