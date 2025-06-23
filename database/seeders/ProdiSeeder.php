<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodis')->insert([
            [
                "kd_prodi"=>"IFS",
                "nama"=>"S1 - Teknik Informatika",
            ],
            [
                "kd_prodi"=>"IFD",
                "nama"=>"D3 - Manajemen Informatika",
            ],
            [
                "kd_prodi"=>"KAD",
                "nama"=>"D3 - Komputerisasi Akuntansi",
            ],
        ]);
    }
}
