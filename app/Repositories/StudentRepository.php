<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepository
{
    /**
     * create new instance
     *
     * @param Student $model
     */
    public function __construct(Student $model)
    {
        $this->model = $model;         
    }

    public function all()
    {
        return $this->model->all();
    }
    

    public function list()
    {
        $lists = Student::orderBy('created_at', 'decs')->paginate(15);
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
			'password'	     	 => $payload['password'],
			'email'	 	         => $payload['email'],
			'phone_number'       => $payload['phone_number'],
        ];
	}
}