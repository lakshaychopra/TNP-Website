<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Log;
use Session;
use Validator;

class UsersController extends Controller
{

    /**
     * Post Login request
     *
     * @param Request $request
     * @return authentication and login view
     */
    public function store(Request $request)
    {

        // validate the info, create rules for the inputs
        $rules = array(
            'username' => 'required|min:3', // make sure the username
            'password' => 'required|min:3', // password has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('/auth/login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            //log the user in
            //add is_active in post method
            //'is_active' => '1'
            $credentials = $request->only(['username', 'password']);
            /**
             * Attempting Authentication
             * Else Redirect Back
             */
            if (Auth::attempt($credentials)) {
                /**
                 * Switch Case for USER Type
                 */
                switch ($user = Auth::user()->type) {
                    case 'MASTER_ADMIN':
                        Session::flash('msg', 'You have been logged in');
                        return "1";
                        break;
                    case 'EXECUTIVE_MEMBER':
                        Session::flash('msg', 'You have been logged in');
                        return "2";
                        break;
                    case 'STUDENT':
                        Session::flash('msg', 'You have been logged in');
                        return "3";
                        break;
                    case 'COMPANY':
                        Session::flash('msg', 'You have been logged in');
                        return "4";
                        break;
                    default:
                        return redirect()->back();
                        break;
                }
            } else {
                return redirect()->back();
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
