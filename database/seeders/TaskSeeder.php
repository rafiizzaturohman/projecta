<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'judul'=>'Instalasi project laravel',
                'deskripsi'=>'Menyiapklan project laravel agar siap digunakan',
                'deadline'=>now(),
                'project_id'=>1,
                'user_id'=>3
            ],
        ]);
    }
}
