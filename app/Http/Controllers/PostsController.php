<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Services\PostService;
use App\Notifications\PostNotification;
use DB;
use Exception;
use Notification;

class PostController extends Controller
{
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
        // $this->service->listPost();
        $lists = Post::orderBy('created_at', 'decs')->paginate(6);
        return respondData($lists);
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
        $post = $request->all();
        try {
            DB::beginTransaction();
            if (!$post) {
                return $this->respondUnauthorized('Post Failed');
            }
            if (!$request->hasFile('image_path')) {
                return $this->respondUnauthorized('Image Upload Failed');
            } 
            
            $post['image_path'] = $this->service->uploadPostImage($post);
            $postCreate = $this->service->createPost($post);
            DB::commit();
            $data=[
                'postCreate' => $postCreate
            ];
            return respondSuccess('Inserted',$data);
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
    public function show(Post $post)
    {
        //data fetched from database in $post with where id clause
        $post = $this->post->where('id', $post)->first();
        
        // data to be sent
        $data = [
            'post' => $post,
        ];
        //response in the form of JSON
        return respondData($data);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(Post $post)
    {
        return respondData($post);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(CreatePostRequest $request,Post $post)
    {
        try {
            DB::beginTransaction();
            $post = $this->service->updatePost($request->all(),$post->id);
            DB::commit();
            if(!$post){
                return respondError('Failed', 401); 
            }
            return respondSuccess('Updated',$post);
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
    public function destroy(Post $post)
    {
        $this->service->deletePost($post->id);
        return respondSuccess('Deleted');
    }

    public function PushNotification(User $user,Post $post){
      $user = User::all();
      $data = Post::only(['title','category']);   
      Notification::send($user, new PostNotification($data));
    }
}
