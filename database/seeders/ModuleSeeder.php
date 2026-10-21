<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    public function run(): void
    {
        $course = Course::where('slug', 'mekanika-klasik')->first();

        $modules = [
            ['title' => 'Pengantar Mekanika & Besaran', 'type' => 'materi', 'duration' => '15 mnt', 'xp_reward' => 20],
            ['title' => 'Kinematika Partikel', 'type' => 'materi', 'duration' => '20 mnt', 'xp_reward' => 20],
            ['title' => 'Kuis: Kinematika', 'type' => 'kuis', 'duration' => '10 mnt', 'xp_reward' => 120],
            ['title' => 'Hukum Newton & Dinamika', 'type' => 'materi', 'duration' => '25 mnt', 'xp_reward' => 20],
            ['title' => 'Kerja dan Energi', 'type' => 'materi', 'duration' => '18 mnt', 'xp_reward' => 20],
            ['title' => 'Dinamika Rotasi', 'type' => 'materi', 'duration' => '45 mnt', 'xp_reward' => 20],
            ['title' => 'Kuis: Dinamika Rotasi', 'type' => 'kuis', 'duration' => '15 mnt', 'xp_reward' => 120],
            ['title' => 'Ujian Akhir Komprehensif', 'type' => 'ujian', 'duration' => '60 mnt', 'xp_reward' => 500],
        ];

        foreach ($modules as $index => $modul) {
            Module::create([
                'course_id' => $course->id,
                'title' => $modul['title'],
                'type' => $modul['type'],
                'order' => $index + 1,
                'xp_reward' => $modul['xp_reward'],
                'duration' => $modul['duration'],
            ]);
        }
    }
}