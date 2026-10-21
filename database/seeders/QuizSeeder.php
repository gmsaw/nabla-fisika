<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil modul kuis pertama
        $moduleQuiz = Module::where('type', 'kuis')->first();

        if ($moduleQuiz) {
            $quiz = Quiz::create([
                'module_id' => $moduleQuiz->id,
                'title' => 'Kuis: Kinematika Partikel',
                'description' => 'Uji pemahaman Anda tentang gerak lurus dan kecepatan.',
                'rules' => "1. Kuis terdiri dari soal pilihan ganda.\n2. Waktu pengerjaan 10 menit.\n3. Nilai minimum kelulusan adalah 75.",
                'duration' => 10,
                'passing_grade' => 75,
            ]);

            // Soal 1
            Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => 'Sebuah mobil bergerak dengan kecepatan konstan 20 m/s. Berapa jarak yang ditempuh dalam waktu 10 detik?',
                'options' => json_encode([
                    'A' => '100 m',
                    'B' => '200 m',
                    'C' => '300 m',
                    'D' => '400 m',
                ]),
                'correct_option' => 'B',
            ]);

            // Soal 2
            Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => 'Perubahan kecepatan terhadap waktu disebut...',
                'options' => json_encode([
                    'A' => 'Perpindahan',
                    'B' => 'Jarak',
                    'C' => 'Percepatan',
                    'D' => 'Momentum',
                ]),
                'correct_option' => 'C',
            ]);
        }
    }
}