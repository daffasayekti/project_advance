<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;

use Jenssegers\Mongodb\Eloquent\Model;

class User extends Model implements JWTSubject
{
    protected $connection = "mongodb";
    protected $collection = "users";
    protected $fillable   = ['name', 'email', 'password'];

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
}
