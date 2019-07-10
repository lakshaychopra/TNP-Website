<?php

namespace App\Http\Controllers;

use App\Models\DetailedSemesterMarks;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSemesterMarksRequest;
use App\Http\Requests\UpdateSemesterMarksRequest;
use DB;
use Exception;
use Notification;
use JWTAuth;
use App\Services\DetailedSemesterMarksService;
use App\Repositories\DetailedSemesterMarksRepository;

class DetailedSemesterMarksController extends Controller
{
    public function __construct(DetailedSemesterMarksService $service,DetailedSemesterMarksRepository $repository)
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
            $semesterMarks = new DetailedSemesterMarks;
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
    * @return \Illuminate\Http\Response
    */
    public function edit($semesterMarks = null)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        if ($semesterMarks != null) {
            $data = DetailedSemesterMarks::where('univ_roll_no', '=' , $semesterMarks)->get();
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
    public function update(UpdateSemesterMarksRequest $request,DetailedSemesterMarks $semesterMarks)
    {
        // \Log::info("1");
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
            // $uid = SemesterMarks::pluck('id');
            $updateData = DB::table('detailed_semester_marks')->where('univ_roll_no', $request->univ_roll_no)
            ->update([
                'obtained_marks_1'   => $request->obtained_marks,
                'credits_1'          => $request->credits,
                'active_backlog_1'   => $request->active_backlog,
                'passive_backlog_1'  => $request->passive_backlog,

                'obtained_marks_2'  => $request->obtained_marks,
                'credits_2'         => $request->credits,
                'active_backlog_2'  => $request->active_backlog,
                'passive_backlog_2' => $request->passive_backlog,
                
                'obtained_marks_3'  => $request->obtained_marks,
                'credits_3'         => $request->credits,
                'active_backlog_3'  => $request->active_backlog,
                'passive_backlog_3' => $request->passive_backlog,
                
                'obtained_marks_4'  => $request->obtained_marks,
                'credits_4'         => $request->credits,
                'active_backlog_4'  => $request->active_backlog,
                'passive_backlog_4' => $request->passive_backlog,
                
                'obtained_marks_5'  => $request->obtained_marks,
                'credits_5'         => $request->credits,
                'active_backlog_5'  => $request->active_backlog,
                'passive_backlog_5' => $request->passive_backlog,
                
                'obtained_marks_6'  => $request->obtained_marks,
                'credits_6'         => $request->credits,
                'active_backlog_6'  => $request->active_backlog,
                'passive_backlog_6' => $request->passive_backlog,

                'obtained_marks_7'  => $request->obtained_marks,
                'credits_7'         => $request->credits,
                'active_backlog_7'  => $request->active_backlog,
                'passive_backlog_7' => $request->passive_backlog,

                'obtained_marks_8'  => $request->obtained_marks,
                'credits_8'         => $request->credits,
                'active_backlog_8'  => $request->active_backlog,
                'passive_backlog_8' => $request->passive_backlog,
                
                'percentage_aggregate'      => $request->percentage,
                'sgpa_aggregate'            => $request->percentage,
                'credits_aggregate'         => $request->percentage,
                'active_backlog_aggregate'  => $request->percentage,
                'passive_backlog_aggregate' => $request->percentage,

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
        public function destroy(DetailedSemesterMarks $semesterMarks)
        {
            $auth = JWTAuth::parseToken()->authenticate();
            $delete = $this->repository->delete($semesterMarks);
            $index= SemesterMarks::orderBy('created_at', 'desc')->get();
            return $this->respondSuccess('Deleted', $index);
        }
        
    }
    