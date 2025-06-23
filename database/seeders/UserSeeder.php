<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            // Dosen
            [
                'nama' => 'Dosen Satu',
                'email' => 'dosen@if.ac.id',
                'password' => Hash::make('password'),
                'nim' => null,
                'nidn' => '9876543210',
                'nip' => null,
                'kd_prodi' => null,
                'role' => 'dosen',
                'email_verified_at' => now(),
                'created_at' => now(),
            ],
            // Mahasiswa A
            [
                'nama' => 'Mahasiswa A',
                'email' => 'mahasiswaa@if.ac.id',
                'password' => Hash::make('password'),
                'nim' => '25110101',
                'nidn' => null,
                'nip' => null,
                'kd_prodi' => '110',
                'role' => 'mahasiswa',
                'email_verified_at' => now(),
                'created_at' => now(),
            ],
            // Mahasiswa B
            [
                'nama' => 'Mahasiswa B',
                'email' => 'mahasiswab@if.ac.id',
                'password' => Hash::make('password'),
                'nim' => '25110102',
                'nidn' => null,
                'nip' => null,
                'kd_prodi' => '110',
                'role' => 'mahasiswa',
                'email_verified_at' => now(),
                'created_at' => now(),
            ],
            // Admin
            [
                'nama' => 'Admin Sistem',
                'email' => 'admin@if.ac.id',
                'password' => Hash::make('admin123'),
                'nim' => null,
                'nidn' => null,
                'nip' => '2482746238273482',
                'kd_prodi' => null,
                'role' => 'admin',
                'email_verified_at' => now(),
                'created_at' => now(),
            ],
        ]);
    }
}
