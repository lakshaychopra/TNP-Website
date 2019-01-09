<?php

namespace App\Http\Controllers;

use App\Models\DevTeam;
use Illuminate\Http\Request;
use App\Repositories\DevTeamsRepository;
use App\Services\DevTeamsService;
use App\Http\Requests\CreateDevTeamsRequest;
use App\Http\Requests\UpdateDevTeamsRequest;
use Tymon\JWTAuth\Facades\JWTAuth;
use DB;
use Exception;

class DevTeamsController extends Controller
{
  public function __construct(DevTeamsRepository $repository, DevTeamsService $service)
	{
		$this->repository = $repository;
		$this->service = $service;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $auth = JWTAuth::parseToken()->authenticate();
      $limit  = $request->input('limit') ?? 6;
      $devTeam = $this->repository->list($limit);
      return $this->respondData($devTeam);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDevTeamsRequest $request)
    {
      $auth = JWTAuth::parseToken()->authenticate();
      try {
          DB::beginTransaction();
          if (!$auth) {
              return $this->respondUnauthorized('Failed');
          }
          $devTeam = $request->all();
          if ($request->hasFile('image')) {
              $devTeam['image'] = $this->service->uploadDevTeamImageService($devTeam);
          }

          $devTeamCreate = $this->service->createDevTeam($devTeam);
          DB::commit();
          return $this->respondSuccess('Inserted', $devTeamCreate);
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
    public function show(DevTeam $devTeam)
    {
      $auth = JWTAuth::parseToken()->authenticate();
      return $this->respondData($devTeam);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DevTeam $devTeam)
    {
      $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($devTeam);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDevTeamsRequest $request, DevTeam $devTeam)
    {
      $auth = JWTAuth::parseToken()->authenticate();
      try {
          DB::beginTransaction();
          if(!$auth){
              return $this->respondError('Failed', 401);
          }
          $devTeam->name = $request->name;
          $devTeam->description = $request->description;
          $devTeam->branch = $request->branch;
          $devTeam->year = $request->year;
          if ($request->hasFile('image')) {
              $devTeam['image'] = $this->service->uploadDevTeamImageService($devTeam);
          }
          $devTeam->save();
          DB::commit();
          return $this->respondSuccess('Updated',$devTeam);
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
    public function destroy(DevTeam $devTeam)
    {
      $auth = JWTAuth::parseToken()->authenticate();
      $delete = $this->repository->delete($devTeam);
      $index= DevTeam::orderBy('created_at', 'desc')->get();
      return $this->respondSuccess('Deleted', $index);
    }
}
