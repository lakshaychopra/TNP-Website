<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Events\UserCreatedEvent;
use App\Repositories\UserRepository;
use App\Http\Requests\CreateUserExcelRequest;
use App\Http\Requests\CreateUserRequest;
use Exception;
use Excel;
use JWTAuth;
use DB;
use Carbon\Carbon;

class UsersController extends Controller
{
    
    public function __construct(UserService $service,UserRepository $repository)
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
        $limit  = $request->input('limit') ?? 20;
        $user = $this->repository->list($limit);
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
        $auth = JWTAuth::parseToken()->authenticate();
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
                            'type'         =>  $type,
                            'password'     =>  bcrypt($password),
                            'created_at'   =>  Carbon::now(),
                            'updated_at'   =>  Carbon::now(),
                        ];
                    }
                    if(empty($data)){
                        return $this->respondError('Insertion Failed', 401);
                    }
                    $inserted = DB::table('users')->insert($data);
                    DB::commit();  
                    $this->userCreateMail();  
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
    public function show(User $user)
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
    public function update(CreateUserRequest $request, User $user)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
            $data = $request->all();
            $post->username = $request->username;
            $post->email = $request->email;
            $post->phone_number = $request->phone_number;
            $post->type = $request->type;
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
    public function destroy(User $user)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        $delete = $this->repository->delete($user);
        return $this->respondSuccess('Deleted', $delete);
    }
    
    
    public function userExcelFile(){
        $user = User::where('is_active',0)->get()->toArray();
        return \Excel::create('user', function($excel) use ($user) {
            $excel->sheet('User data', function($sheet) use ($user)
            {
                $sheet->fromArray($user);
            });
        })->export('xlsx');
    }      
    
    public function userCreateMail(){
        $auth = JWTAuth::parseToken()->authenticate();
        $user = User::where([
            ['is_mailed','=',false],
            ['type','=','STUDENT']
            ])->get()->toArray();
            event(new UserCreatedEvent($user));
            try
            {
                if (!$auth) {
                    return $this->respondUnauthorized('Failed');
                }
                $this->respondSuccess('Mailed');
            }
            catch(Exception $e){
                $this->respondException($e);
            }
        }
        
        public function UserCreateForm(CreateUserRequest $request){
            $auth = JWTAuth::parseToken()->authenticate();
            try {
                DB::beginTransaction();
                if (!$auth) {
                    return $this->respondUnauthorized('Failed');
                }
                $user = $request->all();
                \Log::info($user);
                $userCreate = $this->service->createUser($user);
                DB::commit();
                // $this->userCreateMail();  
                event(new UserCreatedEvent($user));
                return $this->respondSuccess('User Created Successfully', $userCreate);
            }
            catch (Exception $e) {
                DB::rollback();
                return $this->respondException($e);
            }
        }
    }