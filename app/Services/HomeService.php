<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\HomeRepository;

class HomeService
{	
	public function __construct(HomeRepository $repository)
	{
		$this->repository = $repository;
	}
	
}
