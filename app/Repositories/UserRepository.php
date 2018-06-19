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
    

    public function list()
    {
        $lists = User::orderBy('created_at', 'decs')->paginate(15);
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
			'name'               => $payload['name'],
			'username'			 => $payload['username'],
			'password'	     	 => $payload['password'],
			'email'	 	         => $payload['email'],
			'phone_number'       => $payload['phone_number'],
			'type'   	 	     => $payload['type'],
        ];
	}
}