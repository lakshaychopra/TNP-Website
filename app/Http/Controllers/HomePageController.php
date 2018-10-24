<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;
use App\Http\Requests\CreateHomePageRequest;
use Exception;
use Excel;
use JWTAuth;
use DB;
// use App\Services\HomePageService;
use App\Repositories\HomePageRepository;

class HomePageController extends Controller
{
    public function __construct(HomePageRepository $repository)
    {
        // $this->service = $service;
        $this->repository = $repository;
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\HomePage  $homePage
    * @return \Illuminate\Http\Response
    */
    public function show(HomePage $homePage)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($homePage);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\HomePage  $homePage
    * @return \Illuminate\Http\Response
    */
    public function edit(HomePage $homePage)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($homePage);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\HomePage  $homePage
    * @return \Illuminate\Http\Response
    */
    public function update(CreateHomePageRequest $request, HomePage $homePage)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $data = $request->all();
            $homePage->office_type = $request->office_type;
            $homePage->office_widget = $request->office_widget;
            $homePage->office_name = $request->office_name;
            $homePage->office_position = $request->office_position;
            $homePage->office_email = $request->office_email;
            $homePage->office_phone = $request->office_phone;
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
