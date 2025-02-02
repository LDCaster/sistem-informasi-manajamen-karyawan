<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BankSimKaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bank_sim_karyawan')->insert([
            [
                'id_karyawan' => 1, // Sesuaikan dengan ID karyawan yang ada
                'no_rekening_bank' => Str::random(20),
                'nama_bank' => 'Bank Mandiri',
                'no_sim' => Str::random(20),
                'sim_expired' => Carbon::now()->addYears(5),
                'no_simper' => Str::random(20),
                'simper_expired' => Carbon::now()->addYears(3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 2,
                'no_rekening_bank' => Str::random(20),
                'nama_bank' => 'Bank BRI',
                'no_sim' => Str::random(20),
                'sim_expired' => Carbon::now()->addYears(4),
                'no_simper' => null,
                'simper_expired' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 3,
                'no_rekening_bank' => null,
                'nama_bank' => null,
                'no_sim' => Str::random(20),
                'sim_expired' => Carbon::now()->addYears(2),
                'no_simper' => Str::random(20),
                'simper_expired' => Carbon::now()->addYears(1),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
