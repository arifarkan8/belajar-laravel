<?php

use Illuminate\Support\Facades\Route;

// ---------- Praktik 1: Route Sederhana ----------
Route::get('/salam', function () {
    return "Selamat Pagi! Saya sedang belajar Framework Laravel.";
});

Route::get('/info-kampus', function () {
    return "<h1>Portal Akademik Kampus</h1><p>Selamat datang di sistem informasi terpadu.</p>";
});

// ---------- Praktik 2: Route dengan Parameter Wajib ----------
Route::get('/mahasiswa/{nama}', function ($nama) {
    return "Halo, ini adalah halaman profil mahasiswa bernama: <b>" . $nama . "</b>";
});

Route::get('/nilai/{matkul}/{skor}', function ($matkul, $skor) {
    return "Mata Kuliah: <b>" . $matkul . "</b> <br> Nilai Akhir: <b>" . $skor . "</b>";
});

// ---------- Praktik 3: Route dengan Parameter Opsional ----------
Route::get('/katalog/{kategori?}', function ($kategori = 'Semua Kategori Barang') {
    return "Menampilkan daftar produk untuk kategori: <b>" . $kategori . "</b>";
});

// ---------- Praktik 4: Membatasi Format Parameter Route ----------
Route::get('/cek-nim/{nim}', function ($nim) {
    return "NIM Mahasiswa valid: " . $nim;
})->where('nim', '[0-9]+');

// ---------- Praktik 5: Route + View + Kirim Data ----------
Route::get('/biodata', function () {
    return view('biodata', [
        'nim'      => '231011403233',
        'nama'     => 'Muhammad Arif Arkan',
        'prodi'    => 'Teknik Informatika',
        'semester' => 4
    ]);
});

// ---------- Praktik 6: Route Grouping (prefix) dan Fallback ----------
Route::prefix('admin')->group(function () {
    Route::get('/dosen', function () {
        return "Halaman Manajemen Data Dosen (Panel Admin)";
    });

    Route::get('/jadwal', function () {
        return "Halaman Pengaturan Jadwal Kuliah (Panel Admin)";
    });
});

Route::fallback(function () {
    return "<h2 style='color:red; text-align:center; margin-top:50px;'>
            Maaf, halaman yang Anda cari tidak ditemukan (404). <br>
            <a href='/'>Kembali ke Halaman Utama</a>
            </h2>";
});

// ---------- Mini Proyek: Portal Perpustakaan Kampus ----------
Route::prefix('perpustakaan')->group(function () {

    Route::get('/', function () {
        return view('perpus_beranda', [
            'nama_perpus' => 'Perpustakaan Digital Universitas',
            'alamat'      => 'Gedung Rektorat Lantai 2'
        ]);
    });

    Route::get('/koleksi', function () {
        return view('perpus_koleksi');
    });

    Route::get('/buku/{judul}', function ($judul) {

        $judul_rapi = str_replace('-', ' ', $judul);

        return "<h2>Detail Informasi Buku</h2>
                <p>Judul Buku yang Anda pilih: <b>" . $judul_rapi . "</b></p>
                <p>Status Ketersediaan: <span style='color:green;'>Tersedia di Rak A2</span></p>
                <a href='" . url('/perpustakaan/koleksi') . "'>&laquo; Kembali ke Koleksi Buku</a>";
    });

});

// ---------- Tugas: Prototipe Sistem Informasi Klinik Kesehatan Kampus ----------
Route::prefix('klinik')->group(function () {

    // 1. Halaman utama klinik
    Route::get('/', function () {
        return view('klinik_utama', [
            'nama_klinik'     => 'Klinik Kesehatan Kampus',
            'jam_operasional' => 'Senin sampai Jumat, 08.00 - 16.00 WIB',
            'kepala_klinik'   => 'dr. Andi Pratama'
        ]);
    });

    // 2. Daftar layanan
    Route::get('/layanan', function () {
        return view('klinik_layanan');
    });

    // 3. Detail layanan dinamis (parameter opsional)
    Route::get('/poli/{nama_poli?}', function ($nama_poli = 'Umum (Default)') {
        return "Anda sedang melihat jadwal dan layanan untuk: <b>Poli " . $nama_poli . "</b><br>
                <a href='" . url('/klinik/layanan') . "'>&laquo; Kembali ke Daftar Layanan</a>";
    });

    // 4. Nomor antrean pasien (parameter wajib, hanya angka)
    Route::get('/antrean/{nomor}', function ($nomor) {
        return "Nomor Antrean Anda adalah: <b>" . $nomor . "</b>. Silakan menunggu panggilan di ruang tunggu.<br>
                <a href='" . url('/klinik') . "'>&laquo; Kembali ke Halaman Klinik</a>";
    })->where('nomor', '[0-9]+');

    // 5. Kontak darurat
    Route::get('/kontak', function () {
        return view('klinik_kontak', [
            'telepon_ambulans' => '0800-123-4567',
            'email_klinik'     => 'klinik@kampus.ac.id'
        ]);
    });

});