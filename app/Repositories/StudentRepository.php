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
    

    public function list($limit = false)
    {
        $builder = Student::orderBy('created_at', 'desc');
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
    
    // remove record from the database
    public function delete(Student $student)
    {
        $delete = Student::destroy($student->id);
        return $delete;
    }
    
    private function setPayload(array $payload)
	{
		return [
            'univ_roll_no'            =>    $payload['univ_roll_no'],
            'class_roll_no'           =>    $payload['class_roll_no'],
            'name'                    =>    $payload['name'],
            'batch'                   =>    $payload['batch'],
            'branch_type'             =>    $payload['branch_type'],
            'stream'                  =>    $payload['stream'],
            'section'                 =>    $payload['section'],
            'shift'                   =>    $payload['shift'],
            'training_semester'       =>    $payload['training_semester'],
            'gender'                  =>    $payload['gender'],
            'blood_group'             =>    $payload['blood_group'],
            'category'                =>    $payload['category'],
            'height'                  =>    $payload['height'],
            'weight'                  =>    $payload['weight'],
            'living'                  =>    $payload['living'],
            'father_name'             =>    $payload['father_name'],
            'father_phone'            =>    $payload['father_phone'],
            'mother_name'             =>    $payload['mother_name'],
            'mother_phone'            =>    $payload['mother_phone'],
            'address'                 =>    $payload['address'],
            'city'                    =>    $payload['city'],
            'state'                   =>    $payload['state'],
            'district'                =>    $payload['district'],
            'pincode'                 =>    $payload['pincode'],
            'dob'                     =>    $payload['dob'],
            'whatsapp_cont'           =>    $payload['whatsapp_cont'],
            'mail_id'                 =>    $payload['mail_id'],
            'phone_number'            =>    $payload['phone_number'],
        ];
	}
}