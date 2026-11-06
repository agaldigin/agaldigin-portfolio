<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return redirect()->route('home', ['locale' => 'id']);
});

Route::prefix('{locale}')->middleware('locale')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/work', [WorkController::class, 'index'])->name('work.index');
    Route::get('/work/{slug}', [WorkController::class, 'show'])->name('work.show');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
});
Route::get("/sitemap.xml", [\App\Http\Controllers\SitemapController::class, "index"])->name("sitemap");
Route::get("/robots.txt", function () {
    return response("User-agent: *\nDisallow:\n\nSitemap: " . route("sitemap"))->header("Content-Type", "text/plain");
})->name("robots");
