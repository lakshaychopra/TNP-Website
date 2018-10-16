<?php

namespace App\Http\Controllers;

use App\Models\AboutWidget;
use Illuminate\Http\Request;
use DB;
use Exception;
use Notification;
use JWTAuth;
use App\Http\Requests\CreatePostRequest;
use App\Services\PostService;
use App\Repositories\AboutRepository;


class AboutWidgetController extends Controller
{

    public function __construct( $service,AboutRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutWidget  $aboutWidget
     * @return \Illuminate\Http\Response
     */
    public function show(AboutWidget $aboutWidget)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($aboutWidget);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutWidget  $aboutWidget
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutWidget $aboutWidget)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($aboutWidget);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutWidget  $aboutWidget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutWidget $aboutWidget)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
            $data = $request->all();
            $aboutWidget->title = $request->title;
            $aboutWidget->body = $request->body;
            $aboutWidget->category = $request->category;
            if ($request->hasFile('image')) {
                $aboutWidget['image'] = $this->service->uploadAboutWidgetImageService($data);
            } 
            $aboutWidget->save(); 
            DB::commit();
            return $this->respondSuccess('Updated',$aboutWidget);
        } catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutWidget  $aboutWidget
     * @return \Illuminate\Http\Response
     */
   
    public function aboutWidgets(AboutWidget $aboutWidget)
    {
        $aboutWidget = AboutWidget::all();
        return $this->respondData($aboutWidget);
    }
}
