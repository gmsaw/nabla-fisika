<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $dosen1 = User::where('email', 'dosen@nabla.com')->first();
        $dosen2 = User::where('email', 'dosen2@nabla.com')->first();

        $courses = [
            [
                'lecturer_id' => $dosen1->id,
                'title' => 'Mekanika Klasik',
                'category' => 'Fisika Inti',
                'level' => 'Dasar',
                'description' => 'Hukum Newton, kinematika, dinamika, dan energi — fondasi wajib semua cabang fisika.',
                'status' => 'published',
            ],
            [
                'lecturer_id' => $dosen1->id,
                'title' => 'Fisika Kuantum Lanjut',
                'category' => 'Fisika Inti',
                'level' => 'Lanjut',
                'description' => 'Persamaan Schrödinger, momentum sudut, dan teori perturbasi untuk sistem kuantum.',
                'status' => 'pending',
            ],
            [
                'lecturer_id' => $dosen2->id,
                'title' => 'Elektromagnetisme',
                'category' => 'Fisika Inti',
                'level' => 'Menengah',
                'description' => 'Medan listrik, medan magnet, induksi Faraday, dan persamaan Maxwell.',
                'status' => 'published',
            ],
            [
                'lecturer_id' => $dosen2->id,
                'title' => 'Fisika Komputasi',
                'category' => 'Fisika Komputasi',
                'level' => 'Lanjut',
                'description' => 'Metode numerik, simulasi sistem fisika, dan visualisasi data dengan Python.',
                'status' => 'draft',
            ],
        ];

        foreach ($courses as $course) {
            $course['slug'] = Str::slug($course['title']);
            Course::create($course);
        }
    }
}