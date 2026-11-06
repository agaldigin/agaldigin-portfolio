@extends('layouts.app')

@section('title', __('errors.404.title') . ' — ' . config('site.name'))

@section('description', __('errors.404.description'))

@section('ogTitle', __('errors.404.title') . ' — ' . config('site.name'))

@section('ogDescription', __('errors.404.description'))

@section('ogImage', asset('images/og.png'))

@section('canonical', request()->url())

@section('content')
<section class="section">
    <div class="container">
        <div class="flex min-h-[60vh] flex-col items-center justify-center text-center">
            <h1 class="text-6xl font-bold tracking-tight text-accent">404</h1>
            <p class="mt-4 text-xl text-muted">{{ __('errors.404.title') }}</p>
            <p class="mt-2 text-text">{{ __('errors.404.description') }}</p>

            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}"
                   class="btn btn-primary">
                    {{ __('errors.404.back_home') }}
                </a>
                <a href="{{ route('work.index', ['locale' => app()->getLocale()]) }}"
                   class="btn btn-secondary">
                    {{ __('errors.404.view_work') }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection