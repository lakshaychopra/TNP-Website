<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SemesterMarks;
use App\Models\PreviousEducation;
use App\Models\MetricsEducation;    
use JWTAuth;
use Exception;
use App\Services\SearchService;
use App\Repositories\SearchRepository;
use DB;



class SearchController extends Controller
{
    public function __construct(SearchService $service,SearchRepository $repository)
     {
         $this->service = $service;
         $this->repository = $repository;
     }
     public function downloadExcelFile(){
        
        $studentSearch = $this->service->searchStudent();
        $data=json_decode(json_encode($studentSearch),true); 

             return \Excel::create('filtered_data', function($excel)  use ($data) 
             {
                 $excel->sheet('sheet name', function($sheet) use ($data)
                 {
                     $sheet->fromArray($data);
                 });

            })->download('xlsx');
    }
   
}
