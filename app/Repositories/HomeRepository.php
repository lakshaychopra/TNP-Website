<?php

namespace App\Repositories;

use App\Models\Post;

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
    
    public function list($limit = false)
    {
        $builder = Post::orderBy('created_at', 'desc');
        if(!$limit) {
            return $builder->get();
        }
        return $builder->paginate($limit);
    }
    


  
}