<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Koleksi Buku E-Perpustakaan</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f6f9; padding: 30px; color: #333; }
        .container { max-width: 960px; margin: auto; background: white; padding: 25px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        h2 { margin-top: 0; color: #2c3e50; border-bottom: 3px solid #8e44ad; padding-bottom: 10px; }
        .toolbar { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; margin-bottom: 20px; background: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #e9ecef; }
        select { padding: 8px 12px; border-radius: 5px; border: 1px solid #ccc; }
        .btn { padding: 8px 14px; border-radius: 5px; text-decoration: none; color: white; font-size: 13px; font-weight: bold; border: none; cursor: pointer; display: inline-block; margin: 2px 0; white-space: nowrap; }
        .btn-filter { background: #34495e; }
        .btn-pdf { background: #e74c3c; }
        .btn-preview { background: #e67e22; }
        .btn-excel { background: #27ae60; }
        .btn-print { background: #8e44ad; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 11px 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #2c3e50; color: white; }
        .text-center { text-align: center; }
        .badge { padding: 4px 9px; border-radius: 10px; color: white; font-size: 12px; font-weight: bold; }
        .bg-tersedia { background: #27ae60; }
        .bg-menipis { background: #e67e22; }
        .bg-habis { background: #c0392b; }
        .summary-box { margin-top: 20px; padding: 15px; background: #f5eef8; border-left: 5px solid #8e44ad; border-radius: 5px; line-height: 1.8; }

        /* Aturan Khusus Saat Cetak Langsung (Print Browser) */
        @media print {
            .no-print { display: none !important; }
            body { background: white; padding: 0; }
            .container { box-shadow: none; max-width: 100%; padding: 0; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Laporan Koleksi Buku E-Perpustakaan (Status Stok: {{ $status_aktif }})</h2>

        <!-- Area Filter dan Tombol Export (Disembunyikan saat Print) -->
        <div class="toolbar no-print">
            <form method="GET" action="{{ url('/perpus/laporan-buku') }}">
                <label><b>Filter Status Stok:</b></label>
                <select name="status">
                    <option value="Semua" {{ $status_aktif == 'Semua' ? 'selected' : '' }}>Semua Buku</option>
                    <option value="Tersedia" {{ $status_aktif == 'Tersedia' ? 'selected' : '' }}>Tersedia (stok lebih dari 5)</option>
                    <option value="Menipis" {{ $status_aktif == 'Menipis' ? 'selected' : '' }}>Menipis (stok 1 sampai 5)</option>
                    <option value="Habis" {{ $status_aktif == 'Habis' ? 'selected' : '' }}>Habis (stok 0)</option>
                </select>
                <button type="submit" class="btn btn-filter">Terapkan Filter</button>
            </form>

            <div>
                <a href="{{ url('/perpus/laporan-buku/pdf?status=' . $status_aktif . '&mode=stream') }}" target="_blank" class="btn btn-preview">Preview PDF</a>
                <a href="{{ url('/perpus/laporan-buku/pdf?status=' . $status_aktif . '&mode=download') }}" class="btn btn-pdf">Download PDF</a>
                <a href="{{ url('/perpus/laporan-buku/excel?status=' . $status_aktif) }}" class="btn btn-excel">Export Excel (CSV)</a>
                <button onclick="window.print()" class="btn btn-print">Cetak Langsung</button>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th class="text-center">Stok</th>
                    <th>Status Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($buku as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><b>{{ $item['kode'] }}</b></td>
                        <td>{{ $item['judul'] }}</td>
                        <td>{{ $item['penulis'] }}</td>
                        <td class="text-center">{{ $item['stok'] }}</td>
                        <td>
                            <span class="badge bg-{{ strtolower($item['status']) }}">{{ $item['status'] }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data buku untuk filter ini. Tambahkan data lewat halaman Katalog Buku (/perpus/katalog-api).</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="summary-box">
            <b>Total Judul Buku:</b> {{ $rekap['total_judul'] }} judul <br>
            <b>Total Stok Buku:</b> {{ $rekap['total_stok'] }} eksemplar
        </div>
    </div>
</body>
</html>