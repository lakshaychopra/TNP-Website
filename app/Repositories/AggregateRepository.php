<?php

namespace App\Repositories;

use App\Models\Aggregate;

class AggregateRepository
{
    /**
     * create new instance
     *
     * @param Aggregate $model
     */
    public function __construct(Aggregate $model)
    {
        $this->model = $model;         
    }

    public function all()
    {
        return $this->model->all();
    }
    

    public function list($limit = false)
    {
        $builder = Aggregate::orderBy('created_at', 'desc');
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
    public function delete(Aggregate $aggregate)
    {
        $delete = Aggregate::destroy($aggregate->id);
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