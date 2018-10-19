<?php

namespace App\Services;

use App\Models\MetricsEducation;
use App\Repositories\MetricsEducationRepository;

class MetricsEducationService
{	
	public function __construct(MetricsEducationRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function createMetricsEducation(array $payload)
	{
		return $this->repository->create($payload);
	}
	
	public function updateMetricsEducation(array $payload, $id)
	{
		return $this->repository->update($payload);
	}

}
