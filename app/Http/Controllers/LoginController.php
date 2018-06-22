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
    
    public $successStatus = 200;
    
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
    
    public function loginUser(UserLoginRequest $request)
    {
        $credentials = $request->only('username', 'password');
        
        if (!Auth::attempt($credentials)) {
            return $this->respondUnauthorized();
        }
        
        $user = Auth::user();
        
        if (!$user->isActiveAndVerified()) {
            return $this->respondUnauthorized();
        }
        
        try{
            DB::beginTransaction();
            $this->service->otpGenerated();
            DB::commit();
            return $this->respondMessage('OTP Sent');
        }   
        catch(Exception $e)
        {
            DB::rollback();
            return $this->respondException($e);
        }   
    }  
    
    public function verifyTwoFactor(TwoFactorRequest $request)
    {
        $user = Auth::user();
        if(!$request->input('token_2fa') == $user->token_2fa)
        {    
            return $this->respondUnauthorized();
        }
        return response() //Json response with status 200 and token and user type
        ->json([  
            'response'=>'Authorized',
            'message' => 'You have been logged in',
            'id' => $user->id,
            'type' => $user->type,
        ],
        $this->successStatus);
    }
    
    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        Session::flush();
    }
    
}