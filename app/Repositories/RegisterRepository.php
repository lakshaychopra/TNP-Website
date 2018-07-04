<?php

namespace App\Repositories;

use App\Models\User;

class RegisterRepository
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
}