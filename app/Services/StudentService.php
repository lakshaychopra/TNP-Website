<?php

namespace App\Services;

use App\Models\Student;
use App\Repositories\StudentRepository;

class StudentService
{	
	public function __construct(StudentRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function listStudent(){
		return $this->repository->list();
	}
	
	public function createStudent(array $payload)
	{
		return $this->repository->create($payload);
	}
	
	public function updateStudent(array $payload, $id)
	{
		return $this->repository->update($payload);
	}

	public function deleteStudent(array $payload, $id)
	{
		return $this->repository->delete($payload);
	}
}
