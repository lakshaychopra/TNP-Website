<?php

namespace App\Http\Controllers;

use App\Models\MetricsEducation;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMetricsEducationRequest;
use App\Http\Requests\UpdateMetricsEducationRequest;
use DB;
use Exception;
use Notification;
use JWTAuth;
use App\Services\MetricsEducationService;
use App\Repositories\MetricsEducationRepository;

class MetricsEducationController extends Controller
{
    public function __construct(MetricsEducationService $service,MetricsEducationRepository $repository)
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
    public function store(CreateMetricsEducationRequest $request)
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
    public function edit($me = null)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        if ($me != null) {
            $data = MetricsEducation::where('univ_roll_no', '=' , $me)->get();
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
    public function update(UpdateMetricsEducationRequest $request, MetricsEducation $me)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if(!$auth){
                return $this->respondError('Failed', 401);
            }
            // $data = $request->all();
            $me->univ_roll_no = $request->univ_roll_no;
            $me->board = $request->board;
            $me->institute = $request->institute;
            $me->month = $request->month;
            $me->year = $request->year;
            $me->obtained_marks = $request->obtained_marks;
            $me->max_marks = $request->max_marks;
            $me->marks_type = $request->marks_type;
            $me->percentage = $request->percentage;
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
    public function destroy(MetricsEducation $me)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        $delete = $this->repository->delete($me);
        $index= MetricsEducation::orderBy('created_at', 'desc')->get();
        return $this->respondSuccess('Deleted', $index);
    }
}
