<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda Perpustakaan</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <nav style="background: #2c3e50; padding: 12px; border-radius: 5px;">
        <a href="{{ url('/perpustakaan') }}" style="color: white; margin-right: 15px; text-decoration: none;">Beranda</a>
        <a href="{{ url('/perpustakaan/koleksi') }}" style="color: white; text-decoration: none;">Koleksi Buku</a>
    </nav>

    <h1>Selamat Datang di {{ $nama_perpus }}</h1>
    <p>Alamat Gedung: {{ $alamat }}</p>
    <p>Silakan klik menu <b>Koleksi Buku</b> di atas untuk melihat daftar bacaan yang tersedia.</p>
</body>
</html>