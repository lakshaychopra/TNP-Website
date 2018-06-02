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
    
    public function getLogin(){
        return view('');
    } 
    
    public function postLogin(Request $request){
        $inputs = $request->only('user_id','password');
        $userType = $request->get('type');
        
        if (Auth::attempt($inputs)) {
            $user = Auth::user();
            
            if ($userType == 'STUDENT') {
                return view('student.index');
            }
            elseif ($userType == 'EXECUTIVE_MEMBER') {
                return view('user.index');
            }          
        } 
        
        else {
            return redirect()->back();
        }
    }
}