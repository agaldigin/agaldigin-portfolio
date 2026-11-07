@extends('layouts.app')

@section('jsonld')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "Aldin Nur Adzin, S.Tr.Kom.",
    "jobTitle": "{{ $hero['role'] }}",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Samarinda",
        "addressCountry": "ID"
    },
    "sameAs": ["{{ config('site.github') }}"]
}
</script>
@endverbatim
@endsection
@section('title', __('hero.role') . ' — ' . config('site.name'))

@section('description', $hero['description'])

@section('ogTitle', __('hero.role') . ' — ' . config('site.name'))

@section('ogDescription', $hero['description'])

@section('ogImage', asset('images/og.png'))

@section('canonical', route('home', ['locale' => app()->getLocale()]))

@section('content')
{{-- Hero Section --}}
<section class="section" aria-labelledby="hero-heading">
    <div class="container">
        <div class="max-w-3xl mx-auto text-center">
            <h1 id="hero-heading" class="text-4xl md:text-6xl font-bold tracking-tight text-gradient">
                Aldin Nur Adzin
            </h1>
            <p class="mt-4 text-lg md:text-xl text-muted">{{ $hero['role'] }}</p>
            <p class="mt-6 max-w-2xl mx-auto text-text">{{ $hero['description'] }}</p>

            <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('work.index', ['locale' => app()->getLocale()]) }}"
                   class="btn btn-primary w-full sm:w-auto">
                    {{ $hero['cta_work'] }}
                </a>
                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}"
                   class="btn btn-secondary w-full sm:w-auto">
                    {{ $hero['cta_contact'] }}
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Selected Work Section --}}
<section class="section" aria-labelledby="selected-work-heading">
    <div class="container">
        <header class="mb-12">
            <h2 id="selected-work-heading" class="section-title">{{ $selectedWork['title'] }}</h2>
        </header>

        <div class="grid gap-6 md:grid-cols-3">
            @foreach($selectedWork['projects'] ?? array_slice($whatIDo['projects'] ?? [], 0, 3) as $project)
                @include('components.project-card', ['project' => $project])
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('work.index', ['locale' => app()->getLocale()]) }}"
               class="btn btn-secondary">
                {{ $selectedWork['view_all'] }}
            </a>
        </div>
    </div>
</section>

{{-- What I Do Section --}}
<section class="section bg-surface/50" aria-labelledby="whatido-heading">
    <div class="container">
        <header class="mb-12 text-center">
            <h2 id="whatido-heading" class="section-title">{{ $whatIDo['title'] }}</h2>
        </header>

        <div class="grid gap-8 md:grid-cols-2">
            {{-- Backend Column --}}
            <div class="card p-6 md:p-8">
                <h3 class="text-xl font-semibold mb-2">{{ $whatIDo['backend']['title'] }}</h3>
                <p class="text-muted mb-6">{{ $whatIDo['backend']['description'] }}</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($whatIDo['backend']['stack'] as $tech)
                        <span class="badge badge-accent">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Frontend Column --}}
            <div class="card p-6 md:p-8">
                <h3 class="text-xl font-semibold mb-2">{{ $whatIDo['frontend']['title'] }}</h3>
                <p class="text-muted mb-6">{{ $whatIDo['frontend']['description'] }}</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($whatIDo['frontend']['stack'] as $tech)
                        <span class="badge badge-accent">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Journey Section --}}
<section class="section" aria-labelledby="journey-heading">
    <div class="container">
        <header class="mb-12 text-center">
            <h2 id="journey-heading" class="section-title">{{ $journey['title'] }}</h2>
        </header>

        <div class="max-w-2xl mx-auto">
            <ol class="relative">
                <li class="absolute inset-0 w-0.5 bg-accent left-4 md:left-8 -translate-x-1/2" aria-hidden="true"></li>
                @foreach($journey['items'] as $index => $item)
                    <li class="relative pl-12 md:pl-20 pb-10">
                        <div class="absolute left-4 md:left-8 top-1 -translate-x-1/2 w-3 h-3 bg-accent rounded-full z-10" aria-hidden="true"></div>
                        <time class="text-sm font-mono text-muted">{{ $item }}</time>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</section>

{{-- Closing CTA --}}
<section class="section bg-accent/5 dark:bg-accent/10" aria-labelledby="cta-heading">
    <div class="container text-center">
        <h2 id="cta-heading" class="text-2xl md:text-3xl font-bold mb-4">
            {{ app()->getLocale() === 'id'
                ? 'Siap membangun sistem informasi web yang rapi dan responsif?'
                : 'Ready to build clean, responsive web information systems?' }}
        </h2>
        <p class="text-muted mb-8 max-w-xl mx-auto">
            {{ app()->getLocale() === 'id'
                ? 'Mari berdiskusi tentang proyek Anda, peluang magang, atau kolaborasi.'
                : 'Let\'s discuss your project, internship opportunities, or collaboration.' }}
        </p>
        <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}"
           class="btn btn-primary">
            {{ app()->getLocale() === 'id' ? 'Hubungi Saya' : 'Contact Me' }}
        </a>
    </div>
</section>
@endsection
