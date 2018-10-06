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
            return $this->respondSuccess('Inserted', $postCreate);
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
        $auth = JWTAuth::parseToken()->authenticate();
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
        $index= Post::orderBy('created_at', 'desc')->get();
        return $this->respondSuccess('Deleted', $index);
    }
    
    public function pinned(Post $post){
        $auth = JWTAuth::parseToken()->authenticate();
        $count = Post::where('is_pinned', '=', true)->count();
        if($count < 3){
            try {
                DB::beginTransaction();
                if(!$auth){
                    return $this->respondError('Failed', 401); 
                }
                $post = DB::table('posts')
                ->where("id", '=',  $post->id)
                ->update(['is_pinned'=> true]);
                DB::commit();
                $index= Post::orderBy('created_at', 'desc')->get();
                return $this->respondSuccess('Post Pinned Successfully',$index);
            }
            catch (Exception $e) {
                DB::rollback();
                return $this->respondException($e);
            }
        }
        return $this->respondError('Cannot pin more than 3 posts', 500); 
    }
    
    public function unpinned(Post $post){
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
            $post = DB::table('posts')
            ->where("id", '=',  $post->id)
            ->update(['is_pinned'=> false]);
            DB::commit();
            $index= Post::orderBy('created_at', 'desc')->get();
            return $this->respondSuccess('Post Unpinned Successfully',$index);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
    
    public function pushNotification(Post $post){
        $auth = JWTAuth::parseToken()->authenticate();
        // \OneSignal::sendNotificationToAll("Test Message", $url = 'www.tnpgndec.com', $data = null, $buttons = null, $schedule = null);
        // $post->title, 
        // $url = "https://www.tnpgndec.com/view/".$post->id, 
        // $data = "Click here to know more",
        // $buttons = array(
            //     [
                //         "id" => "home-button", 
                //         "text"=> "Home", 
                //         "icon"=> "/images/icons/other/home.png", 
                //         "url"=> "https://www.tnpgndec.com"
                //     ], 
                //     [
                    //         "id"=> "about-button", 
                    //         "text"=> "About TnP", 
                    //         "icon"=> "/images/icons/other/about.png", 
                    //         "url"=> "https://www.tnpgndec.com/about"
                    //     ]
                    //     ),
                    //     $schedule = null
                    // );
                }
                
                public function getFirstID(Post $post){
                    $auth = JWTAuth::parseToken()->authenticate();
                    $post= Post::
                    orderBY('created_at', 'desc')->
                    pluck('id')->first();
                    return $this->respondData($post);
                }
                
                public function HomePostSearch($term = null){
                    $auth = JWTAuth::parseToken()->authenticate();
                    if ($term != null) {
                        $post['data'] = Post::where('title', 'like', '%'.$term.'%')
                        ->get();
                        return $this->respondData($post);
                    }
                    $post= Post::orderBy('created_at', 'desc');
                    return $this->respondData($post);
                }
                
                public function viewPinned(Post $post)
                {
                    $auth = JWTAuth::parseToken()->authenticate();
                    $post = Post::where('is_pinned', '=', true)->get();
                    return $this->respondData($post);
                }
            }