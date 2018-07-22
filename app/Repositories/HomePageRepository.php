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
     
}