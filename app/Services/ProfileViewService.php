<?php

namespace App\Services;

use App\Models\Student;
use App\Repositories\ProfileViewRepository;

class ProfileViewService
{	
	public function __construct(ProfileViewRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function createStudent(array $payload)
	{
		return $this->repository->create($payload);
	}
	
	public function updateStudent(array $payload, $id)
	{
		return $this->repository->update($payload);
	}

}
