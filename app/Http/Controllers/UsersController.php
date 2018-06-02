<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Auth,Log;
class UsersController extends Controller
{

    /**
    * Post Login request 
    *
    * @param Request $request
    * @return authentication and login view
    */
    public function postLogin(Request $request){
        $inputs = $request->only('username','password');
        
        if (!Auth::attempt($inputs)) {
            return redirect()->back();
        } 
        else {
            return '1';
        }
    }
}