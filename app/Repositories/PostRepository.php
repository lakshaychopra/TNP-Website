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
    
    // Get all instances of model
    public function all()
    {
        return $this->model->all();
    }
    
    public function list()
    {
        $lists = Post::orderBy('created_at', 'decs')->paginate(6);
        return $lists;
    }
    
    // create new record
    public function create(array $data)
    {
        $data = $this->setPayload($data);
		return $this->model->create($data);
    }
    
    // update record in the database
    public function update(array $data, $id){
        $record = $this->find($id);
        $data = $this->setPayload($data);
        return $record->update($data);
    }
    
    // remove record from the database
    public function delete($id)
    {
        return $this->model->destroy($id);
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
			'post_link'	 	     => $payload['post_link'],
			'image_path'	 	 => $payload['image_path'],
		];
	}
}