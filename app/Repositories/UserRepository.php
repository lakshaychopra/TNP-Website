<?php

namespace App\Repositories;

use App\Models\User;
use Auth;
use App\Events\TwoFactorEvent;

class UserRepository
{
    /**
     * create new instance
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;         
    }
    
    public function authenticated()
    {
        $token = Auth::user();
        $token->token_2fa_expiry = \Carbon\Carbon::now();
        $token->token_2fa = mt_rand(10000,99999);
        $token->save();
        event(new TwoFactorEvent($token));
        return response()->json(['Response' => 'Mail Sent'], 200);
    }

    public function login(array $data){
        
    
    }
}