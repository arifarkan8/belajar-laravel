<?php

namespace App\Models;

class Laboratorium
{
    // Data sumber laboratorium disimpan di dalam Model
    private static $daftar_lab = [
        [
            'kode_lab' => 'LAB-01',
            'nama_lab' => 'Lab Pemrograman Dasar',
            'penanggung_jawab' => 'Septa, S.Kom., M.Kom.',
            'kapasitas_pc' => 40,
            'status' => 'Tersedia',
            'fasilitas' => 'AC, Proyektor, Wi-Fi, Visual Studio Code'
        ],
        [
            'kode_lab' => 'LAB-02',
            'nama_lab' => 'Lab Jaringan Komputer',
            'penanggung_jawab' => 'Rina Wijaya, S.Kom., M.T.',
            'kapasitas_pc' => 30,
            'status' => 'Tersedia',
            'fasilitas' => 'Router, Switch, Kabel UTP, Cisco Packet Tracer'
        ],
        [
            'kode_lab' => 'LAB-03',
            'nama_lab' => 'Lab Multimedia',
            'penanggung_jawab' => 'Dr. Budi Santoso, M.Kom.',
            'kapasitas_pc' => 25,
            'status' => 'Sedang Maintenance',
            'fasilitas' => 'PC Spesifikasi Tinggi, Tablet Grafis, Software Desain'
        ],
        [
            'kode_lab' => 'LAB-04',
            'nama_lab' => 'Lab Basis Data',
            'penanggung_jawab' => 'Septa, S.Kom., M.Kom.',
            'kapasitas_pc' => 35,
            'status' => 'Tersedia',
            'fasilitas' => 'Server MySQL, Proyektor, AC'
        ],
        [
            'kode_lab' => 'LAB-05',
            'nama_lab' => 'Lab Rekayasa Perangkat Lunak',
            'penanggung_jawab' => 'Rina Wijaya, S.Kom., M.T.',
            'kapasitas_pc' => 30,
            'status' => 'Sedang Maintenance',
            'fasilitas' => 'PC, Whiteboard, Wi-Fi'
        ]
    ];

    // Method 1: Mengambil seluruh data laboratorium
    public static function ambilSemuaLab()
    {
        return self::$daftar_lab;
    }

    // Method 2: Mencari satu laboratorium berdasarkan kode (misal: LAB-01)
    public static function cariKodeLab($kode)
    {
        foreach (self::$daftar_lab as $lab) {
            // strtoupper agar pencarian tidak peka huruf besar/kecil
            if (strtoupper($lab['kode_lab']) === strtoupper($kode)) {
                return $lab;
            }
        }
        return null;
    }

    // Method 3: Mengambil daftar laboratorium berdasarkan status
    public static function filterBerdasarkanStatus($status)
    {
        $hasil = [];
        foreach (self::$daftar_lab as $lab) {
            // stripos: tidak peka huruf besar/kecil, dan 'Maintenance' tetap cocok
            // dengan status 'Sedang Maintenance'
            if (stripos($lab['status'], $status) !== false) {
                $hasil[] = $lab;
            }
        }
        return $hasil;
    }
}