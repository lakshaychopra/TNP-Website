<?php

namespace App\Http\Controllers;

use App\Models\PreviousEducation;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            for ($i=1; $i <= 3 ; $i++) { 
                DB::beginTransaction();
                if (!$auth) {
                    return $this->respondUnauthorized('Failed');
                }
                $pe = $request->all();
                switch ($i) {
                    case 1:
                    $pe['education'] = "X";
                    break;
                    case 2:
                    $pe['education'] = "XII";
                    break;
                    case 3:
                    $pe['education'] = "DIPLOMA";
                    break;
                }
                $peCreate = $this->service->createPreviousEducation($pe);
                DB::commit();
            }
            return $this->respondSuccess('Inserted');
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
    public function edit(PreviousEducation $pe)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($pe);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, PreviousEducation $pe)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
            $data = $request->all();
            $id = $request->id;
            $pe = PreviousEducation::find($id);
            $pe->update($data); 
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
