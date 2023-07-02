<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory;
    use HasApiTokens;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
      'name',
      'password',
      'email',
      'is_admin',
      'is_email_confirm'
    ];
    public function videos(){
        return $this->hasMany(Video::class)->cascadeDeletes();
    }
}
