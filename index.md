# Index Proyek — Portfolio Laravel

Dokumen ini mengindex seluruh struktur proyek portfolio Laravel milik **Aldin Nur Adzin, S.Tr.Kom.** (developer web di Samarinda, Kalimantan Timur). Situs bersifat multibahasa (id/en), statis konten dari berkas PHP di `resources/content/`, dan di-deploy ke Vercel.

---

## 1. Ringkasan Proyek

| Item | Nilai |
|------|-------|
| Nama situs | Aldin Nur Adzin, S.Tr.Kom. |
| Lokasi | Samarinda, East Kalimantan, Indonesia |
| Framework | Laravel 13.x (PHP ^8.3) |
| Bahasa | Indonesia (id) dan Inggris (en) |
| Styling | Tailwind CSS 4 + Vite |
| Interaktivitas | Alpine.js |
| Deployment | Vercel (`vercel.json`, `api/index.php`) |
| Repositori | `laravel/laravel` skeleton (MIT) |

---

## 2. Struktur Direktori Root

```
portfolio-laravel/
├── index.md                  # <-- file ini (index proyek)
├── README.md                 # Dokumentasi Laravel default
├── AGENTS.md                 # Pedoman agent (Laravel Boost)
├── CLAUDE.md                 # Pedoman agent (sama seperti AGENTS.md)
├── debug-thumbnail.md        # Catatan debug thumbnail proyek
├── vercel.json               # Konfigurasi deployment Vercel
├── .vercelignore             # File yang diabaikan Vercel
├── composer.json             # Dependensi PHP / skrip Composer
├── composer.lock
├── package.json              # Dependensi Node / skrip Vite
├── package-lock.json
├── vite.config.js            # Konfigurasi Vite + Tailwind
├── phpunit.xml               # Konfigurasi PHPUnit
├── artisan                   # CLI Laravel
├── .env                      # Variabel lingkungan (gitignore)
├── .env.example
├── .gitignore
├── .editorconfig
├── .npmrc
├── junit.xml                 # Hasil uji terakhir (cache)
├── api/
│   └── index.php             # Entry point serverless Vercel
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php
│   │   │   ├── HomeController.php
│   │   │   ├── WorkController.php
│   │   │   ├── AboutController.php
│   │   │   ├── ContactController.php
│   │   │   ├── SitemapController.php
│   │   │   └── SeoController.php
│   │   ├── Middleware/
│   │   │   └── SetLocale.php
│   │   └── Sitemap/          # (kosong)
│   ├── Models/
│   │   └── User.php
│   ├── Providers/
│   │   ├── AppServiceProvider.php
│   │   └── ContentRepositoryServiceProvider.php
│   └── Services/
│       └── ContentRepository.php
├── bootstrap/
│   ├── app.php               # Konfigurasi bootstrap Laravel
│   └── cache/
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   ├── session.php
│   └── site.php              # Konfigurasi situs custom
├── database/
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   └── 0001_01_01_000002_create_jobs_table.php
│   ├── seeders/
│   │   └── DatabaseSeeder.php
│   └── factories/
│       └── UserFactory.php
├── lang/
│   ├── id/                   # Terjemahan Indonesia
│   │   ├── about.php, contact.php, errors.php, footer.php,
│   │   │   nav.php, project.php, site.php, status.php, theme.php, work.php
│   └── en/                   # Terjemahan Inggris
│       ├── about.php, contact.php, errors.php, footer.php,
│       │   nav.php, project.php, site.php, status.php, theme.php, work.php
├── public/
│   ├── index.php             # Entry point web
│   ├── .htaccess
│   ├── favicon.ico
│   ├── robots.txt
│   ├── cv/
│   │   └── Aldin-Nur-Adzin-CV.pdf
│   ├── images/
│   │   ├── aldin.jpg, kms1.png, kms2.png, bappeda1.png, bappeda2.png
│   ├── projects/
│   │   ├── ansor-kaltim/thumbnail.png
│   │   ├── bappeda-kaltim/thumbnail.png
│   │   └── koetai-soundline/thumbnail.png
│   └── build/
│       ├── assets/           # Aset dikompilasi Vite (CSS, font, JS)
│       └── manifest.json
├── resources/
│   ├── css/app.css
│   ├── js/app.js
│   ├── views/
│   │   ├── layouts/app.blade.php
│   │   ├── welcome.blade.php
│   │   ├── home/index.blade.php
│   │   ├── work/index.blade.php
│   │   ├── work/show.blade.php
│   │   ├── about/index.blade.php
│   │   ├── contact/index.blade.php
│   │   ├── sitemap/index.blade.php
│   │   ├── errors/404.blade.php
│   │   └── components/project-card.blade.php
│   └── content/
│       ├── id/               # Konten bahasa Indonesia
│       │   ├── projects.php, hero.php, whatido.php, journey.php,
│       │   │   selectedwork.php, bio.php, skills.php, credentials.php,
│       │   │   timeline.php, contact.php
│       └── en/               # Konten bahasa Inggris
│           ├── projects.php, hero.php, whatido.php, journey.php,
│           │   selectedwork.php, bio.php, skills.php, credentials.php,
│           │   timeline.php, contact.php
├── routes/
│   ├── web.php               # Rute web
│   └── console.php           # Perintah Artisan
├── storage/
│   ├── app/, framework/, logs/
│   └── .gitignore (tiap subdirektori)
├── tests/
│   ├── TestCase.php
│   ├── Unit/ExampleTest.php
│   └── Feature/
│       ├── RouteTest.php
│       └── ExampleTest.php
├── vendor/                   # Dependensi Composer (gitignore)
└── node_modules/             # Dependensi npm (gitignore)
```

