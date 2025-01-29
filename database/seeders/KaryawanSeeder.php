<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('karyawan')->insert([
            [
                'nik' => '123456789012345678',
                'nip' => '1234567890',
                'nama' => 'Budi Santoso',
                'alamat_rumah' => 'Jl. Melati No. 12, Jakarta',
                'no_telepon' => '081234567890',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'jenis_kelamin' => 'L',
                'pendidikan' => 'S1 Teknik Informatika',
                'status_perkawinan' => 'Kawin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '987654321098765432',
                'nip' => '9876543210',
                'nama' => 'Ani Setiawati',
                'alamat_rumah' => 'Jl. Mawar No. 34, Bandung',
                'no_telepon' => '081987654321',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1995-05-05',
                'jenis_kelamin' => 'P',
                'pendidikan' => 'S2 Manajemen',
                'status_perkawinan' => 'Belum Kawin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nik' => '456789012345678901',
                'nip' => '4567890123',
                'nama' => 'Siti Nurhaliza',
                'alamat_rumah' => 'Jl. Anggrek No. 45, Surabaya',
                'no_telepon' => '081345678912',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1988-08-08',
                'jenis_kelamin' => 'P',
                'pendidikan' => 'D3 Akuntansi',
                'status_perkawinan' => 'Belum Kawin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
