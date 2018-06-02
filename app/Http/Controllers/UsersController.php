<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class UsersController extends Controller
{
    /**
     * Login request 
     *
     * @param Request $request
     * @return authentication and login view
     */
    public function postLogin(Request $request){
        $inputs = $request->only('user_id','password');
        
        if(!Auth::attempt($inputs)) {
            return redirect()->back();
        }
        else {
            $user = Auth::user();
            $userType = $request->only('type');
            return view('{{user}}.dashboard',['user' => $user,'type' => $userType]);
        }
    }
}