@extends('layouts.app')

@section('jsonld')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "Aldin Nur Adzin, S.Tr.Kom.",
    "jobTitle": "{{ __('about.title') }}",
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
@section('title', __('about.title') . ' — ' . config('site.name'))

@section('description', $bio['bio'])

@section('ogTitle', __('about.title') . ' — ' . config('site.name'))

@section('ogDescription', $bio['bio'])

@section('ogImage', asset('images/aldin.jpg'))

@section('canonical', route('about', ['locale' => app()->getLocale()]))

@section('content')
<section class="section" aria-labelledby="about-heading">
    <div class="container">
        <header class="mb-12 text-center">
            <h1 id="about-heading" class="section-title">{{ __('about.title') }}</h1>
        </header>

        <div class="grid gap-10 lg:grid-cols-3">
            {{-- Photo & Bio --}}
            <div class="lg:col-span-2">
                <div class="grid gap-8 md:grid-cols-12">
                    <div class="md:col-span-4">
                        @if(file_exists(public_path('images/aldin.jpg')))
                            <figure class="aspect-square">
                                <img src="{{ asset('images/aldin.jpg') }}"
                                     alt="{{ $bio['photo_alt'] }}"
                                     class="w-full h-full object-cover rounded-xl"
                                     width="400"
                                     height="400"
                                     loading="eager">
                            </figure>
                        @else
                            <div class="aspect-square bg-muted/20 rounded-xl flex items-center justify-center">
                                <svg class="w-20 h-20 text-muted" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.908 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            </div>
                        @endif
                    </div>

                    <div class="md:col-span-8">
                        <div class="prose prose-muted max-w-none">
                            <p>{{ $bio['bio'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Timeline --}}
            <div>
                <h2 class="text-xl font-semibold mb-6">{{ $timeline['title'] }}</h2>
                <ol class="space-y-6">
                    @foreach($timeline['items'] as $item)
                        <li class="relative pl-6">
                            <div class="absolute left-0 top-0.5 -translate-x-1/2 w-3 h-3 bg-accent rounded-full" aria-hidden="true"></div>
                            @if(isset($item['month']))
                                <time class="text-sm font-mono text-muted">{{ $item['month'] }} {{ $item['year'] }}</time>
                            @else
                                <time class="text-sm font-mono text-muted">{{ $item['year'] }}</time>
                            @endif
                            <p class="mt-1 text-text">{{ $item['event'] }}</p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</section>

{{-- Skills Section --}}
<section class="section bg-surface/50" aria-labelledby="skills-heading">
    <div class="container">
        <header class="mb-12 text-center">
            <h2 id="skills-heading" class="section-title">{{ $skills['title'] }}</h2>
        </header>

        <div class="grid gap-8 md:grid-cols-3">
            {{-- Backend --}}
            <div class="card p-6 md:p-8">
                <h3 class="text-xl font-semibold mb-4">{{ $skills['backend']['title'] }}</h3>
                <ul class="space-y-2">
                    @foreach($skills['backend']['items'] as $skill)
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span>{{ $skill }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Frontend --}}
            <div class="card p-6 md:p-8">
                <h3 class="text-xl font-semibold mb-4">{{ $skills['frontend']['title'] }}</h3>
                <ul class="space-y-2">
                    @foreach($skills['frontend']['items'] as $skill)
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span>{{ $skill }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Other --}}
            <div class="card p-6 md:p-8">
                <h3 class="text-xl font-semibold mb-4">{{ $skills['other']['title'] }}</h3>
                <ul class="space-y-2">
                    @foreach($skills['other']['items'] as $skill)
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-accent" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span>{{ $skill }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Credentials Section --}}
<section class="section" aria-labelledby="credentials-heading">
    <div class="container">
        <header class="mb-12 text-center">
            <h2 id="credentials-heading" class="section-title">{{ $credentials['title'] }}</h2>
        </header>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($credentials['items'] as $credential)
                <article class="card p-6">
                    <h3 class="text-lg font-semibold mb-2">{{ $credential['title'] }}</h3>
                    <p class="text-muted mb-1">{{ $credential['issuer'] }}</p>
                    <time class="text-sm font-mono text-muted">{{ $credential['date'] }}</time>
                </article>
            @endforeach
        </div>

        {{-- CV Button --}}
        @if(file_exists(public_path('cv/Aldin-Nur-Adzin-CV.pdf')))
        <div class="mt-10 text-center">
            <a href="{{ asset('cv/Aldin-Nur-Adzin-CV.pdf') }}"
               class="btn btn-primary"
               download>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                {{ __('footer.download_cv') }}
            </a>
        </div>
        @endif
    </div>
</section>
@endsection
