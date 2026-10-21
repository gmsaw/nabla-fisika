<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        $course = Course::where('slug', 'mekanika-klasik')->first();
        $mhs = User::where('email', 'mhs@nabla.com')->first();

        Certificate::create([
            'user_id' => $mhs->id,
            'course_id' => $course->id,
            'unique_id' => 'NBL-A7K2M',
            'score' => 92,
            'issued_at' => now(),
        ]);
    }
}