<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nidn' => '1234567890',
                'name' => 'Admin User',
                'role' => '0', // 0 for admin
                'status' => 'active',
                'email' => 'admin@example.com',
                'phone' => '082119072382',
                'alamat' => 'Admin Address',
                'tanggal_lahir' => '1980-01-01',
                'jabatan' => 'Sekretaris',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'), // password should be hashed
                // 'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nidn' => '0987654321',
                'name' => 'Pegawai User',
                'role' => '1', // 1 for pegawai
                'status' => 'active',
                'email' => 'pegawai@example.com',
                'jabatan' => 'Dosen',
                'phone' => '085150009700',
                'alamat' => 'Pegawai Address',
                'tanggal_lahir' => '1990-01-01',
                'email_verified_at' => now(),
                'password' => Hash::make('pegawai123'), // password should be hashed
                // 'remember_token' => \Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
