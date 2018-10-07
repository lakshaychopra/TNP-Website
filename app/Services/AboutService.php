<?php

namespace App\Services;

use App\Models\About;
use App\Repositories\AboutRepository;
use File;

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
			$aboutImage = public_path("images/about/images/{$about->image}"); 
			if (File::exists($aboutImage))
			{
				File::delete($aboutImage);
			}
		}
	}
}