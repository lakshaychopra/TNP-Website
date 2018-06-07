<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
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
        // return view('welcome');
    }

    /**
     * Post Login request
     * @param Request $request
     * @return authentication and login view
     */
    public function store(Request $request)
    {
        //log the user in
        $credentials = $request->only('username', 'password');
        // run the validation rules on the inputs from the form
        $validator = Validator::make($credentials, User::createLoginRule(), User::postLoginMessages());

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()->all()->withInput(Input::except('password'))], 422);
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
                            return response()
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
                            return response()
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
                            return response()
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
                            return response()->json([
                                'success' => $success,
                                'type' => $user,
                            ],
                                $this->successStatus);
                            break;
                        default:
                            // return redirect()->back();
                            return response()->json(['error' => 'Unauthorized'], 401);
                            break;
                    }
                } else {
                    // return redirect()->back();
                    return response()->json(['error' => 'Unauthorized'], 401);
                }
            } else {
                // return redirect()->back();
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        }
    }
    // app/controllers/HomeController.php
    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('auth/login'); // redirect the user to the login screen
    }
}