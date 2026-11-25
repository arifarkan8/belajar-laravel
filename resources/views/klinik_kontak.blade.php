<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak Darurat Klinik</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">
    <nav style="background: #2c3e50; padding: 12px; border-radius: 5px;">
        <a href="{{ url('/klinik') }}" style="color: white; margin-right: 15px; text-decoration: none;">Beranda</a>
        <a href="{{ url('/klinik/layanan') }}" style="color: white; margin-right: 15px; text-decoration: none;">Layanan</a>
        <a href="{{ url('/klinik/kontak') }}" style="color: white; text-decoration: none;">Kontak Darurat</a>
    </nav>

    <h2>Kontak Darurat</h2>
    <p>Telepon Ambulans Kampus: <b>{{ $telepon_ambulans }}</b></p>
    <p>Email Klinik: <b>{{ $email_klinik }}</b></p>
    <a href="{{ url('/klinik') }}" style="display: inline-block; background: #2c3e50; color: white; padding: 10px 16px; border-radius: 5px; text-decoration: none;">&laquo; Kembali ke Halaman Klinik</a>
</body>
</html>