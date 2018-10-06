<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDownloadRequest;
use DB;
use Exception;
use Notification;
use JWTAuth;

class DownloadsController extends Controller
{
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
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
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
                return $this->respondUnauthorized('Upload Failed');
            }
            $download = $request->all();
            $ext = $download->getClientOriginalExtension();
            $type = $this->getType($ext);
            if ($request->hasFile('file')) {
                $download['file'] = $this->service->uploadDownloadService($download);
            }
            DB::commit();
            $downloadCreate = $this->service->createDownload($download);
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
    public function update(Request $request, $id)
    {
        //
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
