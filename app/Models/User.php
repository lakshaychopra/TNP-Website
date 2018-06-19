<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'username','name','email','phone_number','type','password'
    ];
}
