<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\LoginRepository;
use Auth;
use App\Events\TwoFactorEvent;

class LoginService
{	
	public function __construct(LoginRepository $respository)
	{
		$this->respository = $respository;
    }
    
    public function authenticateUser(){
        $token = Auth::user();
        $token->token_2fa_expiry = \Carbon\Carbon::now();
        $token->token_2fa = mt_rand(10000,99999);
        $token->save();
        event(new TwoFactorEvent($token));
        return response()->json(['Response' => 'Mail Sent'], 200);
    }
}
