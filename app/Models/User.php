<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable
{
    use  Notifiable;
    
    /**
    * Table mentioned users
    *
    * @var string
    */
    protected $table = "users";
    
    protected $fillable = [
        'username','email','phone_number','type','password'
    ];
    
    protected $hidden =[
        'password','remember_token'
    ];

    public function isActiveAndVerified(){
        return $this->is_active && $this->is_verified;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
