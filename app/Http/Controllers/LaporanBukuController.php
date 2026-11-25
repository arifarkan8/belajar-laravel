<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanBukuController extends Controller
{
    private $daftar_status = ['Semua', 'Tersedia', 'Menipis', 'Habis'];

    // Menentukan label status berdasarkan jumlah stok
    private function labelStatus($stok)
    {
        if ($stok == 0) {
            return 'Habis';
        }

        return ($stok <= 5) ? 'Menipis' : 'Tersedia';
    }

    // Mengambil data buku dari database, lalu menyaring berdasarkan status stok
    private function ambilDataBuku($status = 'Semua')
    {
        $semua_data = Buku::orderBy('kode_buku')->get()->map(function ($buku) {
            return [
                'kode' => $buku->kode_buku,
                'judul' => $buku->judul_buku,
                'penulis' => $buku->penulis,
                'stok' => $buku->stok,
                'status' => $this->labelStatus($buku->stok)
            ];
        })->all();

        if ($status !== 'Semua') {
            return array_values(array_filter($semua_data, function ($item) use ($status) {
                return $item['status'] === $status;
            }));
        }

        return $semua_data;
    }

    // Menghitung rekap total judul dan total stok
    private function hitungRekap($buku)
    {
        $total_stok = 0;

        foreach ($buku as $item) {
            $total_stok += $item['stok'];
        }

        return [
            'total_judul' => count($buku),
            'total_stok' => $total_stok
        ];
    }

    // Mengamankan nilai filter dari URL agar hanya salah satu status yang valid
    private function ambilStatusAktif(Request $request)
    {
        $status = $request->query('status', 'Semua');

        return in_array($status, $this->daftar_status) ? $status : 'Semua';
    }

    // 1. Halaman laporan di web (/perpus/laporan-buku)
    public function index(Request $request)
    {
        $status = $this->ambilStatusAktif($request);
        $buku = $this->ambilDataBuku($status);

        return view('laporan_buku_index', [
            'buku' => $buku,
            'status_aktif' => $status,
            'rekap' => $this->hitungRekap($buku)
        ]);
    }

    // 2. Export PDF (/perpus/laporan-buku/pdf)
    public function exportPdf(Request $request)
    {
        $status = $this->ambilStatusAktif($request);
        $mode = $request->query('mode', 'download');

        $buku = $this->ambilDataBuku($status);

        $pdf = Pdf::loadView('laporan_buku_pdf', [
            'buku' => $buku,
            'status_aktif' => $status,
            'rekap' => $this->hitungRekap($buku),
            'tanggal_cetak' => Carbon::now()->locale('id')->translatedFormat('d F Y')
        ])->setPaper('a4', 'portrait');

        $nama_file = 'Laporan-Koleksi-Buku-' . $status . '-' . date('Ymd') . '.pdf';

        if ($mode === 'stream') {
            return $pdf->stream($nama_file);
        }

        return $pdf->download($nama_file);
    }

    // 3. Export Excel / CSV (/perpus/laporan-buku/excel)
    public function exportExcel(Request $request)
    {
        $status = $this->ambilStatusAktif($request);
        $buku = $this->ambilDataBuku($status);
        $rekap = $this->hitungRekap($buku);

        $nama_file = 'Laporan-Koleksi-Buku-' . $status . '-' . date('Ymd') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"$nama_file\"",
        ];

        return response()->streamDownload(function () use ($buku, $rekap) {
            $handle = fopen('php://output', 'w');

            // UTF-8 BOM agar terbaca bersih di Microsoft Excel
            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, ['No', 'Kode Buku', 'Judul Buku', 'Penulis', 'Stok', 'Status Stok'], ';');

            $no = 1;
            foreach ($buku as $row) {
                fputcsv($handle, [
                    $no++,
                    $row['kode'],
                    $row['judul'],
                    $row['penulis'],
                    $row['stok'],
                    $row['status']
                ], ';');
            }

            fputcsv($handle, [], ';');
            fputcsv($handle, ['', '', '', 'TOTAL JUDUL BUKU', '', $rekap['total_judul']], ';');
            fputcsv($handle, ['', '', '', 'TOTAL STOK', '', $rekap['total_stok']], ';');

            fclose($handle);
        }, $nama_file, $headers);
    }
}