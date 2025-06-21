<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'judul'=>'Projecta',
                'deskripsi'=>'Ini adalah sebuah aplikasi berbasis web yang dibuat untuk memudahkan mahasiswa ketika memanajemen tugas berkelompok',
                'deadline'=>now(),
                'matakuliah_id'=>1
            ],
        ]);
    }
}
