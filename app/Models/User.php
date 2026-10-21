<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar_path',
        'total_xp',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // --- RELASI ---

    // Kelas yang dibuat oleh Dosen
    public function courses()
    {
        return $this->hasMany(Course::class, 'lecturer_id');
    }

    // Kelas yang diikuti oleh Mahasiswa
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // Sertifikat milik Mahasiswa
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
    
    // Diskusi yang dibuat
    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }
}