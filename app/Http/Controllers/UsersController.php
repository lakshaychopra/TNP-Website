<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Excel;
use DB;
use Exception;
use App\Services\UserService;

class UsersController extends Controller
{
    public function __construct(UserService $service)
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
    public function store(CreateUserExcelRequest $request)
    {
        if($request->hasFile('user_file')){
            try{
                DB::beginTransaction();
                $path = $request->file('user_file')->getRealPath();
                $data = Excel::load($path)->get();
                if($data->count()){
                    $password=str_random(6);
                    foreach ($data as $key => $value) {
                        $arr[] = [
                            'name'    => $value->name, 
                            'username' => $value->username,
                            'email' => $value->email,
                            'phone_number' => $value->phone_number,
                            'password'=>bcrypt($password),
                            'type'=>$type
                        ];
                    }
                    if(!empty($arr)){
                        DB::table('users')->insert($arr);
                        dd('Insert Record successfully.');
                    }
                    DB::commit();    
                }
            }
            catch(Exception $e)
            {
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
    public function show($id)
    {
        //
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
