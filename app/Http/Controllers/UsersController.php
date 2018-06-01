<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Login request 
     *
     * @param Request $request
     * @return authentication and login view
     */
    public function postLogin(Request $request){
        $input = $request->only('username','password','usertype');
    }
}