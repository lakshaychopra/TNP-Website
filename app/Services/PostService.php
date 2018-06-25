<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use File;
use Input;

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
		$extension = $payload['image']->getClientOriginalExtension();
		$filename = 'post_'.str_random().'.'.$extension;
		$path =  public_path('images/posts/images/');
		$imageLocation = $payload['image']->move($path, $filename);
		// $image_path = $path.$filename;
		return $filename;
	}
	
	public function updatePostImage(array $payload)
	{
		$post=Post::find($id);
		if(Input::hasFile('image'))
		{
			$usersImage = public_path("images/posts/images/{$post->image}"); 
			if (File::exists($usersImage))
			{
				unlink($usersImage);
			}
			$extension = $payload['image']->getClientOriginalExtension();
			$filename = 'post_'.str_random().'.'.$extension;
			$path =  public_path('images/posts/images/');
			$imageLocation = $payload['image']->move($path, $filename);
			return $filename;
		}
	}
	
	public function deletePostImage(array $payload)
	{
		$post=Post::find($id);
		if(Input::hasFile('image'))
		{
			$usersImage = public_path("images/posts/images/{$post->image}"); 
			if (File::exists($usersImage))
			{
				unlink($usersImage);
			}
		}
	}
}
