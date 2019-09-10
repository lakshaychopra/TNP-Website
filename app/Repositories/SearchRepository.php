<?php

namespace App\Repositories;

use App\Models\DisplayStudent;
use DB;
use App\Models\SemesterMarks;
use App\Models\PreviousEducation;
use App\Models\MetricsEducation;

class SearchRepository
{
    public function __construct(DisplayStudent $model)
    {
        \Log::info('Repository const');
        $this->model = $model;         
    }

    
    // public function multiple_streams(){
    //     $streams = DB::table('filtered_students')->pluck('stream');
    //     //dd($streams);
    //     $string = ""; 
    //     foreach($streams as $stream){
    //         $string.=$stream." ";
    //     }
    //     return explode(' ', $string); 
        
    // }


    public function search($request)
    {
       try{ 

        $streams=explode(',',$request->input('branch_type'));
        $genders=explode(',',$request->input('gender'));
        $fields=explode(',', $request->input('selected_fields'));


        $student=DisplayStudent::select($fields)->where([
        ['tenth_percentage','>=',$request->input('tenth_percentage')],
        ['percentage_XII','>=',$request->input('percentage_XII')],
        ['percentage_Diploma','>=',$request->input('percentage_Diploma')],
        ['sgpa_aggregate','>=',$request->input('sgpa_aggregate')],
        ['year_gap','<=',$request->input('year_gap')],
        ['univ_roll_no','=',$request->input('univ_roll_no')],
        ['active_backlog_aggregate','<=',$request->input('active_backlog_aggregate')]
        ])->whereIn('gender',$genders)
        ->whereIn('stream',$streams);   
       
       }
       catch(Exception $e){
           
       } 
     return $student->get();       
    }
}