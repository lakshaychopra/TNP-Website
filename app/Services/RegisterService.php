<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\RegisterRepository;
use App\Events\UserRegisterEvent;

class RegisterService
{	
	public function __construct(RegisterRepository $respository)
	{
		$this->respository = $respository;
    }
    
    public function RegisterMailWithInstructions(){
        event(new UserRegisterEvent($user));
    }
}
