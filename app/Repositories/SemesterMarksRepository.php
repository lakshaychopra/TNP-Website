<?php

namespace App\Repositories;

use App\Models\SemesterMarks;

class SemesterMarksRepository
{
    /**
     * create new instance
     *
     * @param SemesterMarks $model
     */
    public function __construct(SemesterMarks $model)
    {
        $this->model = $model;         
    }

    public function all()
    {
        return $this->model->all();
    }
    

    public function list($limit = false)
    {
        $builder = SemesterMarks::orderBy('created_at', 'desc');
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
    public function delete(SemesterMarks $semesterMarks)
    {
        $delete = SemesterMarks::destroy($semesterMarks->id);
        return $delete;
    }
    
    private function setPayload(array $payload)
	{
		return [
            'univ_roll_no'         =>    $payload['univ_roll_no'],
            'semester'             =>    $payload['semester'],
            'obtained_marks'       =>    $payload['obtained_marks'],
            'max_marks'            =>    $payload['max_marks'],
            'credits'              =>    $payload['credits'],
            'active_backlog'       =>    $payload['active_backlog'],
            'passive_backlog'      =>    $payload['passive_backlog'],
            'marks_type'           =>    $payload['marks_type'],
            'percentage'           =>    $payload['percentage'],
            'semester_status'      =>    $payload['semester_status'],
        ];
	}
}