<?php

namespace App\Services;

use App\Models\HomePage;
use App\Repositories\HomePageRepository;

class HomePageService
{	
	public function __construct(HomePageRepository $repository)
	{
		$this->repository = $repository;
	}
	
}
