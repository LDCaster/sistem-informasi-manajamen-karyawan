<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KontakDaruratKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kontak_darurat_karyawan')->insert([
            [
                'id_karyawan' => 1,
                'nama_kontak_darurat' => 'Budi Santoso',
                'no_telepon_kontak_darurat' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 2,
                'nama_kontak_darurat' => 'Siti Aminah',
                'no_telepon_kontak_darurat' => '081298765432',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
