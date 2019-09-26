<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSearchRequest;   
use JWTAuth;
use Exception;
use Excel;
use App\Services\SearchService;
use App\Repositories\SearchRepository;
//use DB;

class SearchController extends Controller
{
    public function __construct(SearchService $service,SearchRepository $repository)
     {
         $this->service = $service;
         $this->repository = $repository;
     }
     public function downloadExcelFile(Request $request){
        $auth = JWTAuth::parseToken()->authenticate();
       
            
        $studentSearch = $this->service->searchStudent($request)->toArray();

        //$data=json_decode(json_encode($studentSearch),true); 
        $data=$studentSearch;
        // \Log::info("hi test");
        // \Log::info($studentSearch);

             return Excel::create('filtered_data', function($excel)  use ($data) 
             {
                 $excel->sheet('sheet name', function($sheet) use ($data)
                 {
                     $sheet->fromArray($data);
                 });

            })->download('xlsx');
              
    
    }
    
   
}
