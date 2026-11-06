# Debug Thumbnail — Portfolio Laravel

Dokumen ini berisi salinan file data konten proyek dan komponen view yang merender kartu/proyek thumbnail di halaman portfolio. Dibuat untuk tujuan debugging masalah tampilan thumbnail (gambar proyek tidak muncul).

---

## 1. File Data Konten Proyek

### 1.1 `resources/content/id/projects.php`

```php
<?php

return [
    'ansor-kaltim' => [
        'slug' => 'ansor-kaltim',
        'title' => 'Aplikasi Ansor Kaltim',
        'summary' => 'Sistem informasi manajemen organisasi dengan struktur hierarki dan absensi kegiatan berbasis QR-code.',
        'role' => 'Web Developer (Analisis kebutuhan, desain, implementasi)',
        'period' => 'Jul 2025 – Ags 2026',
        'team' => 'Tim BRITech + Stakeholder PW GP Ansor Kaltim',
        'status' => 'Selesai (Skripsi)',
        'stack' => ['Laravel', 'Livewire', 'MySQL', 'Bootstrap', 'REST API'],
        'categories' => ['Fullstack', 'Laravel'],
        'technologies' => ['Laravel', 'Livewire', 'MySQL', 'Bootstrap', 'REST API'],
        'year' => 2026,
        'thumbnail' => 'projects/ansor-kaltim/thumbnail.png',
        'repo_url' => 'https://git.britech.id/ansor/aplikasi-ansor-kaltim',
        'repo_private' => true,
        'live_url' => null,
        'dummy_data_caption' => 'Tangkapan layar menggunakan data contoh',
        'problem' => 'PW GP Ansor Kaltim membutuhkan sistem terpusat untuk mengelola struktur organisasi hierarkis (pimpinan pusat hingga cabang), data anggota, dan pencatatan kehadiran kegiatan yang sebelumnya manual dan terpecah.',
        'solution' => 'Aplikasi web berbasis Laravel dengan Livewire yang menyediakan: 7-role RBAC (Superadmin, Admin Pusat, Admin Daerah, Pimpinan Cabang, Koordinator, Anggota, Tamu), manajemen struktur organisasi hierarkis (CRUD tingkatan & unit), absensi kegiatan berbasis QR-code (generate, scan, validasi real-time), dan dashboard peran dengan ringkasan statistik.',
        'decisions' => [
            'Menggunakan Laravel Livewire untuk interaktivitas tanpa perlu write JavaScript secara ekstensif.',
            'Implementasi RBAC 7 level untuk manajemen hak akses yang granular.',
            'Integrasi QR-code untuk absensi kegiatan anggota secara real-time.',
        ],
        'features' => [
            'Manajemen struktur organisasi hierarkis.',
            'QR-code attendance system.',
            'Dashboard peran berdasarkan RBAC.',
            'Laporan kegiatan anggota.',
        ],
        'screenshots' => [],
        'outcome' => 'Digunakan sebagai studi kasus skripsi D4 (IPK 3.76, Cum Laude). Sistem mengurangi waktu pencatatan kehadiran manual dari ~15 menit/kegiatan menjadi <30 detik per peserta. Data organisasi terpusat dan terstruktur.',
        'next_project_slug' => 'bappeda-kaltim',
    ],
    'bappeda-kaltim' => [
        'slug' => 'bappeda-kaltim',
        'title' => 'BAPPEDA Kaltim Website',
        'summary' => 'Website informasi resmi BAPPEDA Kaltim: halaman publik, berita, publikasi, dan layanan.',
        'role' => 'Frontend Developer',
        'period' => '2024',
        'team' => '3 orang: 1 Backend Developer, 1 Frontend Developer (saya), 1 Stakeholder BAPPEDA',
        'status' => 'Selesai',
        'stack' => ['HTML5', 'CSS3', 'JavaScript', 'Bootstrap', 'AJAX'],
        'categories' => ['Frontend'],
        'technologies' => ['HTML5', 'CSS3', 'JavaScript', 'Bootstrap', 'AJAX'],
        'year' => 2024,
        'thumbnail' => 'projects/bappeda-kaltim/thumbnail.png',
        'repo_url' => 'https://github.com/humasbappedakaltim/bappeda_v2',
        'repo_private' => false,
        'live_url' => null,
        'dummy_data_caption' => null,
        'problem' => 'Website lama BAPPEDA Kaltim tidak responsif, navigasi membingungkan, dan antarmuka tidak aman terhadap interaksi pengguna. Stakeholder butuh tampilan modern, akses cepat ke informasi publik, dan keamanan antarmuka.',
        'solution' => 'Membangun ulang seluruh halaman publik (beranda, profil, berita, publikasi, layanan, kontak) dengan Bootstrap 5, layout responsif mobile-first, navigasi mega-menu yang terstruktur, validasi form client-side + server-side, dan hardening UI (CSP, sanitasi output, proteksi XSS dasar). Dashboard admin dikembangkan oleh backend developer — tidak termasuk dalam cakupan saya.',
        'decisions' => [
            'Bootstrap 5 untuk konsistensi desain dan cepat dikembangkan.',
            'Responsive design mobile-first.',
            'Validasi form di sisi klien dan server.',
        ],
        'features' => [
            'Halaman publik informasi resmi.',
            'Sistem manajemen berita dan publikasi.',
            'Layanan publik online.',
        ],
        'screenshots' => [],
        'outcome' => 'Website live dan digunakan internal BAPPEDA. Feedback stakeholder: navigasi "jauh lebih nyaman", loading halaman <2 detik di 3G, lulus audit aksesibilitas internal.',
        'next_project_slug' => 'koetai-mahkota-soundline',
    ],
    'koetai-mahkota-soundline' => [
        'slug' => 'koetai-mahkota-soundline',
        'title' => 'Koetai Mahkota Soundline',
        'summary' => 'Website promosi properti Koetai Mahkota Soundline dengan desain dari Figma dan perilaku responsif penuh.',
        'role' => 'Frontend Developer',
        'period' => '2025',
        'team' => 'Tim desain (Figma) + Team Lead/Klien',
        'status' => 'Selesai',
        'stack' => ['TODO(owner)'],
        'categories' => ['Frontend'],
        'technologies' => ['TODO(owner)'],
        'year' => 2025,
        'thumbnail' => 'projects/koetai-soundline/thumbnail.png',
        'repo_url' => 'https://github.com/andypratama3/Koetai_baru',
        'repo_private' => false,
        'live_url' => null,
        'dummy_data_caption' => null,
        'problem' => 'Klien membutuhkan website promosi properti yang mengimplementasikan desain Figma yang sudah disetujui, dengan perilaku responsif penuh.',
        'solution' => 'Implementasi desain Figma ke HTML/CSS/JS (Bootstrap 5 + custom CSS) dengan pendekatan mobile-first. Mengimplementasikan semua komponen UI: hero parallax, carousel unit, galeri lightbox, formulir kontak terintegrasi, peta lokasi interaktif, dan FAQ accordion.',
        'decisions' => [
            'Bootstrap 5 utilities + custom properties untuk spacing, color, radius agar konsisten dengan design system Figma.',
            'IntersectionObserver untuk scroll-reveal animations.',
            'Lazy-loading gambar dengan native loading="lazy".',
        ],
        'features' => [
            'Hero section dengan parallax scroll & CTA sticky.',
            'Carousel unit properti.',
            'Galeri foto & video dengan lightbox.',
            'Peta lokasi interaktif.',
            'FAQ accordion.',
        ],
        'screenshots' => [],
        'outcome' => 'Website diluncurkan sesuai jadwal. Desainer & klien menyetujui hasil implementasi: "pixel-perfect ke desain Figma, responsif mulus, loading cepat".',
        'next_project_slug' => null,
    ],
];
```

