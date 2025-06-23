<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectMemberSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('project_members')->insert([
            [
                'project_id' => 1,
                'user_id' => 2, // Mahasiswa A
                'role' => 'ketua',
            ],
            [
                'project_id' => 1,
                'user_id' => 3, // Mahasiswa B
                'role' => 'anggota',
            ]
        ]);
    }
}
