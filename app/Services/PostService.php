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
	
	// public function uploadPostImage(array $payload)
	// {
	// 	if ($imageURL) 
	// 	{
	// 		$exploded = explode(',',$request->image_path);
	// 		$decoded = base64_decode($explode[1]);
	// 		if(str_contain($explode[0],'jpeg')){
	// 			$extention = 'jpg';
	// 		}else
	// 		{
	// 			$extention = 'png';
	// 		}
	// 		$fileName = 'tpoPost'.str_random().$extension;
	// 		$path =  storage_path().'/images/tpoPost/post_image_folder/'.$fileName;
			
	// 		// file_put_contents($path, $decoded);
	// 		$image_path = $payload['image_path']->move($path, $decoded);
	// 		return $image_path;
	// 	}else
	// 	{
	// 		return response()->json(['error' => 'Image Upload Failed'], 401); //Json response with status 401 and error message
	// 	}
		
	// }
}
