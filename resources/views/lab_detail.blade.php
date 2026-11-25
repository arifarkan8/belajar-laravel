<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laboratorium - {{ $lab['nama_lab'] }}</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; padding: 40px; }
        .card { max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        h2 { color: #ff2d20; margin-top: 0; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        .row { margin-bottom: 12px; line-height: 1.6; }
        .label { font-weight: bold; width: 150px; display: inline-block; color: #555; }
        .badge { padding: 5px 10px; border-radius: 12px; font-size: 12px; font-weight: bold; color: white; }
        .badge-tersedia { background-color: #27ae60; }
        .badge-maintenance { background-color: #e74c3c; }
        .btn-kembali { display: inline-block; margin-top: 20px; background: #2c3e50; color: white; padding: 8px 16px; text-decoration: none; border-radius: 5px; }
        .btn-kembali:hover { background: #1a252f; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Detail Laboratorium</h2>

        <div class="row"><span class="label">Kode Lab</span>: <b>{{ $lab['kode_lab'] }}</b></div>
        <div class="row"><span class="label">Nama Lab</span>: {{ $lab['nama_lab'] }}</div>
        <div class="row"><span class="label">Penanggung Jawab</span>: {{ $lab['penanggung_jawab'] }}</div>
        <div class="row"><span class="label">Kapasitas</span>: {{ $lab['kapasitas_pc'] }} unit PC</div>
        <div class="row">
            <span class="label">Status</span>:
            @if ($lab['status'] === 'Tersedia')
                <span class="badge badge-tersedia">Tersedia</span>
            @else
                <span class="badge badge-maintenance">Sedang Maintenance</span>
            @endif
        </div>
        <div class="row"><span class="label">Fasilitas</span>: {{ $lab['fasilitas'] }}</div>

        <a href="{{ url('/laboratorium') }}" class="btn-kembali">&laquo; Kembali ke Direktori Laboratorium</a>
    </div>
</body>
</html>