<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratorium;

class LaboratoriumController extends Controller
{
    // Halaman utama direktori laboratorium (/laboratorium)
    public function index()
    {
        // 1. Meminta seluruh data dari Model
        $labs = Laboratorium::ambilSemuaLab();

        // 2. Menghitung total unit PC keseluruhan
        $total_pc = 0;
        foreach ($labs as $lab) {
            $total_pc += $lab['kapasitas_pc'];
        }

        // 3. Mengirim data ke View 'lab_index'
        return view('lab_index', [
            'judul_halaman' => 'Direktori & Inventaris Laboratorium Komputer',
            'data_lab'      => $labs,
            'total_pc'      => $total_pc,
            'filter_aktif'  => 'Semua'
        ]);
    }

    // Halaman detail satu laboratorium (/laboratorium/detail/{kode})
    public function detail($kode)
    {
        // 1. Meminta Model mencari data berdasarkan kode dari URL
        $lab_pilihan = Laboratorium::cariKodeLab($kode);

        // 2. Jika tidak ditemukan, tampilkan halaman 404
        if (!$lab_pilihan) {
            abort(404, 'Data Laboratorium dengan kode tersebut tidak ditemukan.');
        }

        // 3. Kirim data ke View 'lab_detail'
        return view('lab_detail', [
            'lab' => $lab_pilihan
        ]);
    }

    // Halaman filter berdasarkan status (/laboratorium/status/{status?})
    public function statusLab($status = 'Tersedia')
    {
        // 1. Meminta Model memfilter data berdasarkan status dari URL
        $labs = Laboratorium::filterBerdasarkanStatus($status);

        // 2. Menghitung total unit PC dari hasil filter
        $total_pc = 0;
        foreach ($labs as $lab) {
            $total_pc += $lab['kapasitas_pc'];
        }

        // 3. Kembali ke View 'lab_index'
        return view('lab_index', [
            'judul_halaman' => 'Direktori & Inventaris Laboratorium Komputer',
            'data_lab'      => $labs,
            'total_pc'      => $total_pc,
            'filter_aktif'  => $status
        ]);
    }
}