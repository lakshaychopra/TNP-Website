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
        $input = $request->only('type');
        if($request->hasFile('excel'))
        {
            try
            {
                DB::beginTransaction();
                $type = $request->only('type');
                $path = $request->file('excel')->getRealPath();
                $user = Excel::load($path)->get();
                
                if(!empty($user) && $user->count())
                {
                    foreach ($user as $key => $value)
                    {
                        $type= implode(' ',$input);
                        $password=str_random(6);
                        $data[] = [
                            'username'     =>  $value->username,
                            'email'        =>  $value->email,
                            'phone_number' =>  $value->phone_number,
                            'type'         =>  $value->type,
                            'type'         =>  $type,
                            'password'     =>  bcrypt($password),
                        ];
                    }
                    if(empty($data)){
                        return $this->respondError('Insertion Failed', 401);
                    }
                    $inserted = DB::table('users')->insert($data);
                    DB::commit();    
                    return $this->respondSuccess('Inserted',$data);
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
    
    
    public function downloadExcelFile(){
        $user = User::where('is_active',0)->get()->toArray();
        return \Excel::create('user', function($excel) use ($user) {
            $excel->sheet('User data', function($sheet) use ($user)
            {
                $sheet->fromArray($user);
            });
        })->download('xlsx');
    }      
    
}
