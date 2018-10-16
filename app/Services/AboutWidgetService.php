<?php

namespace App\Services;

use App\Models\AboutWidget;
use App\Repositories\AboutWidgetRepository;
use File;

class AboutWidgetService
{	
	public function __construct(AboutWidgetRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function createAbout(array $payload)
	{
		return $this->repository->create($payload);
	}

	public function uploadAboutImageService(array $payload)
	{
		return $this->repository->uploadAboutImage($payload);
	}
	
	public function deleteAboutImage(array $payload, AboutWidget $about)
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