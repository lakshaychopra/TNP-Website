<?php

namespace App\Http\Controllers;

use App\Models\MetricsEducation;
use Illuminate\Http\Request;
use DB;
use Exception;
use Notification;
use JWTAuth;


class MetricsEducationController extends Controller
{
    public function __construct( $service, $repository)
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
        $me = $this->repository->list($limit);
        return $this->respondData($me);
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
            $me = new MetricsEducation;
            $me->create($data);
            DB::commit();
            return $this->respondSuccess('Inserted',$me);
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
    public function show(MetricsEducation $me)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($me);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MetricsEducation $me)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($me);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetricsEducation $me)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
            $data = $request->all();
            $me->title = $request->title;
            $me->body = $request->body;
            $me->tag = $request->tag;
            $me->category = $request->category;
            $me->save(); 
            DB::commit();
            return $this->respondSuccess('Updated',$me);
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
    public function destroy($id)
    {
        //
    }
}
