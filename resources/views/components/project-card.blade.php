@props(['project', 'showCategoryFilter' => false])

<?php
$category = $project['categories'][0] ?? 'fullstack';
$technologies = array_values(array_filter((array) ($project['technologies'] ?? []), fn ($t) => $t !== '' && $t !== 'TODO(owner)'));
$techData = implode(',', $technologies);
$thumbnailCandidates = [
    str_replace('.png', '.jpg', $project['thumbnail'] ?? ''),
    $project['thumbnail'] ?? '',
    str_replace('.jpg', '.png', $project['thumbnail'] ?? ''),
];
$thumbnailPath = '';
foreach ($thumbnailCandidates as $candidate) {
    if (!empty($candidate) && file_exists(public_path($candidate))) {
        $thumbnailPath = $candidate;
        break;
    }
}
$hasThumbnail = !empty($thumbnailPath);
?>

<article class="card overflow-hidden flex flex-col h-full"
        data-project
        data-category="{{ $category }}"
        data-tech="{{ $techData }}">
    {{-- Thumbnail --}}
    <div class="aspect-video relative overflow-hidden bg-muted/20">
        @if($hasThumbnail)
            <img src="{{ asset($thumbnailPath) }}"
                 alt="{{ $project['title'] }}"
                 class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                 loading="lazy"
                 width="400"
                 height="225">
        @else
            <div class="w-full h-full flex items-center justify-center bg-muted/20">
                <div class="text-center p-4">
                    <svg class="w-12 h-12 mx-auto text-muted mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    <p class="text-sm text-muted">{{ __('project.no_thumbnail') }}</p>
                </div>
            </div>
        @endif

        @if(!empty($project['featured']))
            <span class="absolute top-3 left-3 badge badge-accent">{{ __('project.featured') }}</span>
        @endif
    </div>

    {{-- Content --}}
    <div class="p-6 flex flex-col flex-1">
        <a href="{{ route('work.show', ['locale' => app()->getLocale(), 'slug' => $project['slug'] ?? '']) }}"
           class="block h-full">
            <h3 class="text-lg font-semibold mb-2">{{ $project['title'] }}</h3>
            <p class="text-sm text-muted mb-4 flex-1">{{ $project['summary'] }}</p>

            <div class="flex flex-wrap gap-2 mb-4">
                @foreach($technologies as $tech)
                    <span class="badge">{{ $tech }}</span>
                @endforeach
            </div>

            <div class="flex items-center gap-4 text-sm text-muted py-4 mt-auto">
                <time>{{ $project['year'] }}</time>
                <span class="text-muted">{{ __('project.role') }}</span>
                <span class="text-text">{{ $project['role'] ?? __('project.no_role') }}</span>
                @if(!empty($project['repo_private']))
                    <span class="badge badge-private">{{ __('project.private_repo') }}</span>
                @endif
            </div>
        </a>
    </div>
</article>