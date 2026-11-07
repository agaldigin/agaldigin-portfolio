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
├── prompt-perbaikan.md       # Pedoman perbaikan & kesiapan Vercel
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
│   │   │   ├── Middleware/
│   │   │   │   └── SetLocale.php
│   │   ├── Models/
│   │   │   └── User.php
│   │   ├── Providers/
│   │   │   ├── AppServiceProvider.php
│   │   │   └── ContentRepositoryServiceProvider.php
│   │   └── Services/
│   │       └── ContentRepository.php
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
│   │   nav.php, project.php, site.php, status.php, theme.php, work.php
├── public/
│   ├── index.php             # Entry point web
│   ├── .htaccess
│   ├── favicon.ico
│   ├── favicon-192.png
│   ├── favicon-512.png
│   ├── apple-touch-icon.png
│   ├── robots.txt
│   ├── cv/
│   │   └── Aldin-Nur-Adzin-CV.pdf
│   ├── images/
│   │   ├── aldin.jpg
│   │   └── og.png
│   ├── projects/
│   │   ├── ansor-kaltim/
│   │   │   ├── thumbnail.jpg, 01-login-captcha.jpg, 02-dashboard-statistik.jpg,
│   │   │   03-manajemen-struktur-organisasi.jpg, 04-tabel-manajemen-anggota.jpg,
│   │   │   05-generator-qr-absensi.jpg, 06-dashboard-absensi-log-real-time.jpg,
│   │   │   07-konfigurasi-hak-akses-rbac.jpg, 08-import-excel-10-sheet.jpg
│   │   ├── bappeda-kaltim/
│   │   │   ├── thumbnail.jpg, 01-beranda.jpg, 02-halaman-publik.jpg
│   │   └── koetai-mahkota-soundline/
│   │       ├── thumbnail.jpg, 01-pesanan-tiket.jpg, 02-pesan-tiket.jpg
│   └── build/
│       ├── assets/           # Aset dikompilasi Vite (CSS, font, JS)
│       └── manifest.json
├── resources/
│   ├── css/app.css
│   ├── js/app.js
│   ├── views/
│   │   ├── layouts/app.blade.php
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
│   │   │   selectedwork.php, bio.php, skills.php, credentials.php,
│   │   │   timeline.php, contact.php
│       └── en/               # Konten bahasa Inggris
│           ├── projects.php, hero.php, whatido.php, journey.php,
│   │   selectedwork.php, bio.php, skills.php, credentials.php,
│   │   timeline.php, contact.php
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
│       └── RouteTest.php
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

`SeoController.php` dan `welcome.blade.php` telah dihapus (tidak terpakai).

---

## 5. Middleware (`app/Http/Middleware/SetLocale.php`)

- Membaca `$request->segment(1)` sebagai locale.
- Jika bukan `id` atau `en` → redirect ke route `home` dengan locale `id`.
- Memanggil `app()->setLocale($locale)` dan memperbarui singleton `ContentRepository`.

---

## 6. Layanan & Provider (`app/Services/`, `app/Providers/`)

| Berkas | Tanggung Jawab |
|--------|----------------|
| `ContentRepository.php` | Membaca berkas PHP konten dari `resources/content/{locale}/`, menyediakan getter (`get`, `getProject`, `getAllProjects`, `getTimeline`, `getCredentials`, `getSkills`, `getBio`, `getHero`, `getJourney`, `getWhatIDo`) + `sanitize()` (menghapus `TODO(owner)` dan string kosong sebelum render) |
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
- `ansor-kaltim` — Aplikasi Ansor Kaltim (Laravel, Livewire, PHP, MySQL, Tailwind CSS)
- `bappeda-kaltim` — Website BAPPEDA Kaltim (Frontend, Responsive, Navigasi)
- `koetai-mahkota-soundline` — Website pemesanan tiket Koetai Mahkota Soundline (Frontend)

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
| `layouts/app.blade.php` | Layout utama: head SEO (favicon, OG, Twitter Card, hreflang, canonical, JSON-LD yield), header, main, footer |
| `home/index.blade.php` | Beranda: hero, selected work, whatIDo, journey, CTA, JSON-LD Person |
| `work/index.blade.php` | Daftar proyek dengan filter kategori & teknologi |
| `work/show.blade.php` | Detail proyek: summary, stack, repo/live, problem, solution, decisions, features, screenshots (placeholder jika tidak ada), outcome, next project |
| `about/index.blade.php` | Foto & bio, timeline, skills, credentials, unduh CV, JSON-LD Person |
| `contact/index.blade.php` | Kontak kartu: email, whatsapp, github, linkedin (kondisional) |
| `sitemap/index.blade.php` | Template XML sitemap dengan xhtml:link alternatif |
| `errors/404.blade.php` | Halaman 404 |
| `components/project-card.blade.php` | Komponen kartu proyek (thumbnail fallback .jpg/.png, placeholder, tag difilter, linkable) |

