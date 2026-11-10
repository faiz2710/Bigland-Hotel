# 🏨 Bigland Hotel & Suites

Aplikasi web pemesanan kamar hotel (reservasi) berbasis **Laravel 13** dengan tampilan modern bergaya luxury hotel. Pengunjung dapat melihat koleksi kamar, melakukan pemesanan tanpa perlu membuat akun, mencetak invoice, dan melihat riwayat reservasi.

---

## ✨ Fitur Utama

- **Beranda** — landing page profil hotel, keunggulan, dan galeri.
- **Daftar Kamar** — katalog tipe kamar (Standar, Deluxe, Executif Suite) lengkap dengan harga, fasilitas, dan keunggulan.
- **Detail Kamar** — halaman detail tiap tipe kamar beserta video tour virtual.
- **Formulir Pemesanan** — reservasi tanpa login dengan validasi data (nama, NIK 16 digit, jenis kelamin, tipe kamar, tanggal check-in, durasi, dan opsi breakfast).
- **Perhitungan Biaya Otomatis** — total kamar dihitung dari harga × durasi, tambahan sarapan Rp 80.000/malam, dan **diskon 10%** untuk menginap minimal 3 malam.
- **Invoice / Struk** — halaman invoice resmi yang muncul setelah pemesanan berhasil.
- **Riwayat Pemesanan** — daftar seluruh reservasi beserta aksi hapus/batal.
- **Tentang Kami** — halaman informasi hotel.
- **Autentikasi** (Laravel Breeze) — tersedia secara opsional; alur reservasi utama tetap bisa diakses tanpa login.

---

## 🛠️ Tech Stack

| Komponen | Keterangan |
| --- | --- |
| Framework | Laravel 13.x (PHP 8.3+) |
| Frontend | Blade, Tailwind CSS 4, Alpine.js, Vite |
| Database | SQLite (default), dapat diganti MySQL |
| Testing | Pest / PHPUnit |

---

## 🗄️ Struktur Data

Tabel utama: `tbl_pemesanan`

| Kolom | Keterangan |
| --- | --- |
| `user_id` | Relasi ke `users` (nullable, karena reservasi bisa tanpa login) |
| `nama` | Nama lengkap pemesan |
| `jenis_kelamin` | `Laki-laki` / `Perempuan` |
| `nomor_identitas` | NIK 16 digit |
| `tipe_kamar` | Standar / Deluxe / Executif |
| `harga` | Harga kamar per malam |
| `tanggal_pesan` | Tanggal check-in |
| `durasi` | Jumlah malam |
| `diskon` | Diskon yang diberikan |
| `total_bayar` | Total biaya akhir |

---

## 🚀 Instalasi & Menjalankan Project

### Prasyarat
- PHP ^8.3
- Composer
- Node.js & NPM
- SQLite (default) atau MySQL

### Langkah-langkah

```bash
# 1. Clone repository
git clone https://github.com/faiz2710/Bigland-Hotel.git
cd Bigland-Hotel

# 2. Install dependency
composer install
npm install

# 3. Siapkan environment
cp .env.example .env
php artisan key:generate

# 4. Migrasi database (default SQLite)
php artisan migrate

# 5. Build asset & jalankan server
npm run build
php artisan serve
```

Buka `http://127.0.0.1:8000` di browser.

Untuk mode development dengan hot reload:

```bash
composer run dev
```

---

## 🗺️ Rute Utama

| Rute | Fungsi |
| --- | --- |
| `/` | Beranda |
| `/produk` | Daftar kamar |
| `/detail-produk/{tipe}` | Detail kamar & video tour |
| `/pesan` | Formulir pemesanan |
| `/invoice/{id}` | Invoice / struk pemesanan |
| `/riwayat` | Riwayat pemesanan |
| `/tentang-kami` | Tentang hotel |

---

## 📄 Lisensi

Proyek ini dibuat untuk keperluan pembelajaran dan pengembangan aplikasi reservasi hotel.
