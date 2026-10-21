<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CourseSeeder::class,
            ModuleSeeder::class,
            QuizSeeder::class,
            DiscussionSeeder::class,
            CertificateSeeder::class,
            BadgeSeeder::class,
        ]);
    }
}