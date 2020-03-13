<?php

namespace App\Http\Controllers;

use JWTAuth;
use DB;

use Illuminate\Http\Request;

class ExcelDataController extends Controller
{
    public function store(Request $request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        if (!$auth) {
            return $this->respondUnauthorized('Failed');
        }
        try {

            DB::beginTransaction();


            foreach ($request->input('f') as $value) {

                $data = [
                    'username'     =>  $value['URN'],
                    'password'     =>  bcrypt($value['CRN']),
                    'type'         =>  'Student',
                    'is_mailed'  =>  true,
                    'is_active'  =>  true,
                    'is_first_login'  =>  true,
                    'is_verified'  =>  true,
                    'status'       => 'ENABLED',
                    'is_active'    =>  true,
                    'created_at'   =>  now(),
                    'updated_at'   =>  now(),
                ];
                $previous =
                    [
                        'univ_roll_no' => $value['URN'],
                        'board_XII' => '',
                        'month_XII' => '',
                        'year_XII' => '',
                        'obtained_marks_XII' => '',
                        'max_marks_XII' => '',
                        'percentage_XII' => '',
                        'institute_XII' => '',
                        'month_Diploma' => '',
                        'year_Diploma' => '',
                        'obtained_marks_Diploma' => '',
                        'max_marks_Diploma' => '',
                        'percentage_Diploma' => '',
                        'institute_Diploma' => '',
                        'year_gap' => '',
                        'jee_rank_XII' => ''
                    ];
                $metrics = [
                    'univ_roll_no' => $value['URN'],
                    'board' => '',
                    'institute' => '',
                    'month' => '',
                    'year' => '',
                    'obtained_marks' => '',
                    'max_marks' => '',
                    'marks_type' => '',
                    'percentage' => '',
                    'created_at'   =>  now(),
                    'updated_at'   =>  now(),
                ];
                $student = [
                    'univ_roll_no' => $value['URN'],
                    'class_roll_no' => $value['CRN'],
                    'name' => '',
                    'batch' => '',
                    'branch_type' => '',
                    'stream' => '',
                    'section' => '',
                    'shift' => '',
                    'training_semester' => '',
                    'gender' => '',
                    'blood_group' => '',
                    'category' => '',
                    'height' => '',
                    'weight' => '',
                    'phone_number' => '',
                    'father_name' => '',
                    'father_phone' => '',
                    'mother_name' => '',
                    'mother_phone' => '',
                    'address' => '',
                    'city' => '',
                    'state' => '',
                    'district' => '',
                    'pincode' => '',
                    'dob' => '',
                    'whatsapp_cont' => '',
                    'mail_id' => '',
                    'phone_number' => '',
                ];
                $sem = [

                    'univ_roll_no'             => $value['URN'],
                    'obtained_marks_1'         => 0,
                    'credits_1'                => 0,
                    'active_backlog_1'         => 0,
                    'passive_backlog_1'        =>  0,
                    'obtained_marks_2'         => 0,
                    'credits_2'                => 0,
                    'active_backlog_2'         => 0,
                    'passive_backlog_2'        =>  0,
                    'obtained_marks_3'         => 0,
                    'credits_3'                => 0,
                    'active_backlog_3'         => 0,
                    'passive_backlog_3'        =>  0,
                    'obtained_marks_4'         => 0,
                    'credits_4'                => 0,
                    'active_backlog_4'         => 0,
                    'passive_backlog_4'        =>  0,
                    'obtained_marks_5'         => 0,
                    'credits_5'                => 0,
                    'active_backlog_5'         => 0,
                    'passive_backlog_5'        =>  0,
                    'obtained_marks_6'         => 0,
                    'credits_6'                => 0,
                    'active_backlog_6'         => 0,
                    'passive_backlog_6'        =>  0,
                    'obtained_marks_7'         => 0,
                    'credits_7'                => 0,
                    'active_backlog_7'         => 0,
                    'passive_backlog_7'        =>  0,
                    'obtained_marks_8'         => 0,
                    'credits_8'                => 0,
                    'active_backlog_8'         => 0,
                    'passive_backlog_8'        =>  0,
                    'percentage_aggregate'     => 0,
                    'sgpa_aggregate'           => 0,
                    'credits_aggregate'        => 0,
                    'active_backlog_aggregate' => 0,
                    'passive_backlog_aggregate' => 0,
                    'created_at'               =>  now(),
                    'updated_at'               =>  now()
                ];
                $me = DB::table('users')->insert($data);

                $stu = DB::table('students')->insert($student);
    
                $met = DB::table('metrics_education')->insert($metrics);
    
                $pe = DB::table('previous_education')->insert($previous);
    
                $semesterMarks = DB::table('detailed_semester_marks')->insert($sem);
            }
            DB::commit();

            $succ = [$me, $stu, $met, $pe, $semesterMarks];

            return $this->respondSuccess('Inserted', $succ);
        } catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }

}
