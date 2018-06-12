<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DB;
use App\Http\Requests\CreatePostRequest;
use App\Services\PostService;
use Illuminate\Http\Request;
use Exception;

class PostController extends Controller
{
    public $successStatus = 200;
    
    public function __construct(PostService $service)
    {
        $this->service = $service;
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //data fetched from database in $post
        $this->service->listPost();
        return $request->json([
            'list' => $lists,
        ],
        $this->successStatus);
        
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
    * @param  \App\Http\CreatePostRequest  $request
    * @return \Illuminate\Http\Response  JSON
    */
    public function store(CreatePostRequest $request)
    {
        if($request->isMethod('post')){
            try {
                DB::beginTransaction();
                $post = $this->service->createPost($request->all());
                DB::commit();
                if($post){
                    return response() //Json response with status 200 and token and user type
                    ->json([
                        'response'=>'Inserted',
                        $post,
                    ],
                    $this->successStatus);
                }
                else 
                {
                    return response()->json(['error' => 'Failed'], 401); //Json response with status 401 and error message
                }
            } catch (Exception $e) {
                DB::rollback();
                return $this->respondException($e);
            }
        }
    }
    
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($post)
    {
        //data fetched from database in $post with where id clause
        $post = $this->post->where('id', $post)->first();
        
        // data to be sent
        $data = [
            'post' => $post,
        ];
        //response in the form of JSON
        return response()->json($data);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        return $request->json(200,$task);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(CreatePostRequest $request, $id)
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
