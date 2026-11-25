<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dokumen Laporan Koleksi Buku</title>
    <style>
        body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; color: #222; }
        .kop-surat { text-align: center; border-bottom: 3px double #000; padding-bottom: 10px; margin-bottom: 20px; }
        .kop-surat h2 { margin: 0; font-size: 18px; text-transform: uppercase; }
        .kop-surat h4 { margin: 4px 0; font-size: 13px; font-weight: normal; }
        .kop-surat p { margin: 2px 0; font-size: 10px; color: #555; }
        .meta-info { width: 100%; margin-bottom: 15px; }
        .meta-info td { padding: 3px 0; border: none; }
        .data-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .data-table th, .data-table td { border: 1px solid #333; padding: 8px; text-align: left; }
        .data-table th { background-color: #5b2c6f; color: #ffffff; text-align: center; }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .total-row { background-color: #f2f2f2; font-weight: bold; }
        .ttd-table { width: 100%; margin-top: 40px; }
        .ttd-table td { border: none; text-align: center; width: 50%; vertical-align: top; }
        .ruang-ttd { height: 65px; }
    </style>
</head>
<body>

    <!-- KOP SURAT DOKUMEN -->
    <div class="kop-surat">
        <h2>Portal E-Perpustakaan Kampus</h2>
        <h4>Laporan Koleksi dan Stok Buku</h4>
        <p>Dokumen dihasilkan otomatis oleh Sistem E-Perpustakaan</p>
    </div>

    <!-- INFORMASI LAPORAN -->
    <table class="meta-info">
        <tr>
            <td style="width: 20%;"><b>Filter Status</b></td>
            <td style="width: 30%;">: {{ $status_aktif }}</td>
            <td style="width: 20%;"><b>Tanggal Cetak</b></td>
            <td style="width: 30%;">: {{ $tanggal_cetak }}</td>
        </tr>
        <tr>
            <td><b>Jumlah Data</b></td>
            <td>: {{ count($buku) }} Judul</td>
            <td><b>Status Dokumen</b></td>
            <td>: Resmi (Otomatis dari Sistem)</td>
        </tr>
    </table>

    <!-- TABEL DATA UTAMA -->
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 6%;">No</th>
                <th style="width: 14%;">Kode</th>
                <th style="width: 34%;">Judul Buku</th>
                <th style="width: 22%;">Penulis</th>
                <th style="width: 8%;">Stok</th>
                <th style="width: 16%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($buku as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $item['kode'] }}</td>
                    <td>{{ $item['judul'] }}</td>
                    <td>{{ $item['penulis'] }}</td>
                    <td class="text-center">{{ $item['stok'] }}</td>
                    <td class="text-center">{{ $item['status'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data buku untuk filter ini.</td>
                </tr>
            @endforelse

            <tr class="total-row">
                <td colspan="4" class="text-right">Total Judul Buku</td>
                <td colspan="2" class="text-center">{{ $rekap['total_judul'] }} judul</td>
            </tr>
            <tr class="total-row" style="background-color: #e8daef;">
                <td colspan="4" class="text-right">TOTAL STOK BUKU</td>
                <td colspan="2" class="text-center">{{ $rekap['total_stok'] }} eksemplar</td>
            </tr>
        </tbody>
    </table>

    <!-- BLOK TANDA TANGAN PENGESAHAN -->
    <table class="ttd-table">
        <tr>
            <td>
                Mengetahui,<br>
                <b>Kepala Perpustakaan</b>
                <div class="ruang-ttd"></div>
                <u><b>( ........................................ )</b></u>
            </td>
            <td>
                Dicetak pada, {{ $tanggal_cetak }}<br>
                <b>Pustakawan Penanggung Jawab</b>
                <div class="ruang-ttd"></div>
                <u><b>( ........................................ )</b></u>
            </td>
        </tr>
    </table>

</body>
</html>