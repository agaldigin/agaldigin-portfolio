# Portfolio Laravel — Aldin Nur Adzin, S.Tr.Kom.

Situs portofolio bilingual (ID/EN) milik Aldin Nur Adzin, Frontend & Backend Developer (Laravel focus) dari Samarinda, Kalimantan Timur. Dibangun dengan Laravel 13, PHP 8.3, Tailwind CSS 4, Vite, dan Alpine.js. Di-deploy ke Vercel.

---

# Portfolio Laravel — Aldin Nur Adzin, S.Tr.Kom.

Aldin Nur Adzin's bilingual (ID/EN) portfolio site, Frontend & Backend Developer (Laravel focus) from Samarinda, East Kalimantan. Built with Laravel 13, PHP 8.3, Tailwind CSS 4, Vite, and Alpine.js. Deployed on Vercel.

---

## 🇮🇩 Bahasa Indonesia

### Menjalankan Secara Lokal (Laragon)

1. Pastikan PHP 8.3+ dan Composer terpasang:
   ```sh
   php -v
   composer -V
   ```

2. Instal dependensi:
   ```sh
   composer install
   npm install --ignore-scripts
   ```

3. Siapkan environment:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

4. Jalankan build aset:
   ```sh
   npm run build
   ```

5. Buka situs di Laragon: `http://portfolio-laravel.test/id` dan `/en`.

### Mengedit Konten

Konten situs disimpan sebagai berkas PHP di `resources/content/{id,en}/` dan terjemahan di `lang/{id,en}/`. Edit berkas tersebut langsung, tidak perlu sentuh database.

### Deploy ke Vercel (untuk pemula)

1. Buat repo GitHub baru dan push kode ini:
   ```sh
   git init
   git add .
   git commit -m "Initial commit"
   git remote add origin https://github.com/USERNAME/REPO.git
   git push -u origin main
   ```

2. Masuk ke [Vercel](https://vercel.com), pilih **Add New → Project**, impor repo GitHub Anda.

3. Vercel akan mendeteksi proyek PHP/Laravel. Konfigurasikan:
   - **Build Command**: `npm run build`
   - **Output Directory**: `public`
   - **Install Command**: `composer install && npm install --ignore-scripts`

4. Set variabel lingkungan di Vercel (Project Settings → Environment Variables):
   | Variabel | Nilai Contoh |
   |----------|--------------|
   | `APP_KEY` | Hasil `php artisan key:generate --show` |
   | `APP_ENV` | `production` |
   | `APP_DEBUG` | `false` |
   | `APP_URL` | `https://nama-app.vercel.app` |
   | `LOG_CHANNEL` | `stderr` |
   | `SESSION_DRIVER` | `cookie` |
   | `CACHE_STORE` | `array` |
   | `QUEUE_CONNECTION` | `sync` |

5. Klik **Deploy**. Buka URL `*.vercel.app/id` dan `/en` untuk memverifikasi. Tambahkan domain custom nantinya dari dashboard Vercel.

---

## 🇬🇧 English

### Running Locally (Laragon)

1. Make sure PHP 8.3+ and Composer are installed:
   ```sh
   php -v
   composer -V
   ```

2. Install dependencies:
   ```sh
   composer install
   npm install --ignore-scripts
   ```

3. Set up environment:
   ```sh
   cp .env.example .env
   php artisan key:generate
   ```

4. Build assets:
   ```sh
   npm run build
   ```

5. Open the site via Laragon: `http://portfolio-laravel.test/id` and `/en`.

### Editing Content

Site content is stored as PHP files in `resources/content/{id,en}/` and translations in `lang/{id,en}/`. Edit those files directly, no database needed.

### Deploy to Vercel (Beginner Guide)

1. Create a new GitHub repo and push this code:
   ```sh
   git init
   git add .
   git commit -m "Initial commit"
   git remote add origin https://github.com/USERNAME/REPO.git
   git push -u origin main
   ```

2. Go to [Vercel](https://vercel.com), select **Add New → Project**, import your GitHub repo.

3. Vercel will detect the PHP/Laravel project. Configure:
   - **Build Command**: `npm run build`
   - **Output Directory**: `public`
   - **Install Command**: `composer install && npm install --ignore-scripts`

4. Set environment variables in Vercel (Project Settings → Environment Variables):
   | Variable | Example Value |
   |----------|---------------|
   | `APP_KEY` | Output of `php artisan key:generate --show` |
   | `APP_ENV` | `production` |
   | `APP_DEBUG` | `false` |
   | `APP_URL` | `https://your-app.vercel.app` |
   | `LOG_CHANNEL` | `stderr` |
   | `SESSION_DRIVER` | `cookie` |
   | `CACHE_STORE` | `array` |
   | `QUEUE_CONNECTION` | `sync` |

5. Click **Deploy**. Open `*.vercel.app/id` and `/en` to verify. Add a custom domain later from the Vercel dashboard.

---

## Struktur Proyek Singkat / Quick Project Structure

| Lokasi | Isi |
|--------|-----|
| `resources/content/{id,en}/` | Konten situs (proyek, bio, hero, dll.) |
| `lang/{id,en}/` | Terjemahan UI (`__()`) |
| `resources/views/` | Tampilan Blade |
| `app/Http/Controllers/` | Kontroler Laravel |
| `routes/web.php` | Rute web |
| `public/build/` | Aset Vast dikompilasi (dikomit ke git) |
| `vercel.json` | Konfigurasi Vercel |

---

## Lisensi

MIT License.

---
## License

MIT License.