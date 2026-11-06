<?php

namespace App\Http\Middleware;

use App\Services\ContentRepository;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    protected array $locales = ['id', 'en'];

    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);

        if (!in_array($locale, $this->locales)) {
            return redirect()->route('home', ['locale' => 'id']);
        }

        app()->setLocale($locale);
        $request->attributes->set('locale', $locale);

        // Update the ContentRepository singleton to use the current locale
        if (app()->bound(ContentRepository::class)) {
            app(ContentRepository::class)->setLocale($locale);
        }

        return $next($request);
    }
}