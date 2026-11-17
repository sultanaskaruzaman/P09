# Pemrograman Web - P09: Form Handling (GET & POST)

Repositori ini berisi kode latihan dan proyek studi kasus **Toko Online Mini UMKM Sekar Jagad** untuk Pertemuan 9 mata kuliah Pemrograman Web. Fokus dari proyek ini adalah implementasi penanganan formulir (*Form Handling*), validasi server-side, sanitasi keamanan output, serta penerapan pola **Post/Redirect/Get (PRG)** untuk mencegah pengiriman data ganda (*double submission*).

---

##  Struktur Folder & File

```text
www/ (atau htdocs/)
├── latihan/
│   ├── form-sapa.php       # (HO-1) Anatomi form HTML dan method GET
│   └── cek-request.php     # (HO-2) Membedakan $_SERVER, $_GET, dan $_POST
└── toko-umkm/              # (HO-3 s.d. HO-6) Aplikasi Toko Online UMKM
    ├── data.php            # Sumber data produk (array) & konstanta lokasi JSON
    ├── functions.php       # Pustaka fungsi: sanitasi (e), format, validasi, & JSON
    ├── index.php           # Katalog utama + fitur pencarian & filter (GET)
    ├── pesan.php           # Form pemesanan + validasi server & pola PRG (POST)
    ├── pesan-tanpa-prg.php # Demo simulasi masalah double submission (F5)
    ├── daftar-pesanan.php  # Rekapitulasi pesanan dari file JSON
    ├── style.css           # Styling tampilan aplikasi toko
    └── data/
        └── pesanan.json    # File penyimpanan data pesanan (JSON storage)
```

---

##  Fitur & Implementasi Hands-on

1. **HO-1 (Form Sapa - Method GET)**
   - Mengamati passing parameter via URL query string (`?nama=...&kota=...`).
   - Implementasi pengamanan XSS menggunakan `htmlspecialchars()`.

2. **HO-2 (Pemeriksaan Request & Superglobal)**
   - Pembacaan variabel superglobal `$_SERVER` (`REQUEST_METHOD`, `REQUEST_URI`, dll).
   - Analisis pengiriman data `$_GET` vs `$_POST` via DevTools Payload.

3. **HO-3 (Katalog & Pencarian GET)**
   - Fitur pencarian produk *case-insensitive* menggunakan `stripos()`.
   - Filter kategori produk dengan sistem daftar putih (*whitelist*).

4. **HO-4 (Form Pemesanan POST & Validasi)**
   - Validasi sisi server (*backend validation*) untuk nama, WhatsApp, stok produk, dan jumlah.
   - Fitur *Sticky Form* agar input pengguna tidak hilang saat terjadi kesalahan validasi.

5. **HO-5 (Pola Post/Redirect/Get - PRG)**
   - Penulisan data pesanan ke file `pesanan.json` dengan `LOCK_EX`.
   - Penerapan `header("Location: ...", true, 303)` dan `exit;` untuk mencegah duplikasi data akibat tombol F5 / *resubmission*.

6. **HO-6 (Rekapitulasi Pesanan & JSON Storage)**
   - Pemrosesan rekapitulasi total omzet dan penayangan daftar pesanan terbaru.
   - Analisis keterbatasan file JSON sebagai persiapan migrasi ke database MySQL pada P10.

---

##  Persyaratan & Cara Menjalankan

### Persyaratan Sistem:
- **Web Server:** Apache (via Laragon / XAMPP)
- **PHP:** Versi 8.1 atau lebih baru

### Langkah Menjalankan:
1. Pastikan folder repositori ini diletakkan di direktori web server:
   - Laragon: `C:\laragon\www\toko-umkm` (dan `latihan/`)
   - XAMPP: `C:\xampp\htdocs\toko-umkm` (dan `latihan/`)
2. Start server Apache pada Control Panel (Laragon/XAMPP).
3. Buka browser dan akses via URL:
   - Katalog: `http://localhost/toko-umkm/index.php`
   - Form Pesan: `http://localhost/toko-umkm/pesan.php`
   - Rekap Pesanan: `http://localhost/toko-umkm/daftar-pesanan.php`

---

##  Catatan Penting Keamanan & Best Practices
- **Validasi Server-Side:** Atribut validasi HTML5 (`novalidate`) sengaja dimatikan saat pengujian untuk memastikan backend validation berjalan mandiri.
- **Keamanan XSS:** Seluruh variabel input pengguna di-escape menggunakan fungsi pembantu `e()` (`htmlspecialchars`) saat dicetak ke HTML.
