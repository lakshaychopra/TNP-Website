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
            'univ_roll_no'   => $payload['univ_roll_no'],
            'board'          => $payload['board'],
            'month'          => $payload['month'],
            'year'           => $payload['year'],
            'obtained_marks' => $payload['obtained_marks'],
            'max_marks'      => $payload['max_marks'],
            'institute'      => $payload['institute'],
            'year_gap'       => $payload['year_gap'],
            'jee_rank'       => $payload['jee_rank'],
            'education'      => $payload['education']
        ];
	}
}