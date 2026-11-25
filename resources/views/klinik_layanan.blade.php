<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Layanan Klinik</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <nav style="background: #2c3e50; padding: 12px; border-radius: 5px;">
        <a href="{{ url('/klinik') }}" style="color: white; margin-right: 15px; text-decoration: none;">Beranda</a>
        <a href="{{ url('/klinik/layanan') }}" style="color: white; margin-right: 15px; text-decoration: none;">Layanan</a>
        <a href="{{ url('/klinik/kontak') }}" style="color: white; text-decoration: none;">Kontak Darurat</a>
    </nav>

    <h2>Daftar Layanan Poli</h2>
    <p>Klik nama poli untuk melihat jadwal dan layanannya:</p>
    <ul>
        <li><a href="{{ url('/klinik/poli/Umum') }}">Poli Umum</a></li>
        <li><a href="{{ url('/klinik/poli/Gigi') }}">Poli Gigi</a></li>
        <li><a href="{{ url('/klinik/poli/Konseling%20Mahasiswa') }}">Poli Konseling Mahasiswa</a></li>
    </ul>
    <p>Contoh kartu antrean: <a href="{{ url('/klinik/antrean/12') }}">Nomor Antrean 12</a></p>
</body>
</html>