<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth,Log,Session;

class UsersController extends Controller
{
    
    /**
    * Post Login request 
    *
    * @param Request $request
    * @return authentication and login view
    */
    public function store(Request $request){
        //log the user in
        $credentials = $request->only('username','password');
        /**
        * Attempting Authentication 
        * Else Redirect Back
        */
        if (Auth::attempt($credentials)) {
            /**
            * Switch Case for USER Type 
            */
            switch ($user = Auth::user()->type) {
                case 'MASTER_ADMIN':
                return "1";
                break;
                case 'EXECUTIVE_MEMBER':
                return "2";
                break;
                case 'STUDENT':
                return "3";
                break;
                case 'COMPANY':
                return "4";
                break;       
                default:
                return redirect()->back();
                break;
            }
        } 
        else {
            return redirect()->back();
        }

        session()->flash('msg','You have been logged in');
        return redirect('/auth/login');
    }
}