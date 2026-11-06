@extends('layouts.app')

@section('title', __('contact.title') . ' — ' . config('site.name'))

@section('description', $contact['description'])

@section('ogTitle', __('contact.title') . ' — ' . config('site.name'))

@section('ogDescription', $contact['description'])

@section('ogImage', asset('images/og.png'))

@section('canonical', route('contact', ['locale' => app()->getLocale()]))

@section('content')
<section class="section" aria-labelledby="contact-heading">
    <div class="container">
        <header class="mb-12 text-center max-w-2xl mx-auto">
            <h1 id="contact-heading" class="section-title">{{ $contact['title'] }}</h1>
            <p class="mt-4 text-muted">{{ $contact['description'] }}</p>
        </header>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 max-w-4xl mx-auto">
            {{-- Email --}}
            <a href="mailto:{{ config('site.email') }}"
               class="card p-6 text-center hover:border-accent transition-colors">
                <div class="w-12 h-12 mx-auto mb-4 bg-accent/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                </div>
                <h3 class="text-lg font-semibold mb-1">{{ $contact['email'] }}</h3>
                <p class="text-sm text-muted">{{ config('site.email') }}</p>
            </a>

            {{-- WhatsApp --}}
            <a href="{{ config('site.whatsapp') }}"
               target="_blank"
               rel="noopener noreferrer"
               class="card p-6 text-center hover:border-accent transition-colors">
                <div class="w-12 h-12 mx-auto mb-4 bg-accent/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-accent" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.471.099-.174.05-.372-.025-.52-.075-.149-.669-1.611-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.372-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378 9.86 9.86 0 01-.47-1.37h-.004c-.197-.373-.52-.67-.742-.795-.223-.124-.471-.174-.695-.099-.224.075-.844.548-.844.991 0 .47.447.866 1.33.866.322 0 .596-.024.843-.075.273-.049.52-.148.716-.247.198-.099.42-.223.618-.347.198-.124.32-.173.395-.347.074-.174.123-.372.025-.548-.098-.173-.94-1.524-.94-2.899 0-.99.42-1.716 1.091-2.16.322-.223.866-.595 1.58-.944.498-.247 1.021-.372 1.62-.372.447 0 .894.074 1.29.223.396.149.767.372 1.065.644.297.273.52.57.618.818.098.248.074.497-.025.746-.099.248-.768 1.612-1.14 2.816-.372 1.212-.644 1.937-.89 2.413-.247.471-.396.718-.643.94-.247.224-.52.348-.767.397-.248.049-.497.049-.792.025l-.74-.074c-1.895-.173-4.196-.967-5.736-2.206-.124-.1-.248-.124-.471-.148-.224-.025-.57.025-.792.372-.497.373-1.58 1.548-1.956 3.125-.223.89-.322 1.546-.322 2.478 0 .966.173 1.908.52 2.665.347.73.74 1.29 1.33 1.694.57.42 1.212.74 1.909.915.768.198 1.49.373 2.264.373.844 0 1.64-.124 2.288-.471.669-.322 1.19-.694 1.56-.967.298-.248.52-.57.643-.866.124-.298.074-.67-.05-.94-.123-.273-.768-.94-1.87-1.463-.447-.223-.844-.42-1.265-.594-.422-.174-.966-.247-1.487-.247-.57.001-1.33.299-1.896.72-.57.42-1.015.89-1.36 1.414-.347.52-.595 1.04-.595 1.62 0 .57.223 1.09.695 1.56.47.448 1.04 1.04 1.69 1.51.644.47 1.33.79 2.03 1.01.70.247 1.42.247 2.16.075.74-.173 1.48-.497 2.21-.866.717-.373 1.21-1.14 1.51-1.636.173-.298.223-.594.173-.866-.049-.273-.298-.497-.57-.57zm-5.84-1.77c-.373-.173-1.04-.793-1.462-1.212-.42-.42-.669-.914-.669-1.586 0-.644.223-1.238.669-1.56.447-.322 1.117-.818 1.79-1.064.67-.247 1.414-.372 2.19-.372.792 0 1.535.124 2.16.347.644.224 1.14.62 1.487 1.14.347.52.447 1.116.42 1.56-.025.447-.247.866-.57 1.115-.322.247-.843.497-1.462.745-.618.247-1.462.373-2.136.224-.694-.149-1.313-.322-1.81-1.013-.497-.695-.818-1.636-.792-2.36zm8.62-2.47c-.42-.373-1.265-1.14-1.86-1.611-.594-.47-1.14-1.014-1.462-1.263-.322-.247-.644-.497-.89-.67-.247-.174-.497-.298-.694-.397-.198-.098-.395-.173-.594-.198-.174-.025-.372.025-.57.123-.198.098-.42.224-.57.347-.148.123-.347.273-.52.397-.198.123-.52.223-1.014.322-.497.098-1.014.148-1.56.098-.548-.049-1.065-.173-1.535-.397-.47-.224-.866-.57-1.115-.818-.247-.247-.447-.594-.548-.89-.098-.297-.074-.67.025-.89.099-.223.347-.398.669-.548.322-.148.716-.198 1.14-.123.42.075.818.224 1.212.42.397.198.768.447 1.115.74.348.298.67.67.94 1.115.272.447.448.94.52 1.487.074.548-.025 1.166-.298 1.763-.718.594-.42 1.04-1.04 1.213-1.636.174-.595.099-1.213.025-1.837-.074-.62-.298-1.212-.644-1.786-.347-.57-.843-1.04-1.51-1.312zm"/></svg>
                </div>
                <h3 class="text-lg font-semibold mb-1">{{ $contact['whatsapp'] }}</h3>
                <p class="text-sm text-muted">{{ __('contact.chat_now') }}</p>
            </a>

            {{-- GitHub --}}
            <a href="{{ config('site.github') }}"
               target="_blank"
               rel="noopener noreferrer"
               class="card p-6 text-center hover:border-accent transition-colors">
                <div class="w-12 h-12 mx-auto mb-4 bg-accent/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-accent" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                </div>
                <h3 class="text-lg font-semibold mb-1">{{ $contact['github'] }}</h3>
                <p class="text-sm text-muted">github.com/agaldigin</p>
            </a>

            {{-- LinkedIn (conditional) --}}
            @if(config('site.linkedin'))
            <a href="{{ config('site.linkedin') }}"
               target="_blank"
               rel="noopener noreferrer"
               class="card p-6 text-center hover:border-accent transition-colors">
                <div class="w-12 h-12 mx-auto mb-4 bg-accent/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-accent" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </div>
                <h3 class="text-lg font-semibold mb-1">{{ $contact['linkedin'] }}</h3>
                <p class="text-sm text-muted">{{ __('contact.connect') }}</p>
            </a>
            @endif
        </div>

        {{-- Friendly closing text --}}
        <div class="mt-16 text-center max-w-xl mx-auto">
            <p class="text-muted">
                {{ app()->getLocale() === 'id'
                    ? 'Saya senang mendengar dari Anda. Baik itu diskusi proyek, peluang magang, atau sekadar sapaan — jangan ragu untuk menghubungi saya melalui saluran di atas.'
                    : 'I\'d love to hear from you. Whether it\'s a project discussion, internship opportunity, or just a friendly hello — feel free to reach out via the channels above.' }}
            </p>
        </div>
    </div>
</section>
@endsection