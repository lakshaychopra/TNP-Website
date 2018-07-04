<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;
use \Carbon\Carbon;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class RegisterController extends Controller
{
    public function __construct(RegisterService $service)
    {
        $this->service = $service;
        
    }
    
    public function register(UserRegisterRequest $request)
    {
        $credentials = $request->only('username', 'email','phone_number');
        $password = $request->only('password');
        if (!$token = JWTAuth::attempt($credentials)) {
            return $this->respondUnauthorized();
        }
        
        try{
            DB::beginTransaction();
            
            $this->service->otpGenerated();
            
            $data = [
                'access_token' => $token,
                'authenticated' => true
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
}
