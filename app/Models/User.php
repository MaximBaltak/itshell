<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['name','email','password','is_admin'];
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    //remaining abstract methods
    public function getRememberToken(){}

    public function setRememberToken($value){}

    public function getRememberTokenName(){}
}