---

## 3. Rute Web (`routes/web.php`)

| Path | Controller / Aksi | Nama Rute | Keterangan |
|------|-------------------|-----------|------------|
| `/` | redirect ke `/id` | — | Alias ke default locale |
| `/{locale}` | `HomeController@index` | `home` | Halaman beranda |
| `/{locale}/work` | `WorkController@index` | `work.index` | Daftar proyek |
| `/{locale}/work/{slug}` | `WorkController@show` | `work.show` | Detail proyek |
| `/{locale}/about` | `AboutController@index` | `about` | Tentang saya |
| `/{locale}/contact` | `ContactController@index` | `contact` | Kontak |
| `/sitemap.xml` | `SitemapController@index` | `sitemap` | XML sitemap |
| `/robots.txt` | Closure | `robots` | Robots.txt |

Middleware `locale` memvalidasi segmen pertama URL harus `id` atau `en`, selain itu redirect ke `/id`.

---

## 4. Kontroler (`app/Http/Controllers/`)

| Berkas | Tanggung Jawab |
|--------|----------------|
| `Controller.php` | Base abstract controller |
| `HomeController.php` | Beranda: hero, selected work, whatIDo, journey |
| `WorkController.php` | Daftar proyek + detail proyek (404 jika slug tidak ditemukan) |
| `AboutController.php` | Bio, timeline, credentials, skills |
| `ContactController.php` | Halaman kontak |
| `SitemapController.php` | Generate XML sitemap untuk semua locale + proyek |
| `SeoController.php` | Sitemap + robots SEO (tidak terdaftar dalam `web.php`, tersisa) |

---

## 5. Middleware (`app/Http/Middleware/SetLocale.php`)

- Membaca `$request->segment(1)` sebagai locale.
- Jika bukan `id` atau `en` → redirect ke route `home` dengan locale `id`.
- Memanggil `app()->setLocale($locale)` dan memperbarui singleton `ContentRepository`.

---

## 6. Layanan & Provider (`app/Services/`, `app/Providers/`)

| Berkas | Tanggung Jawab |
|--------|----------------|
| `ContentRepository.php` | Membaca berkas PHP konten dari `resources/content/{locale}/`, menyediakan getter (`get`, `getProject`, `getAllProjects`, `getTimeline`, `getCredentials`, `getSkills`, `getBio`, `getHero`, `getJourney`, `getWhatIDo`) |
| `ContentRepositoryServiceProvider.php` | Register `ContentRepository` sebagai singleton di container |
| `AppServiceProvider.php` | Kosong (boilerplate) |

