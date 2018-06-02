<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
class UsersController extends Controller
{
    
    public function getLogin(){
        return view('');
    } 
    
    /**
    * Post Login request 
    *
    * @param Request $request
    * @return authentication and login view
    */
    public function postLogin(Request $request){
        $inputs = $request->only('user_id','password');
        $userType = $request->get('type');
        
        if (Auth::attempt($inputs)) {
            return ('$userType');   
        } 
        
        else {
            return redirect()->back();
        }
    }
}