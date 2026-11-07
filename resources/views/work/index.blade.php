@extends('layouts.app')

@section('title', __('work.title') . ' | ' . config('site.name'))

@section('description', __('work.subtitle'))

@section('ogTitle', __('work.title') . ' | ' . config('site.name'))

@section('ogDescription', __('work.subtitle'))


@section('ogImage', asset('images/og.png'))

@section('canonical', route('work.index', ['locale' => app()->getLocale()]))

@section('content')
<section class="section" aria-labelledby="work-heading">
    <div class="container">
        <header class="mb-12 text-center">
            <h1 id="work-heading" class="section-title">{{ __('work.title') }}</h1>
            <p class="section-subtitle">{{ __('work.subtitle') }}</p>
        </header>

        {{-- Filters --}}
        <div x-data="workFilter" class="mb-10 flex flex-wrap items-center justify-center gap-3" role="group" aria-label="{{ __('work.filter_by') }}">
            <div class="flex flex-wrap gap-2" role="radiogroup" aria-label="{{ __('work.filter_category') }}">
                @foreach(['all' => __('work.all'), 'fullstack' => __('work.fullstack'), 'frontend' => __('work.frontend'), 'backend' => __('work.backend')] as $key => $label)
                    <button @click="category = '{{ $key }}'; filter()"
                            :class="category === '{{ $key }}' ? 'bg-accent/10 text-accent' : 'text-muted hover:text-text hover:bg-accent/5'"
                            class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors"
                            role="radio"
                            :aria-checked="category === '{{ $key }}'">
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            <div class="flex flex-wrap gap-2" role="radiogroup" aria-label="{{ __('work.filter_tech') }}">
                <button @click="tech = 'all'; filter()"
                        :class="tech === 'all' ? 'bg-accent/10 text-accent' : 'text-muted hover:text-text hover:bg-accent/5'"
                        class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors"
                        role="radio"
                        :aria-checked="tech === 'all'">
                    {{ __('work.all') }}
                </button>
                @php
                    $allTech = collect($projects)->flatMap(fn($p) => $p['technologies'] ?? [])->unique()->values()->all();
                @endphp
                @foreach($allTech as $tech)
                    <button @click="tech = '{{ $tech }}'; filter()"
                            :class="tech === '{{ $tech }}' ? 'bg-accent/10 text-accent' : 'text-muted hover:text-text hover:bg-accent/5'"
                            class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors"
                            role="radio"
                            :aria-checked="tech === '{{ $tech }}'">
                        {{ $tech }}
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Projects Grid --}}
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-2" x-data="workFilter" x-init="projects = $el.querySelectorAll('[data-project]')">
            @foreach($projects as $project)
                @include('components.project-card', [
                    'project' => $project,
                    'cardClass' => ($project['featured'] ?? false) ? 'lg:col-span-2' : ''
                ])
            @endforeach
        </div>

        {{-- Empty State --}}
        <div x-show="!$el.querySelector('[data-project]:not([style*=\"display: none\"])')" x-transition class="hidden text-center py-12">
            <p class="text-muted">{{ __('work.empty') }}</p>
        </div>
    </div>
</section>
@endsection