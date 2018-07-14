<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * create new instance
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;         
    }

    public function all()
    {
        return $this->model->all();
    }
    

    public function list($limit = false)
    {
        $builder = User::orderBy('created_at', 'desc');
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
    
    // update record in the database
    public function update(array $data, $id){
        $record = $this->find($id);
        $data = $this->setPayload($data);
        return $record->update($data);
    }
    
    public function delete(User $user)
    {
        $delete = User::destroy($user->id);
        return $delete;
    }
    
    private function setPayload(array $payload)
	{
		return [
			'username'			 => $payload['username'],
			'password'	     	 => $payload['password'],
			'email'	 	         => $payload['email'],
			'phone_number'       => $payload['phone_number'],
			'type'   	 	     => $payload['type'],
        ];
	}
}