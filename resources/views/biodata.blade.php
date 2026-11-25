<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; padding: 40px; }
        .card { background: white; max-width: 500px; margin: auto; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2 { color: #ff2d20; margin-top: 0; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        p { line-height: 1.6; color: #333; }
        .label { font-weight: bold; width: 130px; display: inline-block; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Kartu Biodata Mahasiswa</h2>
        <p><span class="label">NIM</span>: {{ $nim }}</p>
        <p><span class="label">Nama Lengkap</span>: {{ $nama }}</p>
        <p><span class="label">Program Studi</span>: {{ $prodi }}</p>
        <p><span class="label">Semester</span>: {{ $semester }}</p>
    </div>
</body>
</html>