<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
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
        // $userType = $request->get('type');
        $data = $request->all();
        // return $inputs;
        
        if (Auth::attempt($inputs)) {
            // return request()->json($data,200);   
            return 1;
        } 
        
        // else {
        //     // return redirect()->back();
        //     return 0;
        // }
    }
}