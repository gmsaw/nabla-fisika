<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\User;
use App\Models\UserBadge;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    public function run(): void
    {
        $badge1 = Badge::create([
            'name' => 'Penguasa Mekanika',
            'description' => 'Menyelesaikan kelas Mekanika Klasik dengan nilai sempurna.',
            'icon' => 'mechanics-badge',
        ]);

        $badge2 = Badge::create([
            'name' => 'Kutu Buku',
            'description' => 'Menyelesaikan 10 modul materi tanpa melewatkan satu pun.',
            'icon' => 'book-badge',
        ]);

        // Berikan badge 1 ke Putu
        $mhs = User::where('email', 'mhs@nabla.com')->first();
        UserBadge::create([
            'user_id' => $mhs->id,
            'badge_id' => $badge1->id,
            'awarded_at' => now(),
        ]);
    }
}