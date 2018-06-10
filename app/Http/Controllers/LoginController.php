<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use Exception;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\TwoFactorRequest;
use App\Repositories\LoginRepository;
use DB;

class LoginController extends Controller
{
    
    public $successStatus = 200;
    
    public function __construct(LoginRepository $repository)
    {
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
    * Store a newly created resource in storage.
    *
    * @param  App\Http\Requests\UserLoginRequest  $request
    * @return \Illuminate\Http\Response JSON
    */
    public function store(UserLoginRequest $request)
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
                /*
                * Switch Case for USER Type
                */
                switch ($user = Auth::user()->type) {
                    
                    case 'MASTER_ADMIN':
                    // $success['token'] = $userToken->createToken('GNDEC')->accessToken;
                    $this->repository->authenticated();
                    return response() //Json response with status 200 and token and user type
                    ->json([
                        // 'success' => $success,
                        'type' => $user,
                        'response'=>'Authorized',
                    ],
                    $this->successStatus);
                    break;
                    
                    case 'EXECUTIVE_MEMBER':
                    // $success['token'] = $userToken->createToken('GNDEC')->accessToken;
                    try{
                        $this->repository->authenticated();
                        return response() //Json response with status 200 and token and user type
                        ->json([
                            // 'success' => $success,
                            'type' => $user,
                            'response'=>'Authorized',
                        ],
                        $this->successStatus);
                    } 
                    catch(Exception $e)
                    {
                        DB::rollback();
                        return $this->respondException($e);
                    }
                    break;
                    
                    case 'STUDENT':
                    // $success['token'] = $userToken->createToken('GNDEC')->accessToken;
                    $this->repository->authenticated();
                    return response() //Json response with status 200 and token and user type
                    ->json([
                        // 'success' => $success,
                        'type' => $user,
                        'response'=>'Authorized',
                    ],
                    $this->successStatus);
                    break;
                    
                    case 'COMPANY':
                    // $success['token'] = $userToken->createToken('GNDEC')->accessToken;
                    $this->repository->authenticated();
                    return response() //Json response with status 200 and token and user type
                    ->json([  
                        // 'success' => $success,
                        'type' => $user,
                        'response'=>'Authorized',
                    ],
                    $this->successStatus);
                    break;
                    
                    default:
                    return response()->json(['error' => 'Unauthorized'], 401); //Json response with status 401 and error message
                    break;
                }
            } 
            else {
                return response()->json(['error' => 'Unauthorized'], 401); //Json response with status 401 and error message
            }
        } 
        else {
            return response()->json(['error' => 'Unauthorized'], 401); //Json response with status 401 and error message
        }
    }
    
    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return response()->json(); 
    }
    
    
    public function verifyTwoFactor(TwoFactorRequest $request)
    {
        if($request->input('token_2fa') == Auth::user()->token_2fa){    
            Auth::user();
            return response() //Json response with status 200 and token and user type
            ->json([  
                'response'=>'Authorized',
                'message' => 'You have been logged in'
            ],
            $this->successStatus);
        }
        else {
            return response()->json(['error' => 'Incorrect code'], 401); //Json response with status 401 and error
        }
    }
}