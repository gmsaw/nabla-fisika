<?php
// FinalExam.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class FinalExam extends Model
{
    protected $fillable = ['course_id', 'title', 'description', 'rules', 'duration', 'passing_grade'];
    
    public function course() { return $this->belongsTo(Course::class); }
}