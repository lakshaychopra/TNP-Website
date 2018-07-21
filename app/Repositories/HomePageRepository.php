<?php

namespace App\Repositories;

use App\Models\HomePage;

class HomePageRepository
{
    /**
    * create new instance
    *
    * @param HomePage $model
    */
    public function __construct(HomePage $model)
    {
        $this->model = $model;         
    }
  
     // create new record
     public function create(array $data)
     {
         $data = $this->setPayload($data);
         return $this->model->create($data);
     }
     
     
     public function uploadOfficeImage(array $data)
     {
         $data = $this->setPayload($data);
         $extension = strtolower($data['image']->getClientOriginalExtension());
         $filename = 'office_'.str_random().'.'.$extension;
         $path =  public_path('images/home/widget/office/');
         $imageLocation = $data['image']->move($path, $filename);
         // $image_path = $path.$filename;
         return $filename;
     }
 
     
     private function setPayload(array $payload)
     {
         return [
             'title'             => $payload['title'],
             'body'				 => $payload['body'],
             'username'	 	     => $payload['username'],
             'user_id'	 	     => $payload['user_id'],
             'tag'	 	         => $payload['tag'],
             'category'	 	     => $payload['category'],
             'post_link'	 	 => $payload['post_link'],
             'image'	         => $payload['image'],
         ];
     }
}