<?php

namespace App\Services;

use App\Models\Aggregate;
use App\Repositories\AggregateRepository;

class AggregateService
{	
	public function __construct(AggregateRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function createAggregate(array $payload)
	{
		return $this->repository->create($payload);
	}
	
	public function updateAggregate(array $payload, $id)
	{
		return $this->repository->update($payload);
	}

}
