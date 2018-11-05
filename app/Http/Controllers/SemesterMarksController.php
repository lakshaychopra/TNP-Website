<?php

namespace App\Http\Controllers;

use App\Models\SemesterMarks;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSemesterMarksRequest;
use App\Http\Requests\UpdateSemesterMarksRequest;
use DB;
use Exception;
use Notification;
use JWTAuth;
use App\Services\SemesterMarksService;
use App\Repositories\SemesterMarksRepository;

class SemesterMarksController extends Controller
{
    public function __construct(SemesterMarksService $service,SemesterMarksRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        $limit  = $request->input('limit') ?? 6;
        $semesterMarks = $this->repository->list($limit);
        return $this->respondData($semesterMarks);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(CreateSemesterMarksRequest $request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $data = $request->all();
            $semesterMarks = new SemesterMarks;
            $semesterMarks->create($data);
            DB::commit();
            return $this->respondSuccess('Inserted',$semesterMarks);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\SemesterMarks  $semesterMarks
    * @return \Illuminate\Http\Response
    */
    public function show(SemesterMarks $semesterMarks)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($semesterMarks);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\SemesterMarks  $semesterMarks
    * @return \Illuminate\Http\Response
    */
    public function edit($semesterMarks = null)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        if ($semesterMarks != null) {
            $data = SemesterMarks::where('univ_roll_no', '=' , $semesterMarks)->get();
            return $this->respondData($data);
        }
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\SemesterMarks  $semesterMarks
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateSemesterMarksRequest $request,SemesterMarks $semesterMarks)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
            DB::beginTransaction();
            $uid = SemesterMarks::pluck('id');
            $updateData = DB::table('semester_marks')->where('id', $uid)
            ->update([
                'semester'  => $request->semester,
                'obtained_marks'  => $request->obtained_marks,
                'max_marks'  => $request->max_marks,
                'credits'  => $request->credits,
                'active_backlog'  => $request->active_backlog,
                'passive_backlog'  => $request->passive_backlog,
                'marks_type'  => $request->marks_type,
                'percentage'  => $request->percentage,
                'semester_status'  => $request->semester_status,
                ]);
                DB::commit();
                return $this->respondSuccess('Updated',$updateData);
            } catch (Exception $e) {
                DB::rollback();
                return $this->respondException($e);
            }
        }
        
        /**
        * Remove the specified resource from storage.
        *
        * @param  \App\Models\SemesterMarks  $semesterMarks
        * @return \Illuminate\Http\Response
        */
        public function destroy(SemesterMarks $semesterMarks)
        {
            $auth = JWTAuth::parseToken()->authenticate();
            $delete = $this->repository->delete($semesterMarks);
            $index= SemesterMarks::orderBy('created_at', 'desc')->get();
            return $this->respondSuccess('Deleted', $index);
        }
        
    }
    