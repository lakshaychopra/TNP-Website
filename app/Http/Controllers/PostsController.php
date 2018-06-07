<?php

namespace App\Http\Controllers;

use App\Models\Post;
use DB;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;

class PostsController extends Controller
{
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //data fetched from database in $post
        $lists = $this->post->get();
        
        // data to be sent
        $data = [
            'list' => $lists,
        ];
        
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(CreatePostRequest $request)
    {
        //request inputs
        $inputs = $request->all();
        
        
        try {
            
            DB::beginTransaction();
            $posts = $this->repository->create($inputs);
            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            
        }
    }
    
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        //
    }
    
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //data fetched from database in $post with where id clause
        $post = $this->post->where('id', $id)->first();
        
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
        //
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