### 1.2 `resources/content/en/projects.php`

```php
<?php

return [
    'ansor-kaltim' => [
        'slug' => 'ansor-kaltim',
        'title' => 'Ansor Kaltim Application',
        'summary' => 'Organizational management information system with hierarchical structure and QR-code based activity attendance.',
        'role' => 'Web Developer (Requirement analysis, design, implementation)',
        'period' => 'Jul 2025 – Aug 2026',
        'team' => 'BRITech Team + PW GP Ansor Kaltim Stakeholder',
        'status' => 'Completed (Thesis)',
        'stack' => ['Laravel', 'Livewire', 'MySQL', 'Bootstrap', 'REST API'],
        'categories' => ['Fullstack', 'Laravel'],
        'technologies' => ['Laravel', 'Livewire', 'MySQL', 'Bootstrap', 'REST API'],
        'year' => 2026,
        'thumbnail' => 'projects/ansor-kaltim/thumbnail.png',
        'repo_url' => 'https://git.britech.id/ansor/aplikasi-ansor-kaltim',
        'repo_private' => true,
        'live_url' => null,
        'dummy_data_caption' => 'Screenshots use dummy data',
        'problem' => 'PW GP Ansor Kaltim needed a centralized system to manage hierarchical organizational structure (central to branch leadership), member data, and activity attendance recording which was previously manual and fragmented.',
        'solution' => 'Laravel-based web application with Livewire providing: 7-role RBAC (Superadmin, Central Admin, Regional Admin, Branch Leader, Coordinator, Member, Guest), hierarchical organizational structure management (CRUD levels & units), QR-code based activity attendance (generate, scan, real-time validation), and role-based dashboards with statistical summaries.',
        'decisions' => [
            'Using Laravel Livewire for interactivity without writing extensive JavaScript.',
            'Implementing RBAC with 7 roles for granular access control.',
            'QR-code integration for real-time activity attendance.',
        ],
        'features' => [
            'Hierarchical organizational structure management.',
            'QR-code based attendance system.',
            'Role-based dashboards.',
            'Member activity reports.',
        ],
        'screenshots' => [],
        'outcome' => 'Used as D4 thesis case study (GPA 3.76, Cum Laude). System reduced manual attendance recording time from ~15 minutes/activity to <30 seconds per participant. Organizational data centralized and structured.',
        'next_project_slug' => 'bappeda-kaltim',
    ],
    'bappeda-kaltim' => [
        'slug' => 'bappeda-kaltim',
        'title' => 'BAPPEDA Kaltim Website',
        'summary' => 'Official BAPPEDA Kaltim information website: public pages, news, publications, and services.',
        'role' => 'Frontend Developer',
        'period' => '2024',
        'team' => '3 people: 1 Backend Developer, 1 Frontend Developer (me), 1 BAPPEDA Stakeholder',
        'status' => 'Completed',
        'stack' => ['HTML5', 'CSS3', 'JavaScript', 'Bootstrap', 'AJAX'],
        'categories' => ['Frontend'],
        'technologies' => ['HTML5', 'CSS3', 'JavaScript', 'Bootstrap', 'AJAX'],
        'year' => 2024,
        'thumbnail' => 'projects/bappeda-kaltim/thumbnail.png',
        'repo_url' => 'https://github.com/humasbappedakaltim/bappeda_v2',
        'repo_private' => false,
        'live_url' => null,
        'dummy_data_caption' => null,
        'problem' => 'The old BAPPEDA Kaltim website was not responsive, had confusing navigation, and the UI was not secure against user interactions. Stakeholder needed a modern look, fast access to public information, and UI security.',
        'solution' => 'Rebuilt all public pages (home, profile, news, publications, services, contact) with Bootstrap 5, mobile-first responsive layout, structured mega-menu navigation, client-side + server-side form validation, and UI hardening (CSP, output sanitization, basic XSS protection). Admin dashboard was developed by the backend developer — not in my scope.',
        'decisions' => [
            'Bootstrap 5 for design consistency and fast development.',
            'Mobile-first responsive design.',
            'Client-side and server-side form validation.',
        ],
        'features' => [
            'Official public information website.',
            'News and publications management system.',
            'Public services online.',
        ],
        'screenshots' => [],
        'outcome' => 'Website live and used internally by BAPPEDA. Stakeholder feedback: navigation "much more comfortable", page load <2 seconds on 3G, passed internal accessibility audit.',
        'next_project_slug' => 'koetai-mahkota-soundline',
    ],
    'koetai-mahkota-soundline' => [
        'slug' => 'koetai-mahkota-soundline',
        'title' => 'Koetai Mahkota Soundline',
        'summary' => 'Koetai Mahkota Soundline property promotional website implementing approved Figma design with full responsive behavior.',
        'role' => 'Frontend Developer',
        'period' => '2025',
        'team' => 'Design Team (Figma) + Team Lead/Client',
        'status' => 'Completed',
        'stack' => ['TODO(owner)'],
        'categories' => ['Frontend'],
        'technologies' => ['TODO(owner)'],
        'year' => 2025,
        'thumbnail' => 'projects/koetai-soundline/thumbnail.png',
        'repo_url' => 'https://github.com/andypratama3/Koetai_baru',
        'repo_private' => false,
        'live_url' => null,
        'dummy_data_caption' => null,
        'problem' => 'Client needed a property promotional website implementing approved Figma design with full responsive behavior.',
        'solution' => 'Implemented Figma designs to HTML/CSS/JS (Bootstrap 5 + custom CSS) with mobile-first approach. Implemented all UI components: hero parallax, carousel unit, gallery lightbox, integrated contact form, interactive location map, and FAQ accordion.',
        'decisions' => [
            'Bootstrap 5 utilities + custom properties for spacing, color, radius to match Figma design system.',
            'IntersectionObserver for scroll-reveal animations.',
            'Native lazy-loading images with loading="lazy".',
        ],
        'features' => [
            'Hero section with parallax scroll & sticky CTA.',
            'Property unit carousel.',
            'Photo & video gallery with lightbox.',
            'Interactive location map.',
            'FAQ accordion.',
        ],
        'screenshots' => [],
        'outcome' => 'Website launched on schedule. Designer & client approved implementation: "pixel-perfect to Figma design, responsive smooth, fast loading".',
        'next_project_slug' => null,
    ],
];
```

