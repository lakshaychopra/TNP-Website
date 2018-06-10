<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\LoginRepository;

class LoginService
{	
	public function __construct(LoginRepository $respository)
	{
		$this->respository = $respository;
    }
    
    public function authenticateUser(){
        return $this->repository->authenticated();
    }
}
