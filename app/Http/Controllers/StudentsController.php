<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Repositories\StudentRepository;
use App\Http\Requests\CreateStudentRequest;
use App\Services\StudentService;
use DB;
use Exception;
use Notification;
use JWTAuth;

class StudentsController extends Controller
{
    public function __construct(StudentService $service, StudentRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
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
        $students = $this->repository->list($limit);
        return $this->respondData($students);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $data = $request->only('univ_roll_no');
            $student = new Student;
            $student->create($data);
            DB::commit();
            return $this->respondSuccess('Inserted',$student);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(Student $student)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($post);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($student = null)
    {
        if ($student != null) {
            $data = Student::where('univ_roll_no', '=' , $student)->get();
            return $this->respondData($data);
        }
        
    }
    
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    
    public function update(CreateStudentRequest $request, Student $student)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
            $data = $request->all();
            $student->univ_roll_no=$request->univ_roll_no;
            $student->class_roll_no=$request->class_roll_no;
            $student->name=$request->name;
            $student->batch=$request->batch;
            $student->branch_type=$request->branch_type;
            $student->stream=$request->stream;
            $student->section=$request->section;
            $student->shift=$request->shift;
            $student->training_semester=$request->training_semester;
            $student->gender=$request->gender;
            $student->blood_group=$request->blood_group;
            $student->category=$request->category;
            $student->height=$request->height;
            $student->weight=$request->weight;
            $student->living=$request->living;
            $student->father_name=$request->father_name;
            $student->father_phone=$request->father_phone;
            $student->mother_name=$request->mother_name;
            $student->mother_phone=$request->mother_phone;
            $student->address=$request->address;
            $student->city=$request->city;
            $student->state=$request->state;
            $student->district=$request->district;
            $student->pincode=$request->pincode;
            $student->save();
            DB::commit();
            return $this->respondSuccess('Updated',$student);
        } catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Student $student)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        $delete = $this->repository->delete($student);
        $index= Student::orderBy('created_at', 'desc')->get();
        return $this->respondSuccess('Deleted', $index);
    }
}