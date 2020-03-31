<?php

namespace App\Http\Controllers;

use App\Models\PreviousEducation;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePreviousEducationRequest;
use App\Http\Requests\UpdatePreviousEducationRequest;
use DB;
use Exception;
use Notification;
use JWTAuth;
use App\Services\PreviousEducationService;
use App\Repositories\PreviousEducationRepository;

class PreviousEducationsController extends Controller
{
    public function __construct(PreviousEducationService $service,PreviousEducationRepository $repository)
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
        $pe = $this->repository->list($limit);
        return $this->respondData($pe);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(CreatePreviousEducationRequest $request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $data = $request->only('univ_roll_no');
            $pe = new PreviousEducation;
            $pe->create($data);
            DB::commit();
            return $this->respondSuccess('Inserted',$pe);
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
    public function show(PreviousEducation $pe)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($pe);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($pe = null)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        if ($pe != null) {
            $data = PreviousEducation::where('univ_roll_no', '=' , $pe)->get();
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
    public function update(UpdatePreviousEducationRequest $request, PreviousEducation $pe)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        $certificate;
        $certificate1;
        try {
            DB::beginTransaction();
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
            if($request->education == 'XII'){
                $certificate = $request->file('XII_previous_edu_certificate');
                $extension = strtolower($certificate->getClientOriginalExtension());
                $filename = $request->univ_roll_no.'_previous_edu_cerificate.'.$extension;
                $path =  public_path('images/certificates/twelfth');
                $imageLocation = $certificate->move($path, $filename);
                $pe->XII_previous_edu_certificate = $filename;   
                $pe->diploma_previous_edu_certificate = null;  
            }

            if($request->education == 'Diploma'){
                $certificate = $request->file('diploma_previous_edu_certificate');
                $extension = strtolower($certificate->getClientOriginalExtension());
                $filename = $request->univ_roll_no.'_previous_edu_cerificate.'.$extension;
                $path =  public_path('images/certificates/twelfth');
                $imageLocation = $certificate->move($path, $filename);
                $pe->XII_previous_edu_certificate = null;   
                $pe->diploma_previous_edu_certificate = $filename;  

            }
            if($request->education == 'BOTH'){
                $certificate = $request->file('XII_previous_edu_certificate');
                $certificate1 = $request->file('diploma_previous_edu_certificate');

            // CERTIFICATE-1
                $extension = strtolower($certificate->getClientOriginalExtension());
                $filename = $request->univ_roll_no.'_previous_edu_cerificate.'.$extension;
                $path =  public_path('images/certificates/twelfth');
                $imageLocation = $certificate->move($path, $filename);
                $pe->XII_previous_edu_certificate = $filename;   
                
             // certificate-2   
                $extension = strtolower($certificate1->getClientOriginalExtension());
                $filename = $request->univ_roll_no.'_previous_edu_cerificate.'.$extension;
                $path =  public_path('images/certificates/diploma');
                $imageLocation = $certificate1->move($path, $filename);
                $pe->diploma_previous_edu_certificate = $filename;
            }      
            
        //store_data
            $pe->univ_roll_no = $request->univ_roll_no;
            $pe->education = $request->education;
        //XII
            $pe->jee_rank= $request->jee_rank;
            $pe->XII_board = $request->XII_board;
            $pe->XII_institute = $request->XII_institute;
            $pe->XII_year = $request->XII_year;
            $pe->XII_obtained_marks = $request->XII_obtained_marks;
            $pe->XII_max_marks = $request->XII_max_marks;
            $pe->XII_percentage = $request->XII_percentage;
        //diploma
            $pe->diploma_board = $request->diploma_board;
            $pe->diploma_institute = $request->diploma_institute;
            $pe->diploma_year = $request->diploma_year;
            $pe->diploma_obtained_marks = $request->diploma_obtained_marks;
            $pe->diploma_max_marks = $request->diploma_max_marks;
            $pe->diploma_percentage = $request->diploma_percentage;
            $pe->year_gap = $request->year_gap;
            \Log::info($pe);
            $pe->save(); 
            DB::commit();
            return $this->respondSuccess('Updated',$pe);
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
    public function destroy(PreviousEducation $pe)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        $delete = $this->repository->delete($pe);
        $index= PreviousEducation::orderBy('created_at', 'desc')->get();
        return $this->respondSuccess('Deleted', $index);
    }
}