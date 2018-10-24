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
    public function update(UpdateSemesterMarksRequest $request, SemesterMarks $semesterMarks)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
            $data = $request->all();
            \Log::info($data);
            $semesterMarks->univ_roll_no = $request->univ_roll_no;
            $semesterMarks->semester = $request->semester;
            $semesterMarks->obtained_marks = $request->obtained_marks;
            $semesterMarks->max_marks = $request->max_marks;
            $semesterMarks->credits = $request->credits;
            $semesterMarks->active_backlog = $request->active_backlog;
            $semesterMarks->passive_backlog = $request->passive_backlog;
            $semesterMarks->marks_type = $request->marks_type;
            $semesterMarks->percentage = $request->percentage;
            $semesterMarks->semester_status = $request->semester_status;
            \Log::info($semesterMarks->semester);
            
            $semesterMarks->save(); 
            DB::commit();
            return $this->respondSuccess('Updated',$semesterMarks);
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
