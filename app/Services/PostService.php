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
	
	public function uploadPostImage(array $payload)
	{
		$extension = $payload['image_path']->getClientOriginalExtension();
		$filename = 'tnpPost'.str_random().'.'.$extension;
		$image_path =  storage_path().config('.images.tpoPost.post_image_folder');
		$imageLocation = $payload['image_path']->move($image_path, $filename);
		return $filename;
	}
}
