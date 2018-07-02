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
        
        return $this->respondSuccess('Authorized!! You have been logged-in!!', $user);
    }   
    
    public function logout() 
    {
        try {
            $token = JWTAuth::getToken();
            
            if ($token) {
                JWTAuth::invalidate($token);
            }
        } catch (JWTException $e) {
            return $this->respondException($e);
        }
        $this->respondSuccess('Success!! You have been logged-out!!');
    }
    
    
    public function check()
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            return $this->respondException($e);
        }
        return $this->respondSuccess(['authenticated' => true]);
    }
    
    public function getAuthUser(){
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            return response()->json(['authenticated' => false],422);
        }
        
        $user = JWTAuth::parseToken()->authenticate();
        $profile = $user->Profile;
        $social_auth = ($user->password) ? 0 : 1;
        
        return response()->json(compact('user','profile','social_auth'));
    }
    
    
}