<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AboutRepository;
use Carbon\Carbon;
use JWTAuth;

class AboutService
{	
	public function __construct( $respository)
	{
		$this->respository = $respository;
	}
	
	public function createAbout(array $payload)
	{
		return $this->repository->create($payload);
	}

	public function uploadAboutImageService(array $payload)
	{
		return $this->repository->uploadAboutImage($payload);
	}
	
	public function deleteAboutImage(array $payload, About $about)
	{
		if(Input::hasFile('image'))
		{
			$usersImage = public_path("images/about/images/{$about->image}"); 
			if (File::exists($usersImage))
			{
				File::delete($usersImage);
			}
		}
	}
}