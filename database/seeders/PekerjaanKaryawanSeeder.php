<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PekerjaanKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pekerjaan_karyawan')->insert([
            [
                'id_karyawan' => 1,
                'sbu' => 'SBU 1',
                'bagian' => 'Bagian A',
                'departemen' => 'Departemen X',
                'lokasi_kerja' => 'Lokasi 1',
                'tanggal_masuk' => Carbon::create('2022', '01', '10')->format('Y-m-d'),
                'status_karyawan' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_karyawan' => 2,
                'sbu' => 'SBU 2',
                'bagian' => 'Bagian B',
                'departemen' => 'Departemen Y',
                'lokasi_kerja' => 'Lokasi 2',
                'tanggal_masuk' => Carbon::create('2023', '03', '15')->format('Y-m-d'),
                'status_karyawan' => 'Aktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_karyawan' => 3,
                'sbu' => 'SBU 3',
                'bagian' => 'Bagian C',
                'departemen' => 'Departemen Z',
                'lokasi_kerja' => 'Lokasi 3',
                'tanggal_masuk' => Carbon::create('2020', '07', '20')->format('Y-m-d'),
                'status_karyawan' => 'Nonaktif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
