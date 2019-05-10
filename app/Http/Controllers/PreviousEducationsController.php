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
        try {
            DB::beginTransaction();
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
            
            $certificate = $request->file('previous_edu_certificate');

        // if ($certificate->getClientMimeType() !== 'application/pdf'){

            $extension = strtolower($certificate->getClientOriginalExtension());
            $filename = $request->univ_roll_no.'_previous_edu_cerificate.'.$extension;
            $path =  public_path('images/certificates/twelfth');
            $imageLocation = $certificate->move($path, $filename);
            $pe->previous_edu_certificate = $filename;
         //}
            // $data = $request->all();
            $pe->univ_roll_no = $request->univ_roll_no;
            $pe->board = $request->board;
            $pe->institute = $request->institute;
            $pe->month = $request->month;
            $pe->year = $request->year;
            $pe->obtained_marks = $request->obtained_marks;
            $pe->max_marks = $request->max_marks;
            $pe->education = $request->education;
            $pe->year_gap = $request->year_gap;
            $pe->jee_rank = $request->jee_rank;
            $pe->percentage = $request->percentage;
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