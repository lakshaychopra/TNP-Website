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
	
	public function deletePost(array $payload, $id)
	{
		return $this->repository->delete($payload);
	}

	public function uploadPostImage(array $payload)
	{
		$extension = $payload['image_path']->getClientOriginalExtension();
		$filename = 'tnpPost'.str_random().'.'.$extension;
		$path =  public_path('images/posts/images/');
		$imageLocation = $payload['image_path']->move($path, $filename);
		// $image_path = $path.$filename;
		return $filename;
	}
}
