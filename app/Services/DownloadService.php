<?php

namespace App\Services;

use App\Models\Download;
use App\Repositories\DownloadRepository;
use File;

class DownloadService
{	
	public function __construct(DownloadRepository $repository)
	{
		$this->repository = $repository;
	}
	
	public function createDownload(array $payload)
	{
		return $this->repository->create($payload);
	}

	public function uploadDownloadImageService(array $payload)
	{
		return $this->repository->uploadDownloadImage($payload);
	}
	
	public function deleteDownloadImage(array $payload, Download $download)
	{
		if(Input::hasFile('image'))
		{
			$usersImage = public_path("images/posts/images/{$download->image}"); 
			if (File::exists($usersImage))
			{
				File::delete($usersImage);
			}
		}
	}
}
