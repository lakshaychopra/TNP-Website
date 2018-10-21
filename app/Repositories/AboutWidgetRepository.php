<?php

namespace App\Repositories;

use App\Models\AboutWidget;

class AboutWidgetRepository
{
    /**
    * create new instance
    *
    * @param AboutWidget $model
    */
    public function __construct(AboutWidget $model)
    {
        $this->model = $model;         
    }
    
    public function list($limit = false)
    {
        $builder = AboutWidget::orderBy('created_at', 'desc');
        if(!$limit) {
            return $builder->get();
        }
        return $builder->paginate($limit);
    }
    
    private function setPayload(array $payload)
	{
		return [
			'about_address'      => $payload['about_address'],
			'about_location'	 => $payload['about_location'],
			'about_phone'	 	 => $payload['about_phone'],
			'about_website'	 	 => $payload['about_website'],
			'about_email'	 	 => $payload['about_email'],
			'about_fax'	 	     => $payload['about_fax'],
		];
	}
}