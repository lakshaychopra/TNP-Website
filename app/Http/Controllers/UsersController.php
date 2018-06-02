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
        $inputs = array(
        'username' => 'ABCD',
        'password' => '123456'
    );
        // $userType = $request->get('type');
        $data = $request->all();
    
        // return $inputs;
        // Log::debug((Auth::attempt($data)));
        if (Auth::attempt($inputs)) {
            // return redirect()->back();

            //  dd($inputs);
        } 
        
        else {
            return view('dashboard');  
            // return dd($data);
            // return 0;
        }
    }
}