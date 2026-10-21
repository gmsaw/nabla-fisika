<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'user_id',
        'parent_id',
        'title',
        'body',
        'is_solved',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Balasan dari thread ini
    public function replies()
    {
        return $this->hasMany(Discussion::class, 'parent_id');
    }

    // Thread induk (jika ini adalah balasan)
    public function parent()
    {
        return $this->belongsTo(Discussion::class, 'parent_id');
    }
}