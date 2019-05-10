<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use  Notifiable;
    
    const USER_TYPE_STUDENT = 'STUDENT';
    const USER_TYPE_MEMBER = 'MEMBER';
    const USER_TYPE_ADMIN = 'ADMIN';

    /**
    * Table mentioned users
    *
    * @var string
    */
    protected $table = "users";
    
    protected $fillable = [
        'username','email','phone_number','type','password','sem_limit'
    ];
    
    protected $hidden =[
        'password','remember_token'
    ];

    public function isActiveAndVerified(){
        return $this->is_active && $this->is_verified;
    }

    protected $attributes = [
        'is_mailed'    => 1,
        'is_active'    => 1,
        'is_verified'  => 1,
        'sem_limit'    => 5
     ];
 
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

/**
     * get logged user profile
     * 
     * @return Object
     */
    // public function profile()
    // {        
    //     switch ($this->type) {
    //         case self::USER_TYPE_STUDENT:
    //             return $this->hasOne(Student::class);
    //             break;
    //         case self::USER_TYPE_ADMIN:
    //             return $this->hasOne(Admin::class);
    //             break;
    //         default:
    //             return $this->hasOne(Member::class);
    //             break;
    //     }
    // }

    // public function profile() {
    //     if($this->type == 'STUADMINDENT') {
    //         return $this->hasOne(Student::class, 'foriegn_key', id);
    //     }
    //     return $this->hasOne(Student::class, 'foriegn_key', id);
    // }
}
