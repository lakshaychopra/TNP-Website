<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Services\HomeService;
use App\Repositories\HomeRepository;


class HomeController extends Controller
{
    public function __construct(HomeService $service,HomeRepository $repository)
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
    public function show($id)
    {
        //
    }
    
    public function HomePostSearch($term = null){
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