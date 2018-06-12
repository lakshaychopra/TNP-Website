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
    public function create(array $data)
    {
        $data = $this->setPayload($data);
		return $this->model->create($data);
    }

    private function setPayload(array $payload)
	{
		return [
			'title'              => $payload['title'],
			'body'				 => $payload['body'],
			'author'	     	 => $payload['author'],
			'author_id'	 	     => $payload['author_id'],
			'tag'	 	         => $payload['tag'],
			'category'	 	     => $payload['category'],
		];
	}
}