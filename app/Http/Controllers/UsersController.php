<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\CreateUserExcelRequest;
use Exception;
use Excel;
use DB;

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
        //data fetched from database in $User
        // $this->service->listUser();
        $user = Post::orderBy('created_at', 'decs')->paginate(6);
        return $this->respondData($user);
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
        $input = $request->all();
         $type = $input['type']; 

        if($request->hasFile('excel')){
            try{
                DB::beginTransaction();
                $path = $request->file('excel')->getRealPath();
                $data = \Excel::load($path)->get();
                if($data->count()){
                    foreach ($data as $key => $value) {
                        $password=str_random(6);
                        $arr[] = [
                            'username' => $value->username,
                            'name'    => $value->name, 
                            'email' => $value->email,
                            'phone_number' => $value->phone_number,
                            'type'=>$type,  
                            'password'=>bcrypt($password),
                        ];
                    }
                    if(!empty($arr)){
                        // $this->service->createUser($user);
                        $userCreate = DB::table('users')->insert($arr);
                        DB::commit();    
                        return $this->respondSuccess('Inserted',$userCreate );
                    }
                    else{
                        return $this->respondError('Post Failed', 401);
                    }
                }
            }
            catch(Exception $e){
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
    public function edit(User $user)
    {
        return $this->respondData($user);
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(CreateUserExcelRequest $request, $id)
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