---

## 2. File Komponen View: `project-card.blade.php`

Lokasi: `portfolio-laravel/resources/views/components/project-card.blade.php`

```blade
@props(['project', 'showCategoryFilter' => false])

<?php
$category = $project['categories'][0] ?? 'fullstack';
$techData = implode(',', $project['technologies'] ?? []);
?>

<article class="card overflow-hidden flex flex-col h-full"
        data-project
        data-category="{{ $category }}"
        data-tech="{{ $techData }}">
    {{-- Thumbnail --}}
    <div class="aspect-video relative overflow-hidden bg-muted/20">
        @if(!empty($project['thumbnail']) && file_exists(public_path('projects/' . $project['slug'] . '/' . $project['thumbnail'])))
            <img src="{{ asset('projects/' . $project['slug'] . '/' . $project['thumbnail']) }}"
                 alt="{{ $project['title'] }}"
                 class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                 loading="lazy">
        @else
            <div class="w-full h-full flex items-center justify-center bg-muted/20">
                <div class="text-center p-4">
                    <svg class="w-12 h-12 mx-auto text-muted mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    <p class="text-sm text-muted">{{ __('project.no_thumbnail') }}</p>
                </div>
            </div>
        @endif:

        @if(!empty($project['featured']))
            <span class="absolute top-3 left-3 badge badge-accent">{{ __('project.featured') }}</span>
        @endif:
    </div>

    {{-- Content --}}
    <div class="p-6 flex flex-col flex-1">
        <h3 class="text-lg font-semibold mb-2">{{ $project['title'] }}</h3>
        <p class="text-sm text-muted mb-4 flex-1">{{ $project['summary'] }}</p>

        <div class="flex flex-wrap gap-2 mb-4">
            @foreach($project['technologies'] ?? [] as $tech)
                <span class="badge">{{ $tech }}</span>
            @endforeach
        </div>

        <div class="flex items-center gap-4 text-sm text-muted border-t border-border pt-4 mt-auto">
            <time>{{ $project['year'] }}</time>
            @if($project['repo_private'])
                <span class="badge badge-private">{{ __('project.private_repo') }}</span>
            @endif:
        </div>
    </div>
</article>
```

