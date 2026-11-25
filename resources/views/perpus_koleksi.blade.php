<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Koleksi Buku</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <nav style="background: #2c3e50; padding: 12px; border-radius: 5px;">
        <a href="{{ url('/perpustakaan') }}" style="color: white; margin-right: 15px; text-decoration: none;">Beranda</a>
        <a href="{{ url('/perpustakaan/koleksi') }}" style="color: white; text-decoration: none;">Koleksi Buku</a>
    </nav>

    <h2>Daftar Koleksi Buku Populer</h2>
    <p>Klik pada judul buku untuk melihat halaman detail melalui Parameter Route:</p>
    <ul>
        <li><a href="{{ url('/perpustakaan/buku/Pemrograman-Laravel-Dasar') }}">Pemrograman Laravel Dasar</a></li>
        <li><a href="{{ url('/perpustakaan/buku/Rekayasa-Perangkat-Lunak') }}">Rekayasa Perangkat Lunak</a></li>
        <li><a href="{{ url('/perpustakaan/buku/Keamanan-Jaringan-Komputer') }}">Keamanan Jaringan Komputer</a></li>
    </ul>
</body>
</html>