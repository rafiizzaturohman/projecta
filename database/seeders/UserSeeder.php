<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'Admin Satu',
                'email' => 'admin@example.com',
                'password' => Hash::make('12341234'),
                'role' => 'admin',
                'prodi' => null,
                'nim' => null,
                'nidn' => null,
                'nip' => '0012234556',
            ],
            [
                'nama' => 'Dosen Satu',
                'email' => 'dosen@example.com',
                'password' => Hash::make('12341234'),
                'role' => 'dosen',
                'prodi' => null,
                'nim' => null,
                'nidn' => '0011223344',
                'nip' => null,
            ],
            [
                'nama' => 'Mahasiswa Satu',
                'email' => 'mhs@example.com',
                'password' => Hash::make('12341234'),
                'role' => 'mahasiswa',
                'prodi' => 'S1 - Teknik Informatika',
                'nim' => '24110153',
                'nidn' => null,
                'nip' => null,
            ],
        ]);
    }
}
