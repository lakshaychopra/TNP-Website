<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    /**
     * create new instance
     *
     * @param User $model
     */
    public function __construct(Post $model)
    {
        $this->model = $model;         
    }
    
    /**
     * create new record
     *
     * @param array $payload
     * @return App\Post
     */
    public function create(array $payload){

        return $this->model->create($payload);
    
    }
}