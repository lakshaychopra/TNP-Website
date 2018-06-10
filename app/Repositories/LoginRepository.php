<?php

namespace App\Repositories;

use App\Models\User;

class LoginRepository
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

    public function login(array $data){
        
    
    }
}