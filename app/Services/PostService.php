<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use File;

class PostService
{	
	public function __construct(PostRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function createPost(array $payload)
	{
		return $this->repository->create($payload);
	}

	public function uploadPostImageService(array $payload)
	{
		return $this->repository->uploadPostImage($payload);
	}
	
	public function deletePostImage(array $payload, Post $post)
	{
		if(Input::hasFile('image'))
		{
			$usersImage = public_path("images/posts/images/{$post->image}"); 
			if (File::exists($usersImage))
			{
				File::delete($usersImage);
			}
		}
	}
}
