<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@nabla.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // 2. Dosen (Lecturer)
        User::create([
            'name' => 'Dr. Wayan Sudira',
            'email' => 'dosen@nabla.com',
            'password' => Hash::make('password'),
            'role' => 'lecturer',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Prof. Made Wirawan',
            'email' => 'dosen2@nabla.com',
            'password' => Hash::make('password'),
            'role' => 'lecturer',
            'email_verified_at' => now(),
        ]);

        // 3. Mahasiswa (Student)
        User::create([
            'name' => 'Putu Mahasiswa',
            'email' => 'mhs@nabla.com',
            'password' => Hash::make('password'),
            'role' => 'student',
            'total_xp' => 1250,
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Angga Pratama',
            'email' => 'angga@nabla.com',
            'password' => Hash::make('password'),
            'role' => 'student',
            'total_xp' => 800,
            'email_verified_at' => now(),
        ]);
        
        User::create([
            'name' => 'Made Wirawan',
            'email' => 'made@nabla.com',
            'password' => Hash::make('password'),
            'role' => 'student',
            'total_xp' => 450,
            'email_verified_at' => now(),
        ]);
    }
}