<?php

namespace App\Repositories;

use App\Models\User;
use Auth;

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
        $token->save();
    }
}