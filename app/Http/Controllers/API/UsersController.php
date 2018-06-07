<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Session;
use Validator;

class UsersController extends Controller
{
    public $successStatus = 200;

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
    public function store(UserLoginRequest $request)
    {
        //log the user in
        $credentials = $request->only('username', 'password');
        // run the validation rules on the inputs from the form
        $validator = Validator::make($credentials, User::createLoginRule(), User::postLoginMessages());
        
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()], 422); // JSON response with 422 error and validations
            
            // return Redirect::to('/auth/login')
            //     ->withErrors($validator) // send back all errors to the login form
            //     ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
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
                        // return "1";
                        // $success['token'] = $userToken->createToken('GNDEC')->accessToken;
                        return response() //Json response with status 200 and token and user type
                        ->json([
                            'success' => $success,
                            'type' => $user,
                        ],
                        $this->successStatus);
                        break;
                        case 'EXECUTIVE_MEMBER':
                        // Session::flash('msg', 'You have been logged in');
                        // return "2";
                        // $success['token'] = $userToken->createToken('GNDEC')->accessToken;
                        return response() //Json response with status 200 and token and user type
                        ->json([
                            // 'success' => $success,
                            'type' => $user,
                        ],
                        $this->successStatus);
                        break;
                        case 'STUDENT':
                        // Session::flash('msg', 'You have been logged in');
                        // return "3";
                        // $success['token'] = $userToken->createToken('GNDEC')->accessToken;
                        return response() //Json response with status 200 and token and user type
                        ->json([
                            'success' => $success,
                            'type' => $user,
                        ],
                        $this->successStatus);
                        break;
                        case 'COMPANY':
                        // Session::flash('msg', 'You have been logged in');
                        // return "4";
                        // $success['token'] = $userToken->createToken('GNDEC')->accessToken;
                        return response() //Json response with status 200 and token and user type
                        ->json([  
                            'success' => $success,
                            'type' => $user,
                        ],
                        $this->successStatus);
                        break;
                        default:
                        // return redirect()->back();
                        return response()->json(['error' => 'Unauthorized'], 401); //Json response with status 401 and error message
                        break;
                    }
                } else {
                    // return redirect()->back();
                    return response()->json(['error' => 'Unauthorized'], 401); //Json response with status 401 and error message
                }
            } else {
                // return redirect()->back();
                return response()->json(['error' => 'Unauthorized'], 401); //Json response with status 401 and error message
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
        Auth::logout(); // log the user out of our application
        return Redirect::to('auth/login'); // redirect the user to the login screen
    }
}
