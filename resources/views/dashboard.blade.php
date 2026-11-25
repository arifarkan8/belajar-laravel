<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Tugas Laravel</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; margin: 0; padding: 24px; color: #222; }
        h1 { margin-bottom: 4px; }
        .sub { color: #666; margin-bottom: 24px; }
        section { background: #fff; border-radius: 8px; padding: 16px 20px; margin-bottom: 20px; box-shadow: 0 1px 4px rgba(0,0,0,.08); }
        h2 { margin-top: 0; font-size: 18px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 8px 10px; border-bottom: 1px solid #e5e7eb; vertical-align: top; }
        th { background: #f0f2f5; font-size: 13px; }
        .badge { display: inline-block; padding: 2px 8px; border-radius: 10px; font-size: 12px; }
        .latihan { background: #e0f2fe; color: #075985; }
        .tugas { background: #fee2e2; color: #991b1b; }
        a { color: #1d4ed8; text-decoration: none; }
        a:hover { text-decoration: underline; }
        small { color: #888; display: block; }
    </style>
</head>
<body>
    <h1>Dashboard Tugas Laravel</h1>
    <div class="sub">Muhammad Arif Arkan | 231011403233 | 07TPLP013</div>

    @foreach (config('tugas.pertemuan') as $p)
        <section>
            <h2>Pertemuan {{ $p['nomor'] }}: {{ $p['judul'] }}</h2>
            <table>
                <thead>
                    <tr>
                        <th style="width:110px">Pertemuan ke</th>
                        <th style="width:240px">Bentuk Tugas</th>
                        <th>Nama File / Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($p['items'] as $item)
                        <tr>
                            <td>{{ $p['nomor'] }}</td>
                            <td>
                                @if ($item['jenis'] === 'tugas')
                                    <span class="badge tugas">Tugas (halaman akhir PDF)</span>
                                @else
                                    <span class="badge latihan">Contoh soal / latihan</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url($item['url']) }}" target="_blank">{{ $item['nama'] }}</a>
                                <small>{{ $item['url'] }}</small>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    @endforeach
</body>
</html>