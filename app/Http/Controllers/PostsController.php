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
use JWTAuth;
use App\Repositories\PostRepository;
use App\Transformers\PostTransformer;

class PostController extends Controller
{
    public function __construct(PostService $service,PostRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }
    
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        $limit  = $request->input('limit') ?? 6;
        $posts = $this->repository->list($limit);
        // return \Fractal::collection($posts, new PostTransformer, 'post');
        return $this->respondData($posts);
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
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Post Failed');
            }
            $post = $request->all();
            if ($request->hasFile('image')) {
                $post['image'] = $this->service->uploadPostImageService($post);
            } 
            
            $postCreate = $this->service->createPost($post);
            DB::commit();
            $data=[
                'postCreate' => $postCreate
            ];
            return $this->respondSuccess('Inserted',$data);
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
        // $auth = JWTAuth::parseToken()->authenticate();
        //data fetched from database in $post with where id clause
        $post = $this->post->where('id', $post)->first();
        return $this->respondData($post);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(Post $post)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($post);
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
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Post $post)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        // $post['image'] = $this->service->deletePostImage($post);
        // $delete = Post::destroy($post->id);
        $delete = $this->repository->delete($post);
        return $this->respondSuccess('Deleted', $delete);
    }
    
    public function pinned(Post $post){
        $auth = JWTAuth::parseToken()->authenticate();
        if($post->is_pinned <= 3){
            try {
                DB::beginTransaction();
                if(!$auth){
                    return $this->respondError('Failed', 401); 
                }
                $post->is_pinned = true;
                $post->save(); 
                DB::commit();
                return $this->respondSuccess('pinned');
            }
            catch (Exception $e) {
                DB::rollback();
                return $this->respondException($e);
            }
        }
        return $this->respondError('Cannot pin more than 3 posts', 500); 

    }
    
    public function pushNotification(User $user,Post $post){
        $auth = JWTAuth::parseToken()->authenticate();
        $user = User::all();
        $data = Post::find(['title','category']);   
        Notification::send($user, new PostNotification($data));
    }
    
    public function markAsRead(User $user){
        $auth = JWTAuth::parseToken()->authenticate();
        JWTAuth::user()->notifications->markAsRead();
        return $this->respondSuccess();
    }
    
    public function markAsUnread(User $user){
        $auth = JWTAuth::parseToken()->authenticate();
        JWTAuth::user()->notifications->markAsUnRead();
        return $this->respondSuccess();
    }
    
    public function HomePostSearch($term = null){
        $auth = JWTAuth::parseToken()->authenticate();
        if ($term != null) {
            $post['data'] = Post::where('title', 'like', '%'.$term.'%')
            ->orWhere('description', 'like', '%'.$term.'%')
            ->get();
            return $this->respondData($posts);
        }
        $post= Post::orderBy('created_at', 'desc');
        return $this->respondData($posts);
    }
}