<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\UserLoginRequest;
use App\Repositories\UserRepository;


class UsersController extends Controller
{
    public $successStatus = 200;
    
    public function __construct(UserRepository $repository)
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
    * Post Login request
    * @param UserLoginRequest $request
    * @return authentication and send JSON Response
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
                    // Session::flash('msg', 'You have been logged in');
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
                    // Session::flash('msg', 'You have been logged in');
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
                    case 'STUDENT':
                    // Session::flash('msg', 'You have been logged in');
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
                    // Session::flash('msg', 'You have been logged in');
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
            } else {
                return response()->json(['error' => 'Unauthorized'], 401); //Json response with status 401 and error message
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401); //Json response with status 401 and error message
        }
    }
    // app/controllers/HomeController.php
    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('auth/login'); // redirect the user to the login screen
    }
    
    public function verifyTwoFactor(Request $request)
    {
        $request->validate([
            '2fa' => 'required',
            ]);
            
            if($request->input('2fa') == Auth::user()->token_2fa){            
                $user = Auth::user();
                $user->token_2fa_expiry = \Carbon\Carbon::now()->addMinutes(config('session.lifetime'));
                $user->save();       
                return response() //Json response with status 200 and token and user type
                    ->json([  
                        'response'=>'Authorized',
                    ],
                    $this->successStatus);
            } else {
            return response()->json(['error' => 'Incorrect code'], 401); //Json response with status 401 and error
            }
        }}