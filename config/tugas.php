<?php

// Daftar link tugas untuk dashboard.
// Tiap pertemuan selesai, tambahkan satu blok baru di bawah.
// jenis: 'latihan' = contoh soal/latihan, 'tugas' = tugas di halaman akhir PDF

return [
    'pertemuan' => [
        [
            'nomor' => 12,
            'judul' => 'Pengenalan Framework PHP (Laravel)',
            'items' => [
                ['jenis' => 'latihan', 'nama' => 'Praktik 1: Route sederhana (salam)', 'url' => '/salam'],
                ['jenis' => 'latihan', 'nama' => 'Praktik 1: Route sederhana (info kampus)', 'url' => '/info-kampus'],
                ['jenis' => 'latihan', 'nama' => 'Praktik 2: Parameter wajib (mahasiswa)', 'url' => '/mahasiswa/Rizky'],
                ['jenis' => 'latihan', 'nama' => 'Praktik 2: Parameter wajib (nilai)', 'url' => '/nilai/PemrogramanWeb/95'],
                ['jenis' => 'latihan', 'nama' => 'Praktik 3: Parameter opsional (katalog)', 'url' => '/katalog'],
                ['jenis' => 'latihan', 'nama' => 'Praktik 4: Batasan format (cek NIM)', 'url' => '/cek-nim/202401001'],
                ['jenis' => 'latihan', 'nama' => 'Praktik 5: View dan kirim data (biodata)', 'url' => '/biodata'],
                ['jenis' => 'latihan', 'nama' => 'Praktik 6: Route grouping (admin dosen)', 'url' => '/admin/dosen'],
                ['jenis' => 'latihan', 'nama' => 'Praktik 6: Fallback 404 custom', 'url' => '/halaman-ngawur'],
                ['jenis' => 'latihan', 'nama' => 'Mini proyek: Portal Perpustakaan Kampus', 'url' => '/perpustakaan'],
                ['jenis' => 'tugas', 'nama' => 'Klinik: Halaman utama', 'url' => '/klinik'],
                ['jenis' => 'tugas', 'nama' => 'Klinik: Daftar layanan', 'url' => '/klinik/layanan'],
                ['jenis' => 'tugas', 'nama' => 'Klinik: Detail poli (Gigi)', 'url' => '/klinik/poli/Gigi'],
                ['jenis' => 'tugas', 'nama' => 'Klinik: Detail poli (default)', 'url' => '/klinik/poli'],
                ['jenis' => 'tugas', 'nama' => 'Klinik: Nomor antrean pasien', 'url' => '/klinik/antrean/12'],
                ['jenis' => 'tugas', 'nama' => 'Klinik: Kontak darurat', 'url' => '/klinik/kontak'],
            ],
        ],
        [
            'nomor' => 13,
            'judul' => 'Penggunaan Konsep MVC pada Laravel',
            'items' => [
                ['jenis' => 'latihan', 'nama' => 'Katalog Mata Kuliah (daftar)', 'url' => '/matakuliah'],
                ['jenis' => 'latihan', 'nama' => 'Katalog Mata Kuliah (detail silabus IF305)', 'url' => '/matakuliah/IF305'],
                ['jenis' => 'tugas', 'nama' => 'Laboratorium: Direktori semua lab', 'url' => '/laboratorium'],
                ['jenis' => 'tugas', 'nama' => 'Laboratorium: Detail LAB-01', 'url' => '/laboratorium/detail/LAB-01'],
                ['jenis' => 'tugas', 'nama' => 'Laboratorium: Filter Tersedia', 'url' => '/laboratorium/status/Tersedia'],
                ['jenis' => 'tugas', 'nama' => 'Laboratorium: Filter Maintenance', 'url' => '/laboratorium/status/Sedang%20Maintenance'],
            ],
        ],
        [
            'nomor' => 14,
            'judul' => 'Autentikasi dan Otorisasi pada Aplikasi Web',
            'items' => [
                ['jenis' => 'latihan', 'nama' => 'Registrasi Akun Portal Akademik', 'url' => '/register'],
                ['jenis' => 'latihan', 'nama' => 'Login Portal Akademik', 'url' => '/login'],
                ['jenis' => 'latihan', 'nama' => 'Dashboard (wajib login)', 'url' => '/dashboard'],
                ['jenis' => 'latihan', 'nama' => 'Panel Admin (role admin)', 'url' => '/panel-admin'],
                ['jenis' => 'latihan', 'nama' => 'KRS Mahasiswa (role mahasiswa)', 'url' => '/krs-mahasiswa'],
                ['jenis' => 'tugas', 'nama' => 'E-Perpustakaan: Registrasi', 'url' => '/perpus/register'],
                ['jenis' => 'tugas', 'nama' => 'E-Perpustakaan: Login', 'url' => '/perpus/login'],
                ['jenis' => 'tugas', 'nama' => 'E-Perpustakaan: Dashboard', 'url' => '/perpus/dashboard'],
                ['jenis' => 'tugas', 'nama' => 'E-Perpustakaan: Kelola Buku (pustakawan)', 'url' => '/perpus/kelola-buku'],
                ['jenis' => 'tugas', 'nama' => 'E-Perpustakaan: Pinjam Buku (anggota)', 'url' => '/perpus/pinjam-buku'],
            ],
        ],
        [
            'nomor' => 15,
            'judul' => 'RESTful API pada Aplikasi Web',
            'items' => [
                ['jenis' => 'latihan', 'nama' => 'Portal Konsumen API Mahasiswa (halaman client)', 'url' => '/client-mahasiswa'],
                ['jenis' => 'latihan', 'nama' => 'Endpoint API Mahasiswa (JSON, GET /api/mahasiswa)', 'url' => '/api/mahasiswa'],
                ['jenis' => 'latihan', 'nama' => 'Endpoint API Mahasiswa detail (GET /api/mahasiswa/1)', 'url' => '/api/mahasiswa/1'],
                ['jenis' => 'tugas', 'nama' => 'Katalog Buku E-Perpustakaan (halaman client)', 'url' => '/perpus/katalog-api'],
                ['jenis' => 'tugas', 'nama' => 'Endpoint API Buku (JSON, GET /api/buku)', 'url' => '/api/buku'],
                ['jenis' => 'tugas', 'nama' => 'Endpoint API Buku detail (GET /api/buku/1)', 'url' => '/api/buku/1'],
            ],
        ],
        [
            'nomor' => 16,
            'judul' => 'Teknik Pengujian dan Debugging pada Aplikasi Web',
            'items' => [
                ['jenis' => 'latihan', 'nama' => 'Panel Simulasi Error Handling Nilai Akademik', 'url' => '/uji-nilai'],
                ['jenis' => 'latihan', 'nama' => 'Hitung IP normal (Rizky Pratama)', 'url' => '/uji-nilai/hitung/2410114001'],
                ['jenis' => 'latihan', 'nama' => 'Hitung IP normal (Siti Nabila)', 'url' => '/uji-nilai/hitung/2410114002'],
                ['jenis' => 'latihan', 'nama' => 'Uji try-catch (Total SKS 0)', 'url' => '/uji-nilai/hitung/2410114003'],
                ['jenis' => 'latihan', 'nama' => 'Uji debugging dd()', 'url' => '/uji-nilai/hitung/2410114001?debug=1'],
                ['jenis' => 'latihan', 'nama' => 'Uji halaman 404 kustom (NIM tidak terdaftar)', 'url' => '/uji-nilai/hitung/99999999'],
                ['jenis' => 'tugas', 'nama' => 'E-Perpustakaan: Panel Uji Denda', 'url' => '/perpus/uji-denda'],
                ['jenis' => 'tugas', 'nama' => 'Hitung denda normal (PJ-001)', 'url' => '/perpus/uji-denda/hitung/PJ-001'],
                ['jenis' => 'tugas', 'nama' => 'Hitung denda tanpa keterlambatan (PJ-002)', 'url' => '/perpus/uji-denda/hitung/PJ-002'],
                ['jenis' => 'tugas', 'nama' => 'Uji try-catch (hari negatif, PJ-003)', 'url' => '/perpus/uji-denda/hitung/PJ-003'],
                ['jenis' => 'tugas', 'nama' => 'Uji debugging dd() (PJ-001)', 'url' => '/perpus/uji-denda/hitung/PJ-001?debug=1'],
                ['jenis' => 'tugas', 'nama' => 'Uji halaman 404 (kode PJ-999)', 'url' => '/perpus/uji-denda/hitung/PJ-999'],
            ],
        ],
        [
            'nomor' => 17,
            'judul' => 'Membuat Laporan pada Aplikasi Web',
            'items' => [
                ['jenis' => 'latihan', 'nama' => 'Laporan Kas Himpunan (halaman web, filter, cetak)', 'url' => '/laporan'],
                ['jenis' => 'latihan', 'nama' => 'Laporan Kas, filter Pemasukan', 'url' => '/laporan?kategori=Pemasukan'],
                ['jenis' => 'latihan', 'nama' => 'Laporan Kas, filter Pengeluaran', 'url' => '/laporan?kategori=Pengeluaran'],
                ['jenis' => 'latihan', 'nama' => 'Preview PDF Laporan Kas', 'url' => '/laporan/pdf?kategori=Semua&mode=stream'],
                ['jenis' => 'latihan', 'nama' => 'Download PDF Laporan Kas', 'url' => '/laporan/pdf?kategori=Semua&mode=download'],
                ['jenis' => 'latihan', 'nama' => 'Export Excel (CSV) Laporan Kas', 'url' => '/laporan/excel?kategori=Semua'],
                ['jenis' => 'tugas', 'nama' => 'E-Perpustakaan: Laporan Koleksi Buku (halaman web)', 'url' => '/perpus/laporan-buku'],
                ['jenis' => 'tugas', 'nama' => 'Laporan Buku, filter stok Menipis', 'url' => '/perpus/laporan-buku?status=Menipis'],
                ['jenis' => 'tugas', 'nama' => 'Laporan Buku, filter stok Habis', 'url' => '/perpus/laporan-buku?status=Habis'],
                ['jenis' => 'tugas', 'nama' => 'Preview PDF Laporan Buku', 'url' => '/perpus/laporan-buku/pdf?status=Semua&mode=stream'],
                ['jenis' => 'tugas', 'nama' => 'Download PDF Laporan Buku', 'url' => '/perpus/laporan-buku/pdf?status=Semua&mode=download'],
                ['jenis' => 'tugas', 'nama' => 'Export Excel (CSV) Laporan Buku', 'url' => '/perpus/laporan-buku/excel?status=Semua'],
            ],
        ],
    ],
];
