<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('prodis')->insert([
            ['kd_prodi' => '110', 'nama' => 'Informatika'],
            ['kd_prodi' => '111', 'nama' => 'Sistem Informasi'],
            ['kd_prodi' => '112', 'nama' => 'Manajemen Informatika'],
        ]);
    }
}

