<?php

namespace App\Http\Controllers;

use App\Services\ContentRepository;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class WorkController extends Controller
{
    public function __construct(protected ContentRepository $content) {}

    public function index(): View
    {
        $locale = app()->getLocale();
        $this->content->setLocale($locale);

        return view('work.index', [
            'projects' => $this->content->getAllProjects(),
        ]);
    }

    public function show(string $locale, string $slug): View
    {
        $this->content->setLocale($locale);

        $project = $this->content->getProject($slug);

        if (!$project) {
            throw new NotFoundHttpException();
        }

        return view('work.show', [
            'project' => $project,
            'allProjects' => $this->content->getAllProjects(),
            'slug' => $slug,
        ]);
    }
}