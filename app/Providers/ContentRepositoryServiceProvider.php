<?php

namespace App\Providers;

use App\Services\ContentRepository;
use Illuminate\Support\ServiceProvider;

class ContentRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ContentRepository::class, function ($app) {
            return new ContentRepository($app->getLocale());
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}