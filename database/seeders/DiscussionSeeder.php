<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Discussion;
use App\Models\User;
use Illuminate\Database\Seeder;

class DiscussionSeeder extends Seeder
{
    public function run(): void
    {
        $course = Course::where('slug', 'mekanika-klasik')->first();
        $mhs = User::where('email', 'mhs@nabla.com')->first();
        $dosen = User::where('email', 'dosen@nabla.com')->first();

        // Thread Utama
        $thread = Discussion::create([
            'course_id' => $course->id,
            'user_id' => $mhs->id,
            'title' => 'Bingung perbedaan Torsi dan Momen Inersia?',
            'body' => 'Halo teman-teman, saya masih bingung membedakan kapan harus pakai Torsi dan kapan pakai Momen Inersia. Ada yang bisa jelasin dengan analogi sederhana?',
            'is_solved' => true,
        ]);

        // Balasan Dosen
        Discussion::create([
            'course_id' => $course->id,
            'user_id' => $dosen->id,
            'parent_id' => $thread->id,
            'body' => 'Halo Putu, analogi sederhananya begini: Torsi itu seperti "gaya dorong" saat kamu membuka pintu. Sedangkan Momen Inersia adalah "seberapa berat" pintu itu untuk didorong (tergantung massanya).',
        ]);
    }
}