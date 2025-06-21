<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matakuliahs')->insert([
            [
                'kd_matakuliah'=>'IF101',
                'nama'=>'Pemrograman Web II',
                'semester'=>2,
                'sks'=>3,
                'dosen_id'=>2,
            ],
        ]);
    }
}
