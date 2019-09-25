<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = DB::select('select name from alumni');
       // \Log::info($company);

        return $this->respondData($company);

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
    public function store(Request $request)
    {
        //$auth = JWTAuth::parseToken()->authenticate();
         $register = $request->all();
         DB::table('alumni')->insert(
            [
                'name' => $request->input('name'),
                'pass_year' => $request->input('pass_year'), 
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'whatsapp_cont' => $request->input('whatsapp_cont'),
                'pass_year' => $request->input('pass_year'),
                'current_org' => $request->input('current_org'),
                'current_position' => $request->input('current_pos'),
                'current_organisation' => $request->input('current_org'),
                'branch_type' => $request->input('branch_type'),
                'branchies' => $request->input('branchies'),
                'job_title' => $request->input('job_title'),
                'job_location' => $request->input('job_loc'),
                'job_des' => $request->input('job_des'),
                'salary' => $request->input('salary'),
                'vacancy' => $request->input('vacancy'),
                'category' => $request->input('category'),
                'tech_req' => $request->input('tech_req'),
                'post_link' => $request->input('post_link'),
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $company = DB::table('alumni')->where('name',$request->input('name'))->get();
        return $company;
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
