<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\UserCreatedEvent;
use App\Events\UserSingleCreateEvent;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\CreateUserExcelRequest;
use Exception;
use Excel;
use JWTAuth;
use DB;
use Carbon\Carbon;
use App\Services\UserService;
use App\Repositories\UserRepository;

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
                        $data[] = [
                            'username'     =>  $value->rollno,
                            'email'        =>  $value->email,
                            'phone_number' =>  $value->phone,
                            'password'     =>  bcrypt($value->dob),
                            'type'         =>  $type,
                            'is_verified'  =>  true,
                            'is_active'    =>  true,
                            'created_at'   =>  Carbon::now(),
                            'updated_at'   =>  Carbon::now(),
                        ];
                    }
                    if(empty($data)){
                        return $this->respondError('Failed', 401);
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
        $auth = JWTAuth::parseToken()->authenticate();
        return $this->respondData($user);
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit(User $user)
    {
        $auth = JWTAuth::parseToken()->authenticate();
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
        if (!$auth) {
            return $this->respondUnauthorized('Failed');
        }
        $user = User::where([['is_mailed','=',false]])->get()->toArray();
        event(new UserCreatedEvent($user));
        $this->respondSuccess('Mailed');
    }
    
    public function userSingleCreateMail(){
        $auth = JWTAuth::parseToken()->authenticate();
        if (!$auth) {
            return $this->respondUnauthorized('Failed');
        }
        $user = User::where([['is_mailed','=',false]])->latest()->limit(1)->get()->toArray();
        event(new UserSingleCreateEvent($user));
        $this->respondSuccess('Mailed');
    }
    
    public function UserCreateForm(CreateUserRequest $request){
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $password = $request->only('password');
            $user = $request->all();
            $user['password'] = bcrypt(str_random(6));
            $userCreate = $this->service->createUser($user);
            DB::commit();
            $this->userSingleCreateMail();  
            return $this->respondSuccess('User Created Successfully', $userCreate);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
    
    public function UpdateFormStatus(Request $request){
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $id = $request->id;
            $user = User::find($id);
            $user->form_status = $request->form_status;
            $user->save();
            DB::commit();
            return $this->respondData($user);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
    
    public function FirstLogin(Request $request){
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $id = $request->id;
            $user = User::find($id);
            $user->is_first_login = 1;
            $user->save();
            DB::commit();
            return $this->respondData($user);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
    
    public function UpdateFormSteps(Request $request){
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $id = $request->id;
            $user = User::find($id);
            $user->student_form_step = $request->student_form_step;
            $user->save();
            DB::commit();
            return $this->respondData($user);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
}