<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostService
{	
	public function __construct(PostRepository $repository)
	{
		$this->repository = $repository;
	}
	
}
