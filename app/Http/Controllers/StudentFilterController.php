<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use App\Models\Student;
use App\Models\PreviousEducation;

class StudentFilterController extends Controller
{
    public function filterStudents(){
        $countUserTable = User::where([
            // ["type", "=", "STUDENT"],
            // ["student_form_step", "=", "SUBMITTED"]
            ])->count();
        for ($i=0; $i <= 1 ; $i++) { 
            $user = User::all()
            ->get();
            // where([
                // ["type", "=", "STUDENT"],
                // ["student_form_step", "=", "SUBMITTED"]
                // ])
            return compact($user);
                // return $aadhaar_no;
            // $student = Student::where([
            //     "aadhaar_no", "=",$aadhaar_no->username
            // ])->toArray();
            // for ($j=0; $j < 3; $j++) { 

            //     $pe = PreviousEducation::where([
            //         "aadhaar_no", "=",$aadhaar_no->username
            //     ])->toArray();
            // }
            // $data[] = [
            //     'user' => $user,
            //     'student' => $student,
            //     'pe' => $pe
            // ];

            // return $data;
        }
    }
}
