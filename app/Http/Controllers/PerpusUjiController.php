<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PerpusUjiController extends Controller
{
    private $data_peminjaman = [
        'PJ-001' => [
            'peminjam' => 'Muhammad Arif Arkan',
            'judul_buku' => 'Pemrograman Web dengan Laravel',
            'hari_terlambat' => 3,
            'tarif_per_hari' => 1000
        ],
        'PJ-002' => [
            'peminjam' => 'Anggota Contoh',
            'judul_buku' => 'Basis Data Dasar',
            'hari_terlambat' => 0,
            'tarif_per_hari' => 1000
        ],
        'PJ-003' => [
            'peminjam' => 'Anggota Uji Error',
            'judul_buku' => 'Jaringan Komputer',
            'hari_terlambat' => -2,
            'tarif_per_hari' => 1000
        ]
    ];

    public function index()
    {
        return view('perpus_uji_index', [
            'peminjaman' => $this->data_peminjaman
        ]);
    }

    public function hitungDenda(Request $request, $kode)
    {
        if (!isset($this->data_peminjaman[$kode])) {
            Log::warning("Percobaan akses kode peminjaman tidak terdaftar: " . $kode);
            abort(404, "Data peminjaman dengan kode {$kode} tidak ditemukan di sistem E-Perpustakaan.");
        }

        $pinjam = $this->data_peminjaman[$kode];

        if ($request->query('debug') == '1') {
            dd([
                'INFO_DEBUG' => 'Memeriksa isi data peminjaman sebelum denda dihitung',
                'kode' => $kode,
                'data_peminjaman' => $pinjam
            ]);
        }

        try {
            if ($pinjam['hari_terlambat'] < 0) {
                throw new \Exception("Jumlah hari keterlambatan tidak boleh bernilai negatif ({$pinjam['hari_terlambat']} hari). Periksa kembali data tanggal pengembalian.");
            }

            $denda = $pinjam['hari_terlambat'] * $pinjam['tarif_per_hari'];

            Log::info("Berhasil menghitung denda untuk kode: {$kode}", ['denda' => $denda]);

            return view('perpus_uji_hasil', [
                'kode' => $kode,
                'pinjam' => $pinjam,
                'denda' => number_format($denda, 0, ',', '.'),
                'pesan_error' => null
            ]);
        } catch (\Throwable $e) {
            Log::error("Error Perhitungan Denda pada kode {$kode}: " . $e->getMessage());

            return view('perpus_uji_hasil', [
                'kode' => $kode,
                'pinjam' => $pinjam,
                'denda' => '0',
                'pesan_error' => $e->getMessage()
            ]);
        }
    }
}