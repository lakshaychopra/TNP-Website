<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\PreviousEducation;
use App\Models\MetricsEducation;
use App\Models\DetailedSemesterMarks;
use App\Models\DisplayStudent;

use Illuminate\Http\Request;

class ExcelDataController extends Controller
{
    public function store(Request $request)
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
                $users = Excel::load($path)->get();
                if(!empty($users) && $users->count())
                {
                    foreach($users[1] as $key => $value)
                    {                        
                        $type= implode(' ',$input);
                        $data[] = [
                            'username'     =>  $value->rollno,
                            'email'        =>  $value->email,
                         // 'sem_limit'    =>  5,
                            'phone_number' =>  $value->phone,
                            'password'     =>  bcrypt($value->crn),
                            'type'         =>  $type,
                            'is_verified'  =>  true,
                            'is_active'    =>  true,
                            'created_at'   =>  Carbon::now(),
                            'updated_at'   =>  Carbon::now(),
                        ];
                        //Log::info($data);
                        $previous[] =
                        [ 
                            'univ_roll_no',
                            'board_XII',
                            'month_XII',
                            'year_XII',
                            'obtained_marks_XII',
                            'max_marks_XII',
                            'percentage_XII',
                            'institute_XII',
                            'month_Diploma',
                            'year_Diploma',
                            'obtained_marks_Diploma',
                            'max_marks_Diploma',
                            'percentage_Diploma',
                            'institute_Diploma',
                            'year_gap',
                            'jee_rank_XII'
                     ];
                        $metrics[] = [
                            'univ_roll_no',
                            'board',
                            'institute',
                            'month',
                            'year',
                            'obtained_marks',
                            'max_marks',
                            'marks_type',
                            'percentage',
                            'created_at'   =>  Carbon::now(),
                            'updated_at'   =>  Carbon::now(),
                        ];
                        $student[] = [ 
                             'univ_roll_no' ,
                             'class_roll_no' ,
                             'name' ,
                             'batch' ,
                             'whatsapp_cont' ,
                             'branch_type' ,
                             'stream' ,
                             'training_sem' ,
                             'shift' ,
                             'section' ,
                             'email' ,
                             'phone_number' ,
                             'gender',
                             'category',
                             'blood_group',
                             'height',
                             'weight',
                             'father_name',
                             'father_phone_number',
                             'mother_name',
                             'mother_phone_number',
                             'address',
                             'phone_number',
                             'city',
                             'state',
                             'district',
                             'pincode',
                             'mail_id',
                             'form_status'
                            ];
                        $sem[] = [
        
                            'univ_roll_no'             =>  $value->a,
                            'obtained_marks_1'         =>  $value->a,
                            'credits_1'                =>  $value->a,
                            'active_backlog_1'         =>  $value->a,
                            'passive_backlog_1'        =>  $value->a, 
                            'obtained_marks_2'         =>  $value->a,
                            'credits_2'                =>  $value->a,
                            'active_backlog_2'         =>  $value->a,
                            'passive_backlog_2'        =>  $value->a, 
                            'obtained_marks_3'         =>  $value->a,
                            'credits_3'                =>  $value->a,
                            'active_backlog_3'         =>  $value->a,
                            'passive_backlog_3'        =>  $value->a, 
                            'obtained_marks_4'         =>  $value->a,
                            'credits_4'                =>  $value->a,
                            'active_backlog_4'         =>  $value->a,
                            'passive_backlog_4'        =>  $value->a, 
                            'obtained_marks_5'         =>  $value->a,
                            'credits_5'                =>  $value->a,
                            'active_backlog_5'         =>  $value->a,
                            'passive_backlog_5'        =>  $value->a, 
                            'obtained_marks_6'         =>  $value->a,
                            'credits_6'                =>  $value->a,
                            'active_backlog_6'         =>  $value->a,
                            'passive_backlog_6'        =>  $value->a, 
                            'obtained_marks_7'         =>  $value->a,
                            'credits_7'                =>  $value->a,
                            'active_backlog_7'         =>  $value->a,
                            'passive_backlog_7'        =>  $value->a, 
                            'obtained_marks_8'         =>  $value->a,
                            'credits_8'                =>  $value->a,
                            'active_backlog_8'         =>  $value->a,
                            'passive_backlog_8'        =>  $value->a, 
                            'percentage_aggregate'     =>  $value->a,
                            'sgpa_aggregate'           =>  $value->a,
                            'credits_aggregate'        =>  $value->a,
                            'active_backlog_aggregate' =>  $value->a,
                            'passive_backlog_aggregate'=>  $value->a,
                            'created_at'               =>  Carbon::now(),
                            'updated_at'               =>  Carbon::now()
                    ];

                        $dataStudent[] = [
                            'univ_roll_no' =>  $value->rollno,
                            'created_at'   =>  Carbon::now(),
                            'updated_at'   =>  Carbon::now(),
                        ];   
                    }

                    if(empty($data)){
                        return $this->respondError('Failed', 401);
                    }
                    
                    $a=$this->createStudent($dataStudent);
                    $b=$this->createMetricsEducation($dataStudent);
                    $c=$this->createPreviousEducation($dataStudent);
                    $d=$this->createDetailedSemesterMarks($dataStudent);
                    DB::commit();  
                }
            }   
            catch(Exception $e){
                DB::rollback();
                return $this->respondException($e);
            }
        }
    }
    public function createStudent($request){
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $data = $request;

        //    \Log::info($data);
           // \Log::info("1");
          $student = DB::table('students')->insert($data);

            // $student = new Student;
            // $student->create($data);
            DB::commit();
            return $this->respondSuccess('Student Inserted',$student);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
                                        
    public function createMetricsEducation($request){
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $data = $request;
            $me = DB::table('metrics_education')->insert($data);


            // $me = new MetricsEducation;
            // $me->create($data);
            DB::commit();
            return $this->respondSuccess('Inserted',$me);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }

    public function createPreviousEducation($request){
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $data = $request;
            $pe = DB::table('previous_education')->insert($data);

            // $pe = new PreviousEducation;
            // $pe->create($data);
            DB::commit();
            return $this->respondSuccess('Inserted',$pe);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }

    public function createDetailedSemesterMarks($request){
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $data = $request;
            $semesterMarks = DB::table('detailed_semester_marks')->insert($data);
            DB::commit();
            return $this->respondSuccess('Inserted',$semesterMarks);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
}
