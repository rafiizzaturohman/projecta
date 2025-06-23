<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('matakuliahs')->insert([
            [
                'kd_matakuliah' => 'IF101',
                'nama' => 'Pemrograman Web',
                'semester' => 4,
                'sks' => 3,
                'dosen_nidn' => '9876543210',
            ]
        ]);
    }
}

