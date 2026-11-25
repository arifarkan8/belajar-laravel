<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panel Uji Denda E-Perpustakaan</title>
    <sty>
    body { font-family: 'Segoe UI', sans-serif; background: #f4f6f9; padding: 30px; }
    .container { max-width: 1000px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
    h2 { color: #2c3e50; margin-top: 0; border-bottom: 2px solid #8e44ad; padding-bottom: 10px; }
    table { width: 100%; border-collapse: collapse; margin-top: 15px; }
    th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
    th { background: #2c3e50; color: white; }
    td:first-child { white-space: nowrap; }
    .btn { display: inline-block; padding: 6px 12px; background: #8e44ad; color: white; text-decoration: none; border-radius: 4px; font-size: 13px; margin: 2px 5px 2px 0; white-space: nowrap; }
    .btn-debug { background: #e67e22; }
</sty>
</head>
<body>
    <div class="container">
        <h2>Panel Uji Denda E-Perpustakaan</h2>
        <p>Pilih data peminjaman untuk menguji perhitungan denda keterlambatan:</p>

        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Hari Terlambat</th>
                    <th>Aksi Uji Coba</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $kode => $item)
                    <tr>
                        <td><b>{{ $kode }}</b></td>
                        <td>{{ $item['peminjam'] }}</td>
                        <td>{{ $item['judul_buku'] }}</td>
                        <td>{{ $item['hari_terlambat'] }} hari</td>
                        <td>
                            <a href="{{ url('/perpus/uji-denda/hitung/' . $kode) }}" class="btn">Hitung Denda</a>
                            <a href="{{ url('/perpus/uji-denda/hitung/' . $kode . '?debug=1') }}" class="btn btn-debug">Debug dd()</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p style="margin-top: 20px; font-size: 14px;">
            <b>Uji Error 404:</b> <a href="{{ url('/perpus/uji-denda/hitung/PJ-999') }}">Klik di sini untuk menguji kode peminjaman yang tidak terdaftar (PJ-999)</a>
        </p>
    </div>
</body>
</html>