<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;
use App\Repositories\HomePageRepository;
use App\Http\Requests\HomePageRequest;
use Exception;
use Excel;
use JWTAuth;
use DB;

class HomePageController extends Controller
{
    public function __construct(HomePageRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\HomePage  $homePage
    * @return \Illuminate\Http\Response
    */
    public function show($homePage = 1)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        $data = Student::where('id', '=' , $homePage)->get();
        return $this->respondData($data);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\HomePage  $homePage
    * @return \Illuminate\Http\Response
    */
    public function edit($homePage = 1)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        $data = Student::where('id', '=' , $homePage)->get();
        return $this->respondData($data);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\HomePage  $homePage
    * @return \Illuminate\Http\Response
    */
    public function update(HomePageRequest $request, HomePage $homePage)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $data = $request->all();
            $id = $request->id;
            $homePage = HomePage::find($id);
            if ($request->hasFile('office_picture')) {
                $data['office_picture'] = $this->repository->uploadOfficeImageService($data);
            } 
            $homePageUpdate = $homePage->update($data);
            DB::commit();
            return $this->respondSuccess('Updated', $homePageUpdate);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
}
