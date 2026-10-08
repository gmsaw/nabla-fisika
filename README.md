# 🪐 Nabla Fisika

Platform pembelajaran fisika resmi **HIMAFI UNUD** — tempat mahasiswa fisika UNUD dan publik dapat menjelajahi, mempelajari, dan mendapatkan sertifikat kelas fisika secara terstruktur.

> Dibangun untuk mengatasi gap materi akibat konversi MBKM dan membuka akses belajar lintas peminatan.

---

## 📖 Daftar Isi

- [Tentang Proyek](#-tentang-proyek)
- [Fitur Utama](#-fitur-utama)
- [Tech Stack](#-tech-stack)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Menjalankan Proyek](#-menjalankan-proyek)
- [Struktur Folder](#-struktur-folder)
- [Alur Kerja Git](#-alur-kerja-git)
- [Kontribusi](#-kontribusi)
- [Tim](#-tim)
- [Lisensi](#-lisensi)

---

## 🌌 Tentang Proyek

**Nabla Fisika** adalah platform LMS (Learning Management System) yang dirancang khusus untuk ekosistem Program Studi Fisika. Platform ini memungkinkan:

- **Mahasiswa fisika UNUD** menutup gap materi yang hilang akibat konversi Merdeka Belajar.
- **Mahasiswa lintas peminatan** mempelajari bidang fisika di luar peminatan utamanya.
- **Publik umum** mempelajari fisika secara terstruktur dan mendapatkan sertifikat resmi.

Setiap kelas disusun secara berurutan (gated progression), dievaluasi dengan kuis & ujian, dan diakhiri dengan sertifikat digital yang dapat diverifikasi keasliannya.

---

## ✨ Fitur Utama

| Kategori | Fitur |
|---|---|
| **Autentikasi** | Registrasi email/password, verifikasi email, SSO `himafiunud.com` |
| **Katalog Kelas** | Filter kategori & tingkat kesulitan, lihat silabus tanpa login |
| **Modul** | Konten teks, embed YouTube, PDF, link Google Drive |
| **Gated Progression** | Modul terkunci sampai modul sebelumnya diselesaikan |
| **Kuis** | Pilihan ganda, timer, soal acak, passing grade 75, unlimited retry |
| **Ujian Akhir** | Evaluasi komprehensif di akhir silabus |
| **Sertifikat** | PDF otomatis + QR code verifikasi publik |
| **Diskusi** | Forum per kelas dengan notifikasi email |
| **Gamifikasi** | XP (materi +20, kuis +120, ujian +500), badge, heatmap belajar |
| **Dashboard** | Riwayat kelas, jam belajar, sertifikat |
| **Admin Panel** | Kelola user, kelas, lecturer, sertifikat, analytics |
| **Syllabus Builder** | Susun kelas, chapter, bobot nilai tanpa ubah kode |

---

## 🛠 Tech Stack

| Layer | Teknologi |
|---|---|
| **Backend** | Laravel 11 |
| **Database** | MySQL 8 |
| **Frontend** | Blade + Tailwind CSS + Alpine.js |
| **Build Tool** | Vite |
| **Auth** | Laravel Breeze |
| **Editor** | Markdown + LaTeX (KaTeX) |
| **PDF** | DomPDF / Snappy `[TBD]` |
| **QR** | Simple QrCode `[TBD]` |
| **Email** | SMTP `[TBD: provider]` |
| **Hosting** | Domainesia + Cloudflare DNS |
| **SSO** | OAuth2 ke himafiunud.com `[TBD]` |

---

## 💻 Persyaratan Sistem

Pastikan sudah terinstall di komputer Anda:

| Tool | Versi Minimum | Cek dengan |
|---|---|---|
| PHP | 8.2+ | `php -v` |
| Composer | 2.x | `composer -V` |
| Node.js | 18+ | `node -v` |
| NPM | 9+ | `npm -v` |
| MySQL | 8.x | `mysql --version` |
| Git | 2.x | `git --version` |

**Ekstensi PHP wajib:** `bcmath`, `ctype`, `curl`, `dom`, `fileinfo`, `json`, `mbstring`, `openssl`, `pcre`, `pdo`, `pdo_mysql`, `tokenizer`, `xml`.

---

## 🚀 Instalasi

### 1. Clone Repositori

```bash
git clone https://github.com/USERNAME/nabla-fisika.git
cd nabla-fisika
```

### 2. Install Dependency PHP

```bash
composer install
```

### 3. Install Dependency Node

```bash
npm install
```

### 4. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` dan sesuaikan:

```env
APP_NAME="Nabla Fisika"
APP_ENV=local
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nabla_fisika
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="noreply@nablafisika.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### 5. Buat Database

```bash
mysql -u root -p -e "CREATE DATABASE nabla_fisika CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### 6. Jalankan Migrasi & Seeder

```bash
php artisan migrate
php artisan db:seed
```

### 7. Buat Symlink Storage

```bash
php artisan storage:link
```

---

## ▶️ Menjalankan Proyek

Butuh **2 terminal** yang jalan bersamaan.

### Terminal 1 — Laravel Server

```bash
php artisan serve
```

Akses: **http://127.0.0.1:8000**

### Terminal 2 — Vite (Tailwind & JS)

```bash
npm run dev
```

### Alternatif: Satu Perintah (Composer Script)

Kalau sudah disetup di `composer.json`:

```bash
composer run dev
```

### Akses dari HP / Device Lain (WiFi sama)

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Lalu di HP buka: `http://IP_LAPTOP:8000`

---

## 📁 Struktur Folder

```
nabla-fisika/
├── app/
│   ├── Http/
│   │   ├── Controllers/       # Controller (tipis, tanpa business logic)
│   │   ├── Middleware/        # Middleware custom (role, gated)
│   │   └── Requests/          # Form Request validation
│   ├── Models/                # Eloquent Models
│   ├── Services/              # Business logic (XP, kuis, sertifikat)
│   ├── Policies/              # Authorization
│   └── Jobs/                  # Queue jobs (email, PDF)
├── bootstrap/
├── config/
├── database/
│   ├── migrations/            # Skema database
│   ├── seeders/               # Data dummy/awal
│   └── factories/             # Factory untuk testing
├── public/
├── resources/
│   ├── views/
│   │   ├── layouts/           # Layout utama
│   │   ├── components/        # Blade components (tombol, modal)
│   │   ├── auth/              # Halaman auth
│   │   ├── courses/           # Katalog & detail kelas
│   │   ├── modules/           # Materi modul
│   │   ├── quizzes/           # Kuis & ujian
│   │   ├── certificates/      # Sertifikat & verifikasi
│   │   ├── discussions/       # Forum diskusi
│   │   └── admin/             # Admin panel
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   ├── api.php
│   └── auth.php
├── storage/
├── tests/
│   ├── Feature/
│   └── Unit/
├── .env.example
├── .gitignore
├── CONTRIBUTING.md
├── README.md
└── composer.json
```

---

## 🌿 Alur Kerja Git

Proyek ini menggunakan model **feature-branch workflow** dengan 2 branch utama:

| Branch | Fungsi |
|---|---|
| `main` | **Produksi**. Hanya kode yang sudah rilis. **Dilarang push langsung.** |
| `staging` | **Integrasi**. Tempat gabung semua fitur sebelum rilis. |
| `feature/*` | Fitur baru. Contoh: `feature/auth-sso` |
| `bugfix/*` | Perbaikan bug development. |
| `hotfix/*` | Perbaikan darurat dari `main`. |

### Alur Harian Developer

```bash
# 1. Ambil kode terbaru dari staging
git checkout staging
git pull origin staging

# 2. Buat branch baru
git checkout -b feature/nama-fitur

# 3. Kerjakan, lalu commit
git add .
git commit -m "feat(modul): tambah halaman detail modul"

# 4. Push ke GitHub
git push origin feature/nama-fitur

# 5. Buka Pull Request ke staging di GitHub
# 6. Minta minimal 1 approval dari anggota lain
# 7. Setelah approved, baru bisa di-merge
```

### Format Commit (Conventional Commits)

```
tipe(cakupan): deskripsi singkat
```

| Tipe | Kegunaan |
|---|---|
| `feat` | Fitur baru |
| `fix` | Perbaikan bug |
| `ui` | Perubahan tampilan saja |
| `refactor` | Rapikan kode tanpa ubah perilaku |
| `docs` | Dokumentasi |
| `chore` | Perawatan (update dependency, dll.) |
| `test` | Penambahan/perbaikan test |

**Contoh:**
```
feat(auth): tambah login dengan SSO himafi
fix(kuis): perbaiki kalkulasi nilai akhir
ui(katalog): sesuaikan padding card materi
```

Detail lengkap ada di [`CONTRIBUTING.md`](./CONTRIBUTING.md).

---

## 🤝 Kontribusi

1. Baca [`CONTRIBUTING.md`](./CONTRIBUTING.md) sebelum mulai.
2. Pilih issue di tab **Issues** GitHub, assign ke diri sendiri.
3. Ikuti alur kerja Git di atas.
4. PR wajib:
   - Punya deskripsi jelas.
   - Mendapat minimal **1 approval**.
   - Tidak ada konflik dengan `staging`.
   - Sebutkan migration jika ada perubahan database.

### Aturan Penting

- ❌ Dilarang push langsung ke `main` / `staging`.
- ❌ Dilarang merge PR sendiri.
- ✅ Business logic di `Service Class`, bukan di Controller.
- ✅ Gunakan Blade Components untuk elemen berulang.
- ✅ Jangan ubah file migration lama — buat migration baru.

---

## 👥 Tim

| Nama | Peran |
|---|---|
| `Mahendra` | Leader / Fullstack |
| `Widnyana` | Fullstack |
| `Adit` | Fullstack |
| `Kenny` | Fullstack |
| `Sidan` | Fullstack |
| `Ari Daniswara` | Fullstack |
| `Patrick` | Fullstack |
| `Gus Agha` | Fullstack |

---

## ❓ FAQ / Troubleshooting

**Q: Halaman blank setelah `php artisan serve`?**  
A: Pastikan `npm run dev` juga jalan di terminal lain.

**Q: Error "No application encryption key"?**  
A: Jalankan `php artisan key:generate`.

**Q: Error koneksi database?**  
A: Cek `.env` — `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.

**Q: Error aneh setelah pull?**  
A: Coba:
```bash
composer install
php artisan migrate
php artisan optimize:clear
npm install && npm run dev
```

**Q: Migration error karena kolom sudah ada?**  
A: Jangan edit migration lama. Buat migration baru untuk perubahan.

---

## 📜 Lisensi

Proyek ini dikembangkan untuk keperluan internal **HIMAFI UNUD**.  
© 2025 HIMAFI UNUD. All rights reserved.

---

<p align="center">
  Dibuat dengan ❤️ oleh Tim Nabla Fisika
</p>
