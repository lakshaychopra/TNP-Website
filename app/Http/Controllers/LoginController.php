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
use \Carbon\Carbon;

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
    
    public function loginUser(UserLoginRequest $request)
    {
        $credentials = $request->only('username', 'password');
        
        if (!Auth::attempt($credentials)) {
            return $this->respondUnauthorized();
        }
        
        $user = Auth::user();
        
        if (!$user->isActiveAndVerified()) {
            return $this->respondError();
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
        try{
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
            return respondSuccess('Authorized!! You have been logged-in!!', $data);
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
        return respondSuccess('Success!! You have been logged-out!!');

    }
    
}