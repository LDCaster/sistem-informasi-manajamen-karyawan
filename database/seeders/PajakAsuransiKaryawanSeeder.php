<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PajakAsuransiKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pajak_asuransi_karyawan')->insert([
            [
                'id_karyawan' => 1, // Sesuaikan dengan ID karyawan yang ada
                'no_npwp' => Str::random(20),
                'no_bpjs_kesehatan' => Str::random(20),
                'no_bpjs_tenagakerja' => Str::random(20),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 2,
                'no_npwp' => Str::random(20),
                'no_bpjs_kesehatan' => Str::random(20),
                'no_bpjs_tenagakerja' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 3,
                'no_npwp' => Str::random(20),
                'no_bpjs_kesehatan' => null,
                'no_bpjs_tenagakerja' => Str::random(20),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
