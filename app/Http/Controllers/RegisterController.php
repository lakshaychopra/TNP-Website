<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\SetPasswordRequest;
use DB;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Services\RegisterService;

class RegisterController extends Controller
{
    public function __construct(RegisterService $service)
    {
        $this->service = $service;
        
    }
    
    public function register(UserRegisterRequest $request)
    {
        $credentials = $request->only('username', 'email','phone_number');
        if (!$token = JWTAuth::attempt($credentials)) {
            return $this->respondUnauthorized();
        }
        try{
            $data = [
                'access_token' => $token,
                'authenticated' => true
            ];
            return $this->respondSuccess('User Verified', $data);
        }   
        catch(JWTException $e)
        {
            DB::rollback();
            return $this->respondException($e);
        }   
    }  
    
    public function setsPassword(SetPasswordRequest $request){
        $auth = JWTAuth::parseToken()->authenticate();
        $password = $request->only('password');
        $user = JWTAuth::user();
        try{
            DB::beginTransaction();
            $user->password = bcrypt(request('new_password'));
            $user->save();
            DB::commit();
            return $this->respondSuccess('Congrats!! Your password has been set successfully!', $user);
        }
        catch(JWTException $e)
        {
            DB::rollback();
            return $this->respondException($e);
        }   
        
        
    }
    
}
