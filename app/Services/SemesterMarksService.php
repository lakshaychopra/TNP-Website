<?php

namespace App\Services;

use App\Models\SemesterMarks;
use App\Repositories\SemesterMarksRepository;

class SemesterMarksService
{	
	public function __construct(SemesterMarksRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function createSemesterMarks(array $payload)
	{
		return $this->repository->create($payload);
	}
	
	public function updateSemesterMarks(array $payload, $id)
	{
		return $this->repository->update($payload);
	}

}
