<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MCUKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mcu_karyawan')->insert([
            [
                'id_karyawan' => 1, // Sesuaikan dengan ID karyawan yang ada
                'mcu_terakhir' => Carbon::now()->subMonths(6),
                'catatan_dokter' => 'Sehat, tidak ada keluhan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 2,
                'mcu_terakhir' => Carbon::now()->subMonths(12),
                'catatan_dokter' => 'Perlu pemeriksaan lebih lanjut untuk tekanan darah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 3,
                'mcu_terakhir' => Carbon::now()->subMonths(3),
                'catatan_dokter' => 'Memerlukan terapi untuk nyeri punggung.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
