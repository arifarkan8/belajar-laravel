<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProyekMandiriTest extends TestCase
{
    // Skenario 1: Uji Normal (Positive Test)
    public function test_halaman_utama_panel_uji_denda_dapat_diakses(): void
    {
        $response = $this->get('/perpus/uji-denda');

        $response->assertStatus(200);
        $response->assertSee('Panel Uji Denda E-Perpustakaan');
        $response->assertSee('Pemrograman Web dengan Laravel');
    }

    public function test_perhitungan_denda_normal_akurat(): void
    {
        $response = $this->get('/perpus/uji-denda/hitung/PJ-001');

        $response->assertStatus(200);
        $response->assertSee('Rp 3.000');
    }

    // Skenario 2: Uji Penanganan Error (Exception Test)
    public function test_error_handling_saat_hari_terlambat_negatif(): void
    {
        $response = $this->get('/perpus/uji-denda/hitung/PJ-003');

        $response->assertStatus(200);
        $response->assertSee('tidak boleh bernilai negatif');
    }

    // Skenario 3: Uji Data Tidak Ditemukan (Negative Test)
    public function test_kode_peminjaman_tidak_terdaftar_menampilkan_error_404(): void
    {
        $response = $this->get('/perpus/uji-denda/hitung/PJ-999');

        $response->assertStatus(404);
    }
}