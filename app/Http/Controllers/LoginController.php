<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use Exception;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\TwoFactorRequest;
use App\Services\LoginService;
use DB;

class LoginController extends Controller
{
    public function __construct(LoginService $service)
    {
        $this->service = $service;
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
    }
    
    /**
    * @param  App\Http\Requests\UserLoginRequest  $request
    * @return \Illuminate\Http\Response JSON
    */
    public function loginUser(UserLoginRequest $request)
    {
        $credentials = $request->only('username', 'password');
        
        if (!Auth::attempt($credentials)) {
            return $this->respondUnauthorized();
        }
        
        $user = Auth::user();
        
        if (!$user->is_verified && $user->is_active) {
            return $this->respondUnauthorized();
        }
        
        try{
            DB::beginTransaction();
            $this->service->otpGenerated();
            DB::commit();
            return 
            $this->respondMessage('OTP Sent');
        }   
        catch(Exception $e)
        {
            DB::rollback();
            return $this->respondException($e);
        }   
    }
    
    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        Session::flush();
    }
    
    public function verifyTwoFactor(TwoFactorRequest $request)
    {
        if(!$request->input('token_2fa') == Auth::user()->token_2fa)
        {    
            return $this->respondUnauthorized();
        }
        $user = Auth::user();
        return response() //Json response with status 200 and token and user type
        ->json([  
            'response'=>'Authorized',
            'message' => 'You have been logged in',
            'id' => $user->id,
            'type' => $user->type,
        ],
        $this->successStatus);
    }
}