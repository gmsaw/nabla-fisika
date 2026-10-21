<?php
// XpLog.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class XpLog extends Model
{
    protected $fillable = ['user_id', 'source', 'amount'];
    
    public function user() { return $this->belongsTo(User::class); }
}