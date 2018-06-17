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
	
	public function uploadPostImage(array $payload)
	{
		if ($post->post_id) 
		{
			$filePrefix = config('tpoPost.post_image_prefix');
			$fileExtension = $payload['image_path']->getClientOriginalExtension();
			$fileName = $filePrefix.$payload['post_id'].$fileExtension;
			$filePath =  storage_path().config('tpoPost.post_image_folder');
			
			if($request->hasFile('image_path'))
			 {
				$image_path = $payload['image_path']->move($filePath, $fileName);
				return response() //Json response with status 200 and token and user type
				->json([
					'response'=>'Post Image Uploaded',
					$image_path,
				],200);
			}else
			{
				return response()->json(['error' => 'Image Upload Failed'], 401); //Json response with status 401 and error message
			}
		}else
		{
			return response()->json(['error' => 'Post Failed'], 401); //Json response with status 401 and error message
		}
		
	}
}