`welcome.blade.php` telah dihapus.

---

## 11. SEO & Aksesibilitas (Fase 3)

- `<html lang="{{ app()->getLocale() }}">`
- Favicon: `favicon.ico`, `favicon-192.png`, `favicon-512.png`, `apple-touch-icon.png`
- Open Graph: `og:type`, `og:url` (absolut), `og:site_name`, `og:locale`, `og:title`, `og:description`, `og:image` (1200×630)
- Twitter Card: `summary_large_image`, `twitter:site`, `twitter:title`, `twitter:description`, `twitter:image`
- JSON-LD `Person` di beranda dan About (nama, pekerjaan, kota, `sameAs` GitHub)
- `hreflang` untuk `id`, `en`, dan `x-default` di semua halaman
- XML sitemap dengan alternatif `xhtml:link` per URL
- `robots.txt` menyertakan URL sitemap absolut

---

## 12. Database

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

## 13. Konfigurasi

| Berkas | Keterangan |
|--------|------------|
| `config/site.php` | Nama, email, GitHub, WhatsApp, LinkedIn, site_url, cv_path, lokasi, timezone, locales |
| `bootstrap/app.php` | Routing, middleware (`locale` alias + web group), provider `ContentRepositoryServiceProvider`, exceptions |
| `routes/console.php` | Perintah Artisan `inspire` |
| `vite.config.js` | Input `resources/css/app.css` + `resources/js/app.js`, Tailwind plugin, `@custom-variant dark` |
| `vercel.json` | Build serverless PHP (`api/index.php`), static `public/**`, routes ke `api/index.php` |

---

## 14. Uji (`tests/`)

| Berkas | Cakupan |
|--------|---------|
| `tests/TestCase.php` | Base test case |
| `tests/Unit/ExampleTest.php` | Contoh uji unit |
| `tests/Feature/RouteTest.php` | Semua rute kedua locale, halaman beranda menampilkan 3 proyek, kunci bahasa identik, tidak ada `TODO(owner)`, semua thumbnail/screenshot ada, root redirect |

Config uji (`phpunit.xml`) menggunakan SQLite in-memory, cache array, queue sync.

---

## 15. File Konfigurasi Lainnya

| Berkas | Keterangan |
|--------|------------|
| `.env` / `.env.example` | Variabel lingkungan aplikasi |
| `.gitignore` | Log, env, vendor, node_modules, IDE, `/assets/`, `/prompt*.md`, `/AI-HANDOFF*.md`, `junit.xml` (build `public/build` di-commit) |
| `.editorconfig` | UTF-8, LF, spasi 4, newline akhir |
| `.npmrc` | `ignore-scripts=true`, `audit=true` |
| `.vercelignore` | `/vendor`, `/assets/`, `/prompt*.md`, `/AI-HANDOFF*.md`, `index.md`, `AGENTS.md`, `CLAUDE.md`, `/tests/` |
| `package.json` | Build/dev via Vite, Tailwind 4, Alpine.js, fontsource |
| `composer.json` | Laravel 13, PHPUnit 12, Pint, Tinker, dll. |

---

## 16. Catatan Penting

- `public/build` ikut ter-commit agar CSS/JS tersedia di Vercel.
- Semua konten situs disimpan sebagai berkas PHP dalam `resources/content/` (bukan database).
- Proyek `koetai-mahkota-soundline` adalah website pemesanan tiket (bukan promosi properti), stack tidak ditulis (tidak diketahui).
- Tidak ada `TODO(owner)` yang boleh tampil di UI (difilter oleh `ContentRepository::sanitize()`).

---

*Dibuat untuk mengindex keseluruhan proyek portfolio-laravel.*
