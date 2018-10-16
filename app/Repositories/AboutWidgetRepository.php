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
    
    // create new record
    public function create(array $data)
    {
        $data = $this->setPayload($data);
		return $this->model->create($data);
    }
    
    
    public function uploadAboutWidgetImage(array $data)
	{
        $data = $this->setPayload($data);
		$extension = strtolower($data['image']->getClientOriginalExtension());
		$filename = 'aboutWidget_'.str_random().'.'.$extension;
		$path =  public_path('images/posts/images/');
		$imageLocation = $data['image']->move($path, $filename);
		// $image_path = $path.$filename;
		return $filename;
	}
    
    private function setPayload(array $payload)
	{
		return [
			'title'              => $payload['title'],
			'body'				 => $payload['body'],
			'username'	 	     => $payload['username'],
			'user_id'	 	     => $payload['user_id'],
			'tag'	 	         => $payload['tag'],
			'category'	 	     => $payload['category'],
			'post_link'	 	     => $payload['post_link'],
			'image'	         	 => $payload['image'],
		];
	}
}