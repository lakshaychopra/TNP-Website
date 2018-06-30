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
	
	public function listPost(){
		return $this->repository->list();
	}
	
	public function createPost(array $payload)
	{
		return $this->repository->create($payload);
	}
	
	public function updatePost(array $payload, $id)
	{
		return $this->repository->update($payload, $id);
	}
	
	public function deletePost(Post $post)
	{
		return $this->repository->delete($post);
	}
	
	public function uploadPostImageService(array $payload)
	{
		return $this->repository->uploadPostImage($payload);
	}
	
	public function updatePostImage(array $payload,Post $post)
	{
		Post::find($post);
		if(Post::hasFile('image'))
		{
			$usersImage = public_path("images/posts/images/{$post->image}"); 
			if (File::exists($usersImage))
			{
				File::delete($usersImage);
			}
			$extension = $payload['image']->getClientOriginalExtension();
			$filename = 'post_'.str_random().'.'.$extension;
			$path =  public_path('images/posts/images/');
			$imageLocation = $payload['image']->move($path, $filename);
			return $filename;
		}
	}
	
	public function deletePostImage(array $payload, $id)
	{
		$post=Post::find($id);
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
