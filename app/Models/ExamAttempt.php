<?php
// ExamAttempt.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ExamAttempt extends Model
{
    protected $fillable = ['user_id', 'final_exam_id', 'score', 'is_passed', 'started_at', 'finished_at'];
    
    public function user() { return $this->belongsTo(User::class); }
    public function finalExam() { return $this->belongsTo(FinalExam::class); }
}