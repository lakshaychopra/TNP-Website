<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use DB;
use Validator;


class PostsController extends Controller
{
    public function __construct(Post $post)
    {
        //constructor created using dependency injection
        $this->post = $post;
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
        //response in the form of JSON
        return response()->json($data);
        
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //request inputs
        $inputs = $request->only('title', 'body', 'author', 'author_id', 'tag', 'category');
        
        // run the validation rules on the inputs from the form
        $validator = Validator::make($inputs, Post::createPostRule(), Post::postRulesMessages());
        
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator) // send back all errors to the login form
            ->withInput(); // send back the input (not the password) so that we can repopulate the form
        } else {
            try {
                
                DB::beginTransaction();
                $post = $this->post->create($inputs);
                DB::commit();
                // data to be sent 
                $data = [
                    'post' => $post,
                ];
                //response in the form of JSON
                return response()->json($data);
                
            } catch (Exception $e) {
                DB::rollback();
                
            }
        }
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
    
}
