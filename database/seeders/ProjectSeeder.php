<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'judul' => 'Sistem Informasi Akademik',
                'deskripsi' => 'Project kelompok mata kuliah Pemrograman Web.',
                'deadline' => now()->addDays(30),
                'kd_prodi' => '110',
                'kd_matakuliah' => 'IF101',
                'mahasiswa_nim' => '25110101',
            ]
        ]);
    }
}
