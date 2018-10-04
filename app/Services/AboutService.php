<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AboutRepository;
use Carbon\Carbon;
use JWTAuth;

class AboutService
{	
	public function __construct( $respository)
	{
		$this->respository = $respository;
    }
}