---

## 7. Model (`app/Models/`)

| Berkas | Tanggung Jawab |
|--------|----------------|
| `User.php` | Model Authenticatable standar Laravel (HasFactory, Notifiable) |

---

## 8. Berkas Konten (`resources/content/{locale}/`)

Setiap locale memiliki berkas yang sama. Konten dikembalikan sebagai array PHP melalui `ContentRepository`.

| Berkas | Keterangan |
|--------|------------|
| `projects.php` | Data proyek portfolio (ansor-kaltim, bappeda-kaltim, koetai-mahkota-soundline) dengan ringkasan, role, stack, repositori, screenshot, dan outcome |
| `hero.php` | Data hero halaman beranda (role, description, CTA) |
| `whatido.php` | Backend & frontend stack yang dikuasai |
| `journey.php` | Lini waktu pencapaian (judul + daftar item) |
| `selectedwork.php` | Judul dan label "Lihat Semua Karya" |
| `bio.php` | Biografi singkat + alt foto |
| `skills.php` | Keahlian dibagi Backend / Frontend / Lainnya |
| `credentials.php` | Sertifikat (judul, penerbit, tanggal) |
| `timeline.php` | Timeline dengan tahun/bulan + event |
| `contact.php` | Judul dan deskripsi halaman kontak |

Contoh slug proyek yang tersedia:
- `ansor-kaltim` — Aplikasi Ansor Kaltim (Laravel, Livewire, MySQL)
- `bappeda-kaltim` — Website BAPPEDA Kaltim (HTML/CSS/JS, Bootstrap)
- `koetai-mahkota-soundline` — Promosi properti Koetai Mahkota Soundline

---

## 9. Berkas Bahasa (`lang/{locale}/`)

Digunakan oleh helper `__()` di Blade.

| Berkas | Keterangan |
|--------|------------|
| `site.php` | Nama situs, deskripsi, skip content, main nav, bahasa, tema |
| `nav.php` | Label navigasi: work, about, contact |
| `work.php` | Judul halaman karya, subtitel, filter kategori/teknologi |
| `project.php` | Label detail proyek: role, period, team, stack, problem, solution, dll. |
| `contact.php` | Label kontak: email, whatsapp, github, linkedin, chat_now, connect |
| `footer.php` | Copyright, unduh CV |
| `theme.php` | Label tema: light, dark, system |
| `status.php` | Lokasi dan status open to work |
| `errors.php` | Pesan 404 (title, description, tombol) |
| `about.php` | Judul dan bio (duplikasi konten dari `resources/content`) |

---

## 10. Tampilan Blade (`resources/views/`)

| Berkas | Keterangan |
|--------|------------|
| `layouts/app.blade.php` | Layout utama: header (nav, jam, bahasa, tema), main, footer |
| `home/index.blade.php` | Beranda: hero, selected work, whatIDo, journey, CTA |
| `work/index.blade.php` | Daftar proyek dengan filter kategori & teknologi |
| `work/show.blade.php` | Detail proyek: summary, stack, repo/live, problem, solution, decisions, features, screenshots, outcome, next project |
| `about/index.blade.php` | Foto & bio, timeline, skills, credentials, unduh CV |
| `contact/index.blade.php` | Kontak kartu: email, whatsapp, github, linkedin |
| `sitemap/index.blade.php` | Template XML sitemap |
| `errors/404.blade.php` | Halaman 404 |
| `components/project-card.blade.php` | Komponen kartu proyek (digunakan home & work) |
| `welcome.blade.php` | Halaman welcome default Laravel (tidak digunakan aktif) |

---

## 11. Database

### Migrasi (`database/migrations/`)

| Berkas | Tabel yang Dibuat |
|--------|-------------------|
| `0001_01_01_000000_create_users_table.php` | `users`, `password_reset_tokens`, `sessions` |
| `0001_01_01_000001_create_cache_table.php` | `cache`, `cache_locks` |
| `0001_01_01_000002_create_jobs_table.php` | `jobs`, `job_batches`, `failed_jobs` |

