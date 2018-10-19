<?php

namespace App\Repositories;

use App\Models\MetricsEducation;

class MetricsEducationRepository
{
    /**
     * create new instance
     *
     * @param MetricsEducation $model
     */
    public function __construct(MetricsEducation $model)
    {
        $this->model = $model;         
    }

    public function all()
    {
        return $this->model->all();
    }
    

    public function list($limit = false)
    {
        $builder = MetricsEducation::orderBy('created_at', 'desc');
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
    public function delete(MetricsEducation $me)
    {
        $delete = MetricsEducation::destroy($me->id);
        return $delete;
    }
    
    private function setPayload(array $payload)
	{
		return [
            'univ_roll_no'            =>    $payload['univ_roll_no'],
            'board'                   =>    $payload['board'],
            'institute'               =>    $payload['institute'],
            'month'                   =>    $payload['month'],
            'year'                    =>    $payload['year'],
            'obtained_marks'          =>    $payload['obtained_marks'],
            'max_marks'               =>    $payload['max_marks'],
            'marks_type'              =>    $payload['marks_type'],
            'percentage'              =>    $payload['percentage'],
        ];
	}
}