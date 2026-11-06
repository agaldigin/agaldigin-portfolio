<?php

namespace App\Http\Controllers;

use App\Services\ContentRepository;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function __construct(protected ContentRepository $content) {}

    public function index(): View
    {
        $locale = app()->getLocale();
        $this->content->setLocale($locale);

        return view('about.index', [
            'bio' => $this->content->getBio(),
            'timeline' => $this->content->getTimeline(),
            'credentials' => $this->content->getCredentials(),
            'skills' => $this->content->getSkills(),
        ]);
    }
}