### Seeder (`database/seeders/DatabaseSeeder.php`)
Membuat satu user test (`Test User`, `test@example.com`).

### Factory (`database/factories/UserFactory.php`)
Factory untuk model `User` dengan password default `password`.

---

## 12. Konfigurasi

| Berkas | Keterangan |
|--------|------------|
| `config/site.php` | Nama, email, GitHub, WhatsApp, LinkedIn, site_url, cv_path, lokasi, timezone, locales |
| `bootstrap/app.php` | Routing, middleware (`locale` alias + web group), provider `ContentRepositoryServiceProvider`, exceptions |
| `routes/console.php` | Perintah Artisan `inspire` |
| `vite.config.js` | Input `resources/css/app.css` + `resources/js/app.js`, Tailwind plugin |
| `vercel.json` | Build serverless PHP (`api/index.js`), static `public/**`, routes ke `api/index.php` |

---

## 13. Aset Publik (`public/`)

| Path | Keterangan |
|------|------------|
| `index.php` | Entry point Laravel |
| `.htaccess`, `robots.txt`, `favicon.ico` | Standar web server |
| `cv/Aldin-Nur-Adzin-CV.pdf` | CV unduhan |
| `images/aldin.jpg` | Foto profil |
| `images/kms1.png`, `kms2.png`, `bappeda1.png`, `bappeda2.png` | Gambar pendukung |
| `projects/*/thumbnail.png` | Thumbnail proyek (ansor-kaltim, bappeda-kaltim, koetai-soundline) |
| `build/` | Output Vite (CSS dikompilasi, font, manifest) |

---

## 14. Uji (`tests/`)

| Berkas | Cakupan |
|--------|---------|
| `tests/TestCase.php` | Base test case |
| `tests/Unit/ExampleTest.php` | Contoh uji unit |
| `tests/Feature/RouteTest.php` | Uji semua rute dalam kedua locale, proyek, 404, redirect locale tidak valid |
| `tests/Feature/ExampleTest.php` | Contoh uji feature |

Config uji (`phpunit.xml`) menggunakan SQLite in-memory, cache array, queue sync.

---

## 15. File Konfigurasi Lainnya

| Berkas | Keterangan |
|--------|------------|
| `.env` / `.env.example` | Variabel lingkungan aplikasi |
| `.gitignore` | Log, env, vendor, node_modules, build, IDE, dll. |
| `.editorconfig` | UTF-8, LF, spasi 4, newline akhir |
| `.npmrc` | `ignore-scripts=true`, `audit=true` |
| `package.json` | Build/dev via Vite, Tailwind 4, Alpine.js, fontsource |
| `composer.json` | Laravel 13, PHPUnit 12, Pint, Tinker, dll. |
| `junit.xml` | Cache hasil uji PHPUnit terakhir |

---

## 16. Arsitektur Konten (Alur Data)

```
routes/web.php
  → Middleware SetLocale (set locale + ContentRepository)
  → Controller (Home/Work/About/Contact/Sitemap)
    → ContentRepository::get('file') / getProject($slug)
      → require resource_path("content/{locale}/{file}.php")
    → view('*.blade.php', $data)
      → layouts/app.blade.php (@yield('content'))
        → __() dari lang/{locale}/*.php
```

---

## 17. Catatan Penting

- `SeoController` ada tetapi **tidak terdaftar** dalam `routes/web.php`; rute sitemap/robots dihandle oleh `SitemapController` dan closure di `web.php`.
- `welcome.blade.php` adalah halaman default Laravel dan **tidak digunakan** oleh rute aplikasi.
- Semua konten situs disimpan sebagai berkas PHP dalam `resources/content/` (bukan database), kecuali tabel auth/standar Laravel.
- Proyek `koetai-mahkota-soundline` memiliki `stack` / `technologies` bernilai `['TODO(owner)']` — menunggu data dari pemilik.

---

*Dibuat untuk mengindex keseluruhan proyek portfolio-laravel.* 