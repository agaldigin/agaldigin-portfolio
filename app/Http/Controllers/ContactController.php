<?php

namespace App\Http\Controllers;

use App\Services\ContentRepository;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function __construct(protected ContentRepository $content) {}

    public function index(): View
    {
        $locale = app()->getLocale();
        $this->content->setLocale($locale);

        return view('contact.index', [
            'contact' => $this->content->get('contact'),
        ]);
    }
}