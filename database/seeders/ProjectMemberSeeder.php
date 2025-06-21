<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('project_members')->insert([
            [
                'project_id'=>1,
                'user_id'=>3,
            ],
            [
                'project_id'=>1,
                'user_id'=>2,
            ]
        ]);
    }
}