---

## 3. Struktur File Thumbnail yang Diharapkan

Berdasarkan konfigurasi di atas, setiap proyek memerlukan file PNG di lokasi berikut:

| Proyek | Slug | Path Thumbnail yang Diharapkan | Status File |
|--------|------|-------------------------------|-------------|
| Ansor Kaltim | `ansor-kaltim` | `public/projects/ansor-kaltim/thumbnail.png` | ✅ Ada |
| BAPPEDA Kaltim | `bappeda-kaltim` | `public/projects/bappeda-kaltim/thumbnail.png` | ✅ Ada |
| Koetai Mahkota Soundline | `koetai-mahkota-soundline` | `public/projects/koetai-soundline/thumbnail.png` | ✅ Ada |

---

## 4. Logika Pemanggilan Thumbnail

Dalam `project-card.blade.php`, baris 14-18:

```php
@if(!empty($project['thumbnail']) && file_exists(public_path('projects/' . $project['slug'] . '/' . $project['thumbnail'])))
    <img src="{{ asset('projects/' . $project['slug'] . '/' . $project['thumbnail']) }}"
         alt="{{ $project['title'] }}"
         class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
         loading="lazy">
@else
    <!-- Tampilkan placeholder SVG -->
@endif
```

Logika:
1. Memeriksa apakah `thumbnail` tidak kosong.
2. Memeriksa apakah file fisik ada di `public_path('projects/' . $slug . '/' . $thumbnail)`.
3. Jika ada → tampilkan `` dengan `src` dari `asset()`.
4. Jika tidak ada → tampilkan placeholder SVG + pesan "No thumbnail available".

---

## 5. Troubleshooting Checklist

- [ ] File `public/projects/ansor-kaltim/thumbnail.png` ada dan dapat diakses.
- `public/projects/bappeda-kaltim/thumbnail.png` ada dan dapat diakses.
- `public/projects/koetai-soundline/thumbnail.png` ada dan dapat diakses.
- Nilai `thumbnail` di `resources/content/id/projects.php` dan `resources/content/en/projects.php` cocok dengan nama file fisik.
- Cache Laravel sudah di-clear setelah perubahan file: `php artisan cache:clear`.
- Jika masih tidak muncul, periksa permission file (readable oleh web server) dan pastikan tidak ada spasi/karakter aneh di nama file.