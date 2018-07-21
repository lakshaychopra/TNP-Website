<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;
use App\Services\HomePageService;
use App\Repositories\UserRepository;
use App\Http\Requests\HomePageRequest;
use Exception;
use Excel;
use JWTAuth;
use DB;

class HomePageController extends Controller
{
    public function __construct(HomePageService $service,HomePageRepository $repository)
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
        //
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
    public function store(HomePageRequest $request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Post Failed');
            }
            $homePage = $request->all();
            if ($request->hasFile('office_picture')) {
                $homePage['office_picture'] = $this->service->uploadPostImageService($homePage);
            } 
            
            $homePageCreate = $this->service->createPost($homePage);
            DB::commit();
            return $this->respondSuccess('Inserted', $homePageCreate);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(HomePage $homePage)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePage $homePage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePage $homePage)
    {
        //
    }
}
