<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\LoginRepository;
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
        $user->token_2fa = mt_rand(10000,99999);
        $user->save();
        event(new TwoFactorEvent($user));
    }
}
