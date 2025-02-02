<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PelatihanKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelatihan_karyawan')->insert([
            [
                'id_karyawan' => 1, // Sesuaikan dengan id yang ada di tabel karyawan
                'nama_pelatihan' => 'Pelatihan Manajemen Waktu',
                'tanggal_pelatihan' => Carbon::now()->subMonths(3),
                'file_pelatihan' => 'assets/file_pelatihan/1738326343_Tugas.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 2, // Sesuaikan dengan id yang ada di tabel karyawan
                'nama_pelatihan' => 'Pelatihan Kepemimpinan',
                'tanggal_pelatihan' => Carbon::now()->subMonths(6),
                'file_pelatihan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 3, // Sesuaikan dengan id yang ada di tabel karyawan
                'nama_pelatihan' => 'Pelatihan Komunikasi Efektif',
                'tanggal_pelatihan' => Carbon::now()->subYear(),
                'file_pelatihan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
