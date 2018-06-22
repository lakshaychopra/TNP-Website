<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\LoginRepository;
use Auth;
use Carbon\Carbon;
use App\Events\TwoFactorEvent;
use JWTAuth;

class LoginService
{	
	public function __construct(LoginRepository $respository)
	{
		$this->respository = $respository;
    }
    
    public function otpGenerated(){
        $user = JWTAuth::user();
        $user->token_2fa_expiry = Carbon::now();
        $user->token_2fa = mt_rand(10000,99999);
        $user->save();
    }
}
