<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{	
	public function __construct(UserRepository $respository)
	{
		$this->respository = $respository;
	}
	
	public function listUser(){
		return $this->repository->list();
	}
	
	public function createUser(array $payload)
	{
		return $this->repository->create($payload);
	}
	
	public function updateUser(array $payload, $id)
	{
		return $this->repository->update($payload);
	}

	public function deleteUser(array $payload, $id)
	{
		return $this->repository->delete($payload);
	}
}
