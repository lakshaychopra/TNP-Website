<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Auth;

class PostService
{	
	public function __construct(PostRepository $respository)
	{
		$this->respository = $respository;
    }
	
	public function createPost(array $payload)
	{
		return $this->repository->create($payload);
	}
}
