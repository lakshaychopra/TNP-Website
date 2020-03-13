<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Excel;
use App\Services\SearchService;
use App\Repositories\SearchRepository;
use DB;

class SearchController extends Controller
{
    public function __construct(SearchService $service, SearchRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }
    public function index()
    {
        $student = DB::select('select * from display_student');
        return $this->respondData($student);
    }

    public function downloadExcelFile(Request $request)
    {
        $auth = JWTAuth::parseToken()->authenticate();


        $studentSearch = $this->service->searchStudent($request)->toArray();

        //$data=json_decode(json_encode($studentSearch),true); 
        $data = $studentSearch;

        return Excel::download('filtered_data', function ($excel)  use ($data) {
            $excel->sheet('sheet name', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }
}
