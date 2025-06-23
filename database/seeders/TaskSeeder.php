<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'judul' => 'Desain Database',
                'deskripsi' => 'Membuat skema database awal.',
                'deadline' => now()->addDays(5),
                'project_id' => 1,
                'user_nim' => '25110101',
            ],
            [
                'judul' => 'Mockup UI',
                'deskripsi' => 'Desain antarmuka pengguna dasar.',
                'deadline' => now()->addDays(10),
                'project_id' => 1,
                'user_nim' => '25110102',
            ]
        ]);
    }
}
