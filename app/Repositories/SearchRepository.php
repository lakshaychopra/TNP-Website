<?php

namespace App\Repositories;

use App\Models\FilteredStudent;
use DB;
use App\Models\SemesterMarks;
use App\Models\PreviousEducation;
use App\Models\MetricsEducation;

class SearchRepository
{
    public function __construct(FilteredStudent $model)
    {
        $this->model = $model;         
    }

    
    public function multiple_streams(){
        $streams = DB::table('filtered_students')->pluck('stream');
        //dd($streams);
        $string = ""; 
        foreach($streams as $stream){
            $string.=$stream." ";
        }
        return explode(' ', $string); 
        
    }


    public function search()
    {
       // $data = $this->setPayload($data);
       try{ 
           $array = $this->multiple_streams();
           $data=['univ_roll_no','name','email'];

           $student = DB::table('filtered_students')->whereIn('stream', $array);

       
       }
       catch(Exception $e){
           
       } 
     return $student->get($data);       
    }
}