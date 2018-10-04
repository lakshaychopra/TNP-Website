<?php

namespace App\Repositories;

use App\Models\About;

class AboutRepository
{
    /**
    * create new instance
    *
    * @param About $model
    */
    public function __construct(About $model)
    {
        $this->model = $model;         
    }
    
    public function list($limit = false)
    {
        $builder = About::orderBy('created_at', 'desc');
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
    
    
    public function uploadPostImage(array $data)
	{
        $data = $this->setPayload($data);
		$extension = strtolower($data['image']->getClientOriginalExtension());
		$filename = 'about_'.str_random().'.'.$extension;
		$path =  public_path('images/about/images/');
		$imageLocation = $data['image']->move($path, $filename);
		$image_path = $path.$filename;
		return $filename;
	}

    // remove record from the database
    public function delete(About $about)
    {
        $delete = About::destroy($about->id);
        return $delete;
    }
    
    private function setPayload(array $payload)
	{
		return [
			'title'              => $payload['title'],
			'body'				 => $payload['body'],
			'username'	 	     => $payload['username'],
			'user_id'	 	     => $payload['user_id'],
			'post_link'	 	     => $payload['post_link'],
			'image'	         	 => $payload['image'],
			'image_path'       	 => $payload['image_path'],
		];
	}
}