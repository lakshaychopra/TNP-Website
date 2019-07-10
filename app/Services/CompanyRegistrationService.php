<?php

namespace App\Services;

use App\Models\CompanyRegistration;
use App\Repositories\CompanyRegistrationRepository;

class PostService
{	
	public function __construct(CompanyRegistrationRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function createRegistration(array $payload)
	{
		return $this->repository->create($payload);
	}

}
