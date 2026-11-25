# Belajar Laravel

Proyek latihan mata kuliah Pemrograman Web (Laravel) yang berisi seluruh latihan dan tugas Pertemuan 12 sampai 18. Semua halaman bisa dibuka lewat satu dashboard, jadi tidak perlu mengetik alamat satu per satu.

## Identitas

- Nama: Muhammad Arif Arkan
- NIM: 231011403233
- Kelas: 07TPLP013
- Program Studi: Teknik Informatika, Universitas Pamulang (UNPAM)

## Isi Proyek

- Pertemuan 12: Pengenalan framework PHP dan routing dasar
- Pertemuan 13: Laravel MVC (model, controller, view)
- Pertemuan 14: Autentikasi dan otorisasi (login, register, role)
- Pertemuan 15: RESTful API dan halaman client
- Pertemuan 16: Debugging, error handling, dan pengujian
- Pertemuan 17: Laporan PDF dan CSV
- Pertemuan 18: Git dan GitHub (halaman kontak kampus dan dokumentasi)

## Teknologi

- PHP dan Laravel
- MySQL (lewat Laragon)
- Laravel Sanctum untuk API
- barryvdh/laravel-dompdf untuk laporan PDF
- Git dan GitHub untuk version control

## Cara Menjalankan

1. Clone repositori ini, lalu masuk ke foldernya.
2. Pasang dependensi dengan perintah `composer install`.
3. Salin file `.env.example` menjadi `.env`.
4. Buat application key dengan perintah `php artisan key:generate`.
5. Buat database MySQL bernama `belajar_laravel`, lalu sesuaikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di file `.env`.
6. Jalankan migrasi dengan perintah `php artisan migrate`.
7. Jalankan server dengan perintah `php artisan serve --port=8001`.
8. Buka `http://127.0.0.1:8001` di browser untuk melihat dashboard.

## Catatan

File `.env` dan folder `vendor` tidak ikut di repositori. Keduanya dibuat ulang lewat langkah di atas.