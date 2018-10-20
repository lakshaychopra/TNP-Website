<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDownloadRequest;
use DB;
use Exception;
use Notification;
use JWTAuth;
use App\Services\DownloadService;
use App\Repositories\DownloadRepository;

class DownloadsController extends Controller
{
    public function __construct(DownloadService $service,DownloadRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
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
        $download = $this->repository->list($limit);
        return $this->respondData($download);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(CreateDownloadRequest $request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $download = $request->all();
            if ($request->hasFile('file')) {
                $download['file'] = $this->service->uploadDownloadService($download);
            }
            $ext = $download->getClientOriginalExtension();
            $type = $this->getType($ext);
            $downloadCreate = $this->service->createDownload($download);
            DB::commit();
            return $this->respondSuccess('Uploaded', $downloadCreate); 
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
    public function show(Download $download)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($download);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(Download $download)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($download);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(CreateDownloadRequest $request, Download $download)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
            $data = $request->all();
            if ($request->hasFile('file')) {
                $download['file'] = $this->service->uploadDownloadService($download);
            }
            // $download->title = $request->title;
            // $download->body = $request->body;
            // $download->tag = $request->tag;
            // $download->category = $request->category;
            $download->save(); 
            DB::commit();
            return $this->respondSuccess('Updated',$download);
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
    public function destroy(Download $download)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        $delete = $this->repository->delete($download);
        $index= Download::orderBy('created_at', 'desc')->get();
        return $this->respondSuccess('Deleted', $index);
    }
    
    public function linksDownload()
    {
        $download['data'] = Download::select('file_link','title')->get();
        return $this->respondData($download);
    }
}
