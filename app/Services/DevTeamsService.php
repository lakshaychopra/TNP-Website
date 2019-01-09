<?php

namespace App\Services;

use App\Models\DevTeam;
use App\Repositories\DevTeamsRepository;
use File;

class DevTeamsService
{
	public function __construct(DevTeamsRepository $repository)
	{
		$this->repository = $repository;
	}

	public function createDevTeam(array $payload)
	{
		return $this->repository->create($payload);
	}

	public function uploadDevTeamImageService(array $payload)
	{
		return $this->repository->uploadDevTeamImage($payload);
	}

	public function deleteDevTeamImage(array $payload, DevTeam $devTeam)
	{
		if(Input::hasFile('image'))
		{
			$usersImage = public_path('images/dev_team/images/{$devTeam->image}');
			if (File::exists($usersImage))
			{
				File::delete($usersImage);
			}
		}
	}
}
