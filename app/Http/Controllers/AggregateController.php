<?php

namespace App\Http\Controllers;

use App\Models\Aggregate;
use Illuminate\Http\Request;
use App\Http\Requests\CreateAggregateRequest;
use App\Http\Requests\UpdateAggregateRequest;
use DB;
use Exception;
use Notification;
use JWTAuth;
use App\Services\AggregateService;
use App\Repositories\AggregateRepository;

class AggregateController extends Controller
{
    public function __construct(AggregateService $service,AggregateRepository $repository)
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
        $aggregate = $this->repository->list($limit);
        return $this->respondData($aggregate);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(CreateAggregateRequest $request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $data = $request->all();
            $aggregate = new Aggregate;
            $aggregate->create($data);
            DB::commit();
            return $this->respondSuccess('Inserted',$aggregate);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Aggregate  $aggregate
    * @return \Illuminate\Http\Response
    */
    public function show(Aggregate $aggregate)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($aggregate);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Aggregate  $aggregate
    * @return \Illuminate\Http\Response
    */
    public function edit($aggregate = null)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        if ($aggregate != null) {
            $data = Aggregate::where('univ_roll_no', '=' , $aggregate)->get();
            return $this->respondData($data);
        }
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Aggregate  $aggregate
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateAggregateRequest $request,Aggregate $aggregate)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
            DB::beginTransaction();
            $uid = Aggregate::pluck('id');
            $updateData = DB::table('aggregate')->where('id', $uid)
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
        * @param  \App\Models\Aggregate  $aggregate
        * @return \Illuminate\Http\Response
        */
        public function destroy(Aggregate $aggregate)
        {
            $auth = JWTAuth::parseToken()->authenticate();
            $delete = $this->repository->delete($aggregate);
            $index= Aggregate::orderBy('created_at', 'desc')->get();
            return $this->respondSuccess('Deleted', $index);
        }
    }
    