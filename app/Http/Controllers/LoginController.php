<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\TwoFactorRequest;
use App\Services\LoginService;
use DB;
use \Carbon\Carbon;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class LoginController extends Controller
{
    
    public function __construct(LoginService $service)
    {
        $this->service = $service;
        
    }
    
    public function login(UserLoginRequest $request)
    {
        $credentials = $request->only('username', 'password');
        
        if (!$token = JWTAuth::attempt($credentials)) {
            return $this->respondUnauthorized();
        }
        
        $user = JWTAuth::user();
        
        if (!$user->isActiveAndVerified()) {
            return $this->respondError();
        }
        
        try{
            DB::beginTransaction();
            
            $this->service->otpGenerated();
            
            $data = [
                'access_token' => $token,
            ];
            
            DB::commit();
            
            return $this->respondSuccess('OTP Sent', $data);
        }   
        catch(JWTException $e)
        {
            DB::rollback();
            return $this->respondException($e);
        }   
    }  
    
    public function verifyTwoFactor(TwoFactorRequest $request)
    {
        $user = JWTAuth::user();
        
        if(!$request->input('token_2fa') == $user->token_2fa)
        {    
            return $this->respondUnauthorized();
        }
        
        try
        {
            DB::beginTransaction();
            
            $user->token_2fa_expiry = Carbon::now()->addMinutes(config('session.lifetime'));
            $user->save();
            
            DB::commit();
            
            $data=[
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'type' => $user->type,
            ];
            
            return $this->respondSuccess('Authorized!! You have been logged-in!!', $data);
        }   
        catch(JWTException $e)
        {
            DB::rollback();
            return $this->respondException($e);
        }
    }
    
    public function logout(Request $request) 
    {
        // Get JWT Token from the request header key "Authorization"
        $token = $request->header('Authorization');
        // Invalidate the token
        try {
            JWTAuth::invalidate($token);
            $this->respondSuccess('Success!! You have been logged-out!!');
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->respondException($e);
        }
    }

}