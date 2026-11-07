@extends('layouts.app')

@section('title', $project['title'] . ' — ' . __('work.title') . ' — ' . config('site.name'))

@section('description', $project['summary'])

@section('ogTitle', $project['title'] . ' — ' . __('work.title') . ' — ' . config('site.name'))

@section('ogDescription', $project['summary'])

@section('ogImage', $project['thumbnail'] ? asset('projects/' . $project['slug'] . '/' . $project['thumbnail']) : asset('images/og.png'))

@section('canonical', route('work.show', ['locale' => app()->getLocale(), 'slug' => $project['slug']]))

@section('content')
<section class="section" aria-labelledby="project-heading">
    <div class="container">
        {{-- Back to Work --}}
        <nav class="mb-8" aria-label="Breadcrumb">
            <ol class="flex items-center gap-2 text-sm text-muted">
                <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="hover:text-accent">{{ __('nav.home') }}</a></li>
                <li aria-hidden="true">/</li>
                <li><a href="{{ route('work.index', ['locale' => app()->getLocale()]) }}" class="hover:text-accent">{{ __('nav.work') }}</a></li>
                <li aria-hidden="true">/</li>
                <li class="text-text" aria-current="page">{{ $project['title'] }}</li>
            </ol>
        </nav>

        {{-- Summary Block --}}
        <div class="grid gap-8 lg:grid-cols-3 mb-12">
            <div class="lg:col-span-2">
                <h1 id="project-heading" class="text-3xl md:text-4xl font-bold tracking-tight mb-4">{{ $project['title'] }}</h1>
                <p class="text-lg text-muted mb-8">{{ $project['summary'] }}</p>

                <dl class="grid gap-4 sm:grid-cols-2 text-sm">
                    <div>
                        <dt class="text-muted mb-1">{{ __('project.role') }}</dt>
                        <dd class="font-medium">{{ $project['role'] }}</dd>
                    </div>
                    <div>
                        <dt class="text-muted mb-1">{{ __('project.period') }}</dt>
                        <dd class="font-medium">{{ $project['period'] ?? '' }}</dd>
                    </div>
                    <div>
                        <dd class="font-medium">{{ $project['team'] ?? '' }}</dd>
                    </div>
                    <div>
                        <dd class="font-medium">{{ $project['status'] ?? '' }}</dd>
                    </div>
                    <div class="sm:col-span-2">
                        <dt class="text-muted mb-1">{{ __('project.stack') }}</dt>
                        <dd class="flex flex-wrap gap-2">
                            @foreach($project['stack'] as $tech)
                                <span class="badge badge-accent">{{ $tech }}</span>
                            @endforeach
                        </dd>
                    </div>
                </dl>
            </div>

            <div>
                @if($project['repo_url'])
                    <a href="{{ $project['repo_url'] }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn btn-secondary w-full mb-3 {{ $project['repo_private'] ? 'opacity-75' : '' }}">
                        @if($project['repo_private'])
                            <span class="badge badge-private mr-2">{{ __('project.private_repo') }}</span>
                        @endif
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                        {{ __('project.repo') }}
                    </a>
                @endif

                @if($project['live_url'])
                    <a href="{{ $project['live_url'] }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn btn-primary w-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                        {{ __('project.live') }}
                    </a>
                @endif
            </div>
        </div>


        {{-- Problem --}}
        <article class="mb-12" aria-labelledby="problem-heading">
            <h2 id="problem-heading" class="text-2xl font-semibold mb-4">{{ __('project.problem') }}</h2>
            <div class="prose prose-muted max-w-none">
                <p>{{ $project['problem'] }}</p>
            </div>
        </article>

        {{-- Solution --}}
        <article class="mb-12" aria-labelledby="solution-heading">
            <h2 id="solution-heading" class="text-2xl font-semibold mb-4">{{ __('project.solution') }}</h2>
            <div class="prose prose-muted max-w-none">
                <p>{{ $project['solution'] }}</p>
            </div>
        </article>

        {{-- Technical Decisions --}}
        @if(!empty($project['decisions']))
        <article class="mb-12" aria-labelledby="decisions-heading">
            <h2 id="decisions-heading" class="text-2xl font-semibold mb-4">{{ __('project.decisions') }}</h2>
            <ul class="space-y-3">
                @foreach($project['decisions'] as $decision)
                    <li class="flex gap-3">
                        <svg class="w-5 h-5 text-accent flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <p>{{ $decision }}</p>
                    </li>
                @endforeach
            </ul>
        </article>
        @endif

        {{-- Features --}}
        @if(!empty($project['features']))
        <article class="mb-12" aria-labelledby="features-heading">
            <h2 id="features-heading" class="text-2xl font-semibold mb-4">{{ __('project.features') }}</h2>
            <ul class="grid gap-3 sm:grid-cols-2">
                @foreach($project['features'] as $feature)
                    <li class="flex gap-3">
                        <svg class="w-5 h-5 text-accent flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <p>{{ $feature }}</p>
                    </li>
                @endforeach
            </ul>
        </article>
        @endif

        {{-- Screenshots Gallery --}}
        @if(!empty($project['screenshots']))
        <article class="mb-12" aria-labelledby="screenshots-heading">
            <h2 id="screenshots-heading" class="text-2xl font-semibold mb-4">{{ __('project.screenshots') }}</h2>
            @if($project['dummy_data_caption'])
                <p class="text-sm text-muted mb-4">{{ $project['dummy_data_caption'] }}</p>
            @endif
            <div class="grid gap-4 md:grid-cols-2">
                @foreach($project['screenshots'] as $screenshot)
                    <?php
                    $screenshotPath = public_path("projects/{$project['slug']}/{$screenshot}");
                    $hasScreenshot = !empty($screenshot) && file_exists($screenshotPath);
                    ?>
                    <figure class="card overflow-hidden">
                        @if($hasScreenshot)
                            <img src="{{ asset('projects/' . $project['slug'] . '/' . $screenshot) }}"
                                 alt="{{ $project['title'] }} - {{ $screenshot }}"
                                 class="w-full h-auto"
                                 loading="lazy">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-muted/20">
                                <div class="text-center p-4">
                                    <svg class="w-12 h-12 mx-auto text-muted mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    <p class="text-sm text-muted">{{ __('project.no_thumbnail') }}</p>
                                </div>
                            </div>
                        @endif
                    </figure>
                @endforeach
            </div>
        </article>
        @elseif(!empty($project['dummy_data_caption']))
        <article class="mb-12" aria-labelledby="screenshots-heading">
            <h2 id="screenshots-heading" class="text-2xl font-semibold mb-4">{{ __('project.screenshots') }}</h2>
            <p class="text-sm text-muted mb-4">{{ $project['dummy_data_caption'] }}</p>
            <div class="grid gap-4 md:grid-cols-2">
                <div class="card aspect-video flex items-center justify-center bg-muted/20">
                    <p class="text-muted">No screenshots available</p>
                </div>
            </div>
        </article>
        @endif

        {{-- Outcome --}}
        <article class="mb-12" aria-labelledby="outcome-heading">
            <h2 id="outcome-heading" class="text-2xl font-semibold mb-4">{{ __('project.outcome') }}</h2>
            <div class="prose prose-muted max-w-none">
                <p>{{ $project['outcome'] }}</p>
            </div>
        </article>

        {{-- Next Project --}}
        @if(!empty($project['next_project_slug']) && isset($allProjects[$project['next_project_slug']]))
            @php $nextProject = $allProjects[$project['next_project_slug']]; @endphp
            <div class="card p-6">
                <h3 class="text-lg font-semibold mb-2">{{ __('project.next_project') }}</h3>
                <a href="{{ route('work.show', ['locale' => app()->getLocale(), 'slug' => $nextProject['slug']]) }}"
                   class="font-medium text-accent hover:underline flex items-center gap-2">
                    {{ $nextProject['title'] }}
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                </a>
            </div>
        @endif
    </div>
</section>
@endsection