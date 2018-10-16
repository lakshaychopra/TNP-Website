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
use App\Repositories\PostRepository;


class AboutWidgetController extends Controller
{

    public function __construct( $service, $repository)
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
            $post->title = $request->title;
            $post->body = $request->body;
            $post->tag = $request->tag;
            $post->category = $request->category;
            if ($request->hasFile('image')) {
                $post['image'] = $this->service->uploadPostImageService($data);
            } 
            $post->save(); 
            DB::commit();
            return $this->respondSuccess('Updated',$post);
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
