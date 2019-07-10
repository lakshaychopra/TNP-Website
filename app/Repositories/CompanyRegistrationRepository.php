<?php

namespace App\Repositories;

use App\Models\CompanyRegistration;

class PostRepository
{
    /**
    * create new instance
    *
    * @param Post $model
    */
    public function __construct(Post $model)
    {
        $this->model = $model;         
    }
    
    // create new record
    public function create(array $data)
    {
        $data = $this->setPayload($data);
		return $this->model->create($data);
    }
    
    private function setPayload(array $payload)
	{
		return [
			'univ_roll_no'    => $payload['univ_roll_no'],
            'class_roll_no'   => $payload['class_roll_no'],
            'name'            => $payload['name'],
            'branch'          => $payload['branch'],
            'company_name'    => $payload['company_name']
		];
	}
}