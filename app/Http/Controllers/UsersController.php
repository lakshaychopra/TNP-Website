<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\PreviousEducation;
use App\Models\MetricsEducation;
use App\Models\SemesterMarks;
use App\Models\DisplayStudent;

use Illuminate\Http\Request;
use App\Events\UserCreatedEvent;
use App\Events\UserSingleCreateEvent;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\CreateUserExcelRequest;
use App\Mail\TwoFactorEmail;
use Exception;
use Excel;
use JWTAuth;
use DB;
use Mail;
use Carbon\Carbon;
use App\Services\UserService;
use App\Repositories\UserRepository;

class UsersController extends Controller
{

    public function __construct(UserService $service, UserRepository $repository)
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
        if ($request->hasFile('excel')) {
            try {
                DB::beginTransaction();
                $type = $request->only('type');
                $path = $request->file('excel')->getRealPath();

                $users = Excel::load($path)->get();

                if (!empty($users) && $users->count()) {
                    foreach ($users[1] as $key => $value) {
                        $type = implode(' ', $input);
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
                        \Log::info($value);

                        $dataStudent[] = [
                            'univ_roll_no' =>  $value->rollno,
                            'created_at'   =>  Carbon::now(),
                            'updated_at'   =>  Carbon::now(),
                        ];
                        //\Log::info($dataStudent);


                    }


                    if (empty($data)) {
                        return $this->respondError('Failed', 401);
                    }
                    $inserted = DB::table('users')->insert($data);
                    $a = $this->createStudent($dataStudent);
                    $b = $this->createMetricsEducation($dataStudent);
                    $c = $this->createPreviousEducation($dataStudent);
                    $d = $this->createSemesterMarks($dataStudent);
                    DB::commit();
                    \Log::info($inserted);
                    \Log::info($a);
                    \Log::info($b);
                    \Log::info($c);
                    \Log::info($d);

                    // $this->userCreateMail();  
                    return $this->respondSuccess('User Inserted', $dataStudent);
                }
            } catch (Exception $e) {
                DB::rollback();
                return $this->respondException($e);
            }
        }
    }

    public function createStudent($request)
    {
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
            return $this->respondSuccess('Student Inserted', $student);
        } catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }

    public function createMetricsEducation($request)
    {
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
            return $this->respondSuccess('Inserted', $me);
        } catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }

    public function createPreviousEducation($request)
    {
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
            return $this->respondSuccess('Inserted', $pe);
        } catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }

    public function createSemesterMarks($request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $data = $request;
            $semesterMarks = DB::table('semester_marks')->insert($data);

            // $semesterMarks = new SemesterMarks;
            // $semesterMarks->create($data);
            DB::commit();
            return $this->respondSuccess('Inserted', $semesterMarks);
        } catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
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
            if (!$auth) {
                return $this->respondError('Failed', 401);
            }
            $data = $request->all();
            $post->username = $request->username;
            $post->email = $request->email;
            $post->sem_limit = $request->sem_limit;
            $post->phone_number = $request->phone_number;
            $post->type = $request->type;
            $post->save();
            DB::commit();
            return $this->respondSuccess('Updated', $post);
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


    public function userExcelFile()
    {
        $user = DB::view('display_student');
        $data = json_decode(json_encode($user), true);

        return \Excel::create('user', function ($excel) use ($data) {
            $excel->sheet('Users data', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->download('xlsx');
    }

    public function userCreateMail()
    {
        $auth = JWTAuth::parseToken()->authenticate();
        if (!$auth) {
            return $this->respondUnauthorized('Failed');
        }
        $user = User::where([['is_mailed', '=', false]])->get()->toArray();
        event(new UserCreatedEvent($user));
        $this->respondSuccess('Mailed');
    }

    public function emailVerify(Request $request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        if (!$auth) {
            return $this->respondUnauthorized('Failed');
        }
        try {
            $user = User::find($request->id);
            $user->remember_token = rand(1111, 9999);
            $user->email= $request->mail;
            $user->save();
            // Mail::to($user->email)->send(new TwoFactorEmail($user));
        } catch (Exception $e) {
            return $this->respondException($e);
        }
        return $this->respondData(array('mail'=> $request->mail, 'OTP'=> $user->remember_token));
    }

    public function userSingleCreateMail()
    {
        $auth = JWTAuth::parseToken()->authenticate();
        if (!$auth) {
            return $this->respondUnauthorized('Failed');
        }
        $user = User::where([['is_mailed', '=', false]])->latest()->limit(1)->get()->toArray();
        event(new UserSingleCreateEvent($user));
        $this->respondSuccess('Mailed');
    }

    public function UserCreateForm(CreateUserRequest $request)
    {
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
        } catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }

    public function UpdateFormStatus(Request $request)
    {
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
        } catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }

    public function FirstLogin(Request $request)
    {
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
        } catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }

    public function UpdateFormSteps(Request $request)
    {
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
        } catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
}
