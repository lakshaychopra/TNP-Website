<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Validator;

class PassportController extends Controller
{
    public $successStatus = 200;
    /**
    * Post Login request
    * @param Request $request
    * @return authentication and login view
    */
    public function login()
    {
        //log the user in
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_verified == 1 && Auth::user()->is_active == 1) {
                $user = Auth::user();
                $success['token'] = $user->createToken('GNDEC')->accessToken;
                return response()->json(['success'=>$success], $this->successStatus);
            }
            else {
                return response()->json(['error' => 'Unauthorized'], 401);
            }        
        }
        else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }        
    }
}