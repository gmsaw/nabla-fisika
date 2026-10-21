<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecturer_id',
        'title',
        'slug',
        'category',
        'level',
        'description',
        'banner_path',
        'status',
    ];

    // --- RELASI ---

    // Dosen pembuat kelas
    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    // Modul di dalam kelas (diurutkan berdasarkan 'order')
    public function modules()
    {
        return $this->hasMany(Module::class)->orderBy('order', 'asc');
    }

    // Mahasiswa yang mendaftar di kelas ini
    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments')->withTimestamps();
    }

    // Sertifikat dari kelas ini
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}