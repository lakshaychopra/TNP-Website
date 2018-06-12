<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostService
{	
	public function __construct(PostRepository $respository)
	{
		$this->respository = $respository;
    }
	
	public function listPost(){
		return $this->repository->list();
	}

	public function createPost(array $payload)
	{
		return $this->repository->create($payload);
	}

	public function updatePost(array $payload, $id)
	{
		return $this->repository->update($payload);
	}
}
