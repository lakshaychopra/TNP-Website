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

        $percentage=$request->input('percentage_XIIorDiploma');
        $student=DisplayStudent::select($fields)
        ->where([
        ['tenth_percentage','>=',$request->input('tenth_percentage')],
        ['sgpa_aggregate','>=',$request->input('sgpa_aggregate')],
        ['percentage_aggregate','>=',$request->input('percentage_aggregate')],
        ['year_gap','<=',$request->input('year_gap')],
        ['active_backlog_aggregate','<=',$request->input('active_backlog_aggregate')]
        ])->whereIn('gender',$genders)
        ->whereIn('branch_type',$streams)
        ->where(function ($query)  use ($percentage) {
            $query->where('percentage_XII','>=',$percentage)
                  ->orWhere('percentage_Diploma','>=',$percentage);
        });
        // \Log::info($student->toSql());
        // \Log::info($student->getBindings());

        // if ( !empty($request->has( 'tenth_percentage' ) )) {
        //     $result = $student->where( 'tenth_percentage', '>=', $request->tenth_percentage );
        // }
        // if ( $request->has( 'percentage_XII' ) ) {
        //     $result = $student->where( ['percentage_XII', '>=', $request->percentage_XII] );
        // }
        // if ( $request->has( 'stream' ) ) {
        //     $result = $student->whereIn( 'stream', $streams );
        // }
       
       }
       catch(Exception $e){
           
       } 
      // \Log::info($student->get());
     return $student->get();       
    }
}