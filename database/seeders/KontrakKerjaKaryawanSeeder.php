<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class KontrakKerjaKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kontrak_kerja_karyawan')->insert([
            [
                'id_karyawan' => 1, // Sesuaikan dengan id yang ada di tabel karyawan
                'jenis_kontrak' => 'PKWT',
                'status_kontrak_lanjutan' => 1,
                'tanggal_awal_kontrak_lanjutan' => Carbon::now()->subYear(),
                'tanggal_akhir_kontrak_lanjutan' => Carbon::now()->addYear(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 2, // Sesuaikan dengan id yang ada di tabel karyawan
                'jenis_kontrak' => 'PKWTT',
                'status_kontrak_lanjutan' => 0,
                'tanggal_awal_kontrak_lanjutan' => Carbon::now()->subYears(2),
                'tanggal_akhir_kontrak_lanjutan' => Carbon::now()->addYears(2),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 3, // Sesuaikan dengan id yang ada di tabel karyawan
                'jenis_kontrak' => 'PKWT/PKWTT',
                'status_kontrak_lanjutan' => 1,
                'tanggal_awal_kontrak_lanjutan' => Carbon::now()->subMonths(6),
                'tanggal_akhir_kontrak_lanjutan' => Carbon::now()->addMonths(6),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
