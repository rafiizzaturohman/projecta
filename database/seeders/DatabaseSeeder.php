<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProdiSeeder::class,
            UserSeeder::class,
            MatakuliahSeeder::class,
            ProjectSeeder::class,
            ProjectMemberSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
