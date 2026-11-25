<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Denda - {{ $kode }}</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f6f9; padding: 40px; }
        .card { max-width: 550px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        h2 { margin-top: 0; color: #2c3e50; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        .alert-error { background: #f8d7da; color: #721c24; border-left: 5px solid #dc3545; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .alert-sukses { background: #e8daef; color: #4a235a; border-left: 5px solid #8e44ad; padding: 15px; border-radius: 5px; margin-top: 15px; }
        .btn { display: inline-block; margin-top: 20px; padding: 8px 16px; background: #2c3e50; color: white; text-decoration: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Hasil Perhitungan Denda Keterlambatan</h2>

        @if ($pesan_error)
            <div class="alert-error">
                <b>Peringatan Sistem (Tertangkap Blok Try-Catch):</b><br>
                {{ $pesan_error }}
            </div>
        @endif

        <p><b>Kode Peminjaman:</b> {{ $kode }}</p>
        <p><b>Peminjam:</b> {{ $pinjam['peminjam'] }}</p>
        <p><b>Judul Buku:</b> {{ $pinjam['judul_buku'] }}</p>
        <p><b>Hari Terlambat:</b> {{ $pinjam['hari_terlambat'] }} hari</p>

        @if (!$pesan_error)
            <div class="alert-sukses">
                <b>Total Denda: Rp {{ $denda }}</b>
            </div>
        @endif

        <a href="{{ url('/perpus/uji-denda') }}" class="btn">&laquo; Kembali ke Panel Uji Denda</a>
    </div>
</body>
</html>