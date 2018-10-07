<?php

namespace App\Services;

use App\Models\PreviousEducation;
use App\Repositories\PreviousEducationRepository;

class PreviousEducationService
{	
	public function __construct(PreviousEducationRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function createPreviousEducation(array $payload)
	{
		return $this->repository->create($payload);
	}

}
