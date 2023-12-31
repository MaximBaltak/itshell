<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $primaryKey = 'video_id';
    protected $fillable = ['video_id','title','video','img','name_folder','user_id'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
