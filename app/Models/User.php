<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * Table mentioned users
     *
     * @var string
     */
    protected $table = "users";
    public $successStatus = 200;
    public static function createLoginRule()
    {
        // validate the info, create rules for the inputs
        return [
            'username' => 'required|min:3', // make sure the username
            'password' => 'required|min:3', // password has to be greater than 3 characters
        ];
    }

    public static function postLoginMessages()
    {
        return [
            // 'email.required' => trans( 'flash.validation.required',  ['attribute' => 'email'] ),
        ];
    }
}
