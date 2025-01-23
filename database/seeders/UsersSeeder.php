<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id_karyawan' => 1, // ID Karyawan terkait
                'name' => 'John Doe',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'status' => 'active',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 2, // ID Karyawan terkait
                'name' => 'Jane Smith',
                'email' => 'hrd@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'hrd',
                'status' => 'active',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_karyawan' => 3, // ID Karyawan terkait
                'name' => 'Alex Brown',
                'email' => 'staff@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'staff',
                'status' => 'active',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
