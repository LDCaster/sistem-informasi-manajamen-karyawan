<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ResignasiKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('resignasi_karyawan')->insert([
            [
                'id_karyawan' => 1, // Sesuaikan dengan id_karyawan yang ada di tabel karyawan
                'tanggal_keluar' => Carbon::now()->subDays(10),
                'keterangan_keluar' => 'Mengundurkan diri karena alasan pribadi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_karyawan' => 2,
                'tanggal_keluar' => Carbon::now()->subDays(20),
                'keterangan_keluar' => 'Pindah ke perusahaan lain.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
