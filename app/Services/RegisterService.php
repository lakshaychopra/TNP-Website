<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\RegisterRepository;

class RegisterService
{	
	public function __construct(RegisterRepository $respository)
	{
		$this->respository = $respository;
    }
}
