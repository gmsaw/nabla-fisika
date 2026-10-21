<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'type',
        'order',
        'xp_reward',
        'duration',
    ];

    // --- RELASI ---

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // Materi (Teks, YouTube, PDF)
    public function contents()
    {
        return $this->hasMany(Content::class)->orderBy('order', 'asc');
    }

    // Jika tipe modul adalah 'kuis'
    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    // Progress mahasiswa di modul ini
    public function progress()
    {
        return $this->hasMany(Progress::class);
    }
}