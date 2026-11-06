<?php

namespace App\Http\Controllers;

use App\Services\ContentRepository;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(protected ContentRepository $content) {}

    public function index(): View
    {
        $locale = app()->getLocale();
        $this->content->setLocale($locale);

        $selectedWork = $this->content->get('selectedwork');

        if (!isset($selectedWork['projects']) || !is_array($selectedWork['projects'])) {
            $selectedWork['projects'] = array_slice($this->content->getAllProjects(), 0, 3);
        }

        return view('home.index', [
            'hero' => $this->content->getHero(),
            'selectedWork' => $selectedWork,
            'whatIDo' => $this->content->getWhatIDo(),
            'journey' => $this->content->getJourney(),
        ]);
    }
}