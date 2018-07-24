<?php

namespace App\Repositories;

use App\Models\Post;

class HomeRepository
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
        $builder = Post::where('is_pinned', '=', '0')->orderBy('created_at', 'desc');
        if(!$limit) {
            return $builder->get();
        }
        return $builder->paginate($limit);
    }
    
}