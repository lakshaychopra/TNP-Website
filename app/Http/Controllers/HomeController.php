<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\HomePage;
use App\Repositories\HomeRepository;


class HomeController extends Controller
{
    public function __construct(HomeRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $limit  = $request->input('limit') ?? 6;
        $posts = $this->repository->list($limit);
        return $this->respondData($posts);
    }
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function showPost($postID=null)
    {
        if ($postID != null){
            $post['data'] = Post::where('id', '=', $postID)
            ->get();
            return $this->respondData($post);
        }
        $post = Post::orderBy('created_at', 'desc');
        return $this->respondData($post);
    }
    
    public function viewWidgets(HomePage $homePage)
    {
        $homePage = HomePage::all();
        return $this->respondData($homePage);
    }
    
    public function HomeCategoryView($category=null)
    {
        if ($category != null){
            $post['data'] = Post::where('category', '=', $category)
            ->orderBy('created_at', 'desc')
            ->get();
            return $this->respondData($post);
        }
        $post = Post::orderBy('created_at', 'desc');
        return $this->respondData($post);
    }
    
    public function HomePostSearch($term = null){
        if ($term != null) {
            $post['data'] = Post::where('title', 'like', '%'.$term.'%')
            ->get();
            return $this->respondData($post);
        }
        $post= Post::orderBy('created_at', 'desc');
        return $this->respondData($post);
    }
    
    public function viewPinned()
    {
        $data = Post::where('is_pinned', '=', true)->get();
        return $this->respondData($data);
    }
}