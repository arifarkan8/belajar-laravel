<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama Klinik</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <nav style="background: #2c3e50; padding: 12px; border-radius: 5px;">
        <a href="{{ url('/klinik') }}" style="color: white; margin-right: 15px; text-decoration: none;">Beranda</a>
        <a href="{{ url('/klinik/layanan') }}" style="color: white; margin-right: 15px; text-decoration: none;">Layanan</a>
        <a href="{{ url('/klinik/kontak') }}" style="color: white; text-decoration: none;">Kontak Darurat</a>
    </nav>

    <h1>{{ $nama_klinik }}</h1>
    <p>Jam Operasional: <b>{{ $jam_operasional }}</b></p>
    <p>Kepala Klinik: <b>{{ $kepala_klinik }}</b></p>
    <p>Silakan klik menu <b>Layanan</b> atau <b>Kontak Darurat</b> di atas untuk informasi selanjutnya.</p>
</body>
</html>