<?php

namespace App\Repositories;

use App\Models\PreviousEducation;

class PreviousEducationRepository
{
    /**
    * create new instance
    *
    * @param PreviousEducation $model
    */
    public function __construct(PreviousEducation $model)
    {
        $this->model = $model;         
    }
    
    public function all()
    {
        return $this->model->all();
    }
    
    
    public function list($limit = false)
    {
        $builder = PreviousEducation::orderBy('created_at', 'desc');
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
    
    public function delete(PreviousEducation $PreviousEducation)
    {
        $delete = PreviousEducation::destroy($PreviousEducation->id);
        return $delete;
    }
    
    private function setPayload(array $payload)
	{
		return [
            'univ_roll_no'          => $payload['univ_roll_no'],
            'board_XII'             => $payload['board_XII'],
            'institute_XII'         => $payload['institute_XII'],
            'month_XII'             => $payload['month_XII'],
            'year_XII'              => $payload['year_XII'],
            'obtained_marks_XII'    => $payload['obtained_marks_XII'],
            'max_marks_XII'         => $payload['max_marks_XII'],
            'percentage_XII'        => $payload['percentage_XII'],
            'institute_Diploma'     => $payload['institute_Diploma'],
            'month_Diploma'         => $payload['month_Diploma'],
            'year_Diploma'          => $payload['year_Diploma'],
            'obtained_marks_Diploma'=> $payload['obtained_marks_Diploma'],
            'max_marks_Diploma'     => $payload['max_marks_Diploma'],
            'percentage_Diploma'    => $payload['percentage_Diploma'],
            'year_gap'              => $payload['year_gap'],
            'jee_rank_XII'          => $payload['jee_rank_XII'],
        ];
	}
}