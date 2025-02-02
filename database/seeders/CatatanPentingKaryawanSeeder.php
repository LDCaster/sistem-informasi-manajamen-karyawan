<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CatatanPentingKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('catatan_penting_karyawan')->insert([
            [
                'id_karyawan' => 1, // Sesuaikan dengan ID karyawan yang ada
                'tanggal_catatan' => Carbon::now()->subDays(30),
                'kasus_catatan' => 'Terlambat datang kerja lebih dari 3 kali dalam sebulan.',
                'keterangan_catatan' => 'Diberikan peringatan tertulis.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 2,
                'tanggal_catatan' => Carbon::now()->subDays(60),
                'kasus_catatan' => 'Meninggalkan pekerjaan tanpa izin.',
                'keterangan_catatan' => 'Diberikan sanksi pemotongan gaji.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 3,
                'tanggal_catatan' => Carbon::now()->subDays(15),
                'kasus_catatan' => 'Kinerja sangat baik dalam proyek besar.',
                'keterangan_catatan' => 'Diberikan penghargaan dan bonus.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
