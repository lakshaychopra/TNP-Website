<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use Exception;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\TwoFactorRequest;
use App\Services\LoginService;
use DB;

class LoginController extends Controller
{
    
    public $successStatus = 200;
    
    public function __construct(LoginService $service)
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
    * Store a newly created resource in storage.
    *
    * @param  App\Http\Requests\UserLoginRequest  $request
    * @return \Illuminate\Http\Response JSON
    */
    public function store(UserLoginRequest $request)
    {
        if($request->isMethod('post'))
        {
            //log the user in
            $credentials = $request->only('username', 'password');
            /*
            * Attempting Authentication
            * Else Redirect Back
            */
            if (Auth::attempt($credentials)) {
                /*
                * Checking status of user
                */
                if (Auth::user()->is_verified == 1 && Auth::user()->is_active == 1) {
                    
                    try{
                        $this->service->authenticateUser();
                        return response() //Json response with status 200 and token and user type
                        ->json([
                            'response'=>'Authorized',
                        ],
                        $this->successStatus);
                    }   
                    catch(Exception $e)
                    {
                        DB::rollback();
                        return $this->respondException($e);
                    }
                    
                }else {
                    return response()->json(['error' => 'Unauthorized'], 401); //Json response with status 401 and error message
                }
            }else {
                return response()->json(['error' => 'Unauthorized'], 401); //Json response with status 401 and error message
            }
        }
    }
    
    
    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        Session::flush();
    }
    
    
    
    public function verifyTwoFactor(TwoFactorRequest $request)
    {
        if($request->isMethod('post')){
            if($request->input('token_2fa') == Auth::user()->token_2fa){    
                $user = Auth::user();
                return response() //Json response with status 200 and token and user type
                ->json([  
                    'response'=>'Authorized',
                    'message' => 'You have been logged in',
                    'id' => $user->id,
                    'type' => $user->type,
                ],
                $this->successStatus);
            }
            else {
                return response()->json(['error' => 'Incorrect code'], 401); //Json response with status 401 and error
            }
        }
    }
    
}