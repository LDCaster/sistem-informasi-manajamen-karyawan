<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(KaryawanSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PekerjaanKaryawanSeeder::class);
        $this->call(ResignasiKaryawanSeeder::class);
        $this->call(KontrakKerjaKaryawanSeeder::class);
        $this->call(PelatihanKaryawanSeeder::class);
        $this->call(PajakAsuransiKaryawanSeeder::class);
        $this->call(BankSimKaryawanSeeder::class);
        $this->call(MCUKaryawanSeeder::class);
        $this->call(CatatanPentingKaryawanSeeder::class);
        $this->call(KontakDaruratKaryawanSeeder::class);
    }
}
