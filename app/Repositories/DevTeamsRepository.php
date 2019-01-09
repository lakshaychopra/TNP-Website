<?php

namespace App\Repositories;

use App\Models\DevTeam;

class DevTeamsRepository
{
  /**
  * create new instance
  *
  * @param DevTeam $model
  */
  public function __construct(DevTeam $model)
  {
    $this->model = $model;
  }

  public function list($limit = false)
  {
    $builder = DevTeam::orderBy('created_at', 'desc');
    if(!$limit) {
      return $builder->get();
    }
    return $builder->paginate($limit);
  }

  // create new record
  public function create(array $data)
  {
    $data = $this->setPayload($data);
		return $this->model->create($data);
  }


  public function uploadDevTeamImage(array $data)
	{
    $data = $this->setPayload($data);
		$extension = strtolower($data['image']->getClientOriginalExtension());
		$filename = 'dev_team_'.str_random().'.'.$extension;
		$path =  public_path('images/dev_team/images/');
		$imageLocation = $data['image']->move($path, $filename);
		// $image_path = $path.$filename;
		return $filename;
	}

  // remove record from the database
  public function delete(DevTeam $devTeam)
  {
    $delete = DevTeam::destroy($devTeam->id);
    return $delete;
  }

  private function setPayload(array $payload)
	{
		return [
			'name'           => $payload['name'],
			'description'		 => $payload['description'],
			'branch'	 	     => $payload['branch'],
			'image' 	       => $payload['image'],
			'year'           => $payload['year'],
		];
	}
}
