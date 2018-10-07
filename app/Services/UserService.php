<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{	
	public function __construct(UserRepository $repository)
	{
		$this->repository = $repository;
	}

	public function createUser(array $payload)
	{
		return $this->repository->create($payload);
	}
	
	public function updateUser(array $payload, $id)
	{
		return $this->repository->update($payload);
	}
}
