<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;
use App\Models\DetailedSemesterMarks;

use DB;
use JWTAuth;


class QueryController extends Controller
{
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
    public function store(Request $request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            \Log::info('Testing');
            $data = $request->all();
            \Log::info($data);
            $this->updateStatus($data);
            $pe = new Query;
            $pe->create($data);
            DB::commit();
            return $this->respondSuccess('Inserted',$pe);
        }
        catch (Exception $e) {
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
    public function updateStatus($request)
    {
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if(!$auth){
                return $this->respondError('Failed', 401); 
            }
              // $uid = SemesterMarks::pluck('id');
              $updateData = DB::table('detailed_semester_marks')
                    ->where('univ_roll_no', $request['univ_roll_no'])
                    ->update([
                        'verify_status'  => $request['verify_status']
                    ]);
              DB::commit(); 
            return $this->respondSuccess('Updated',$updateData);
        } catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
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
        //
    }
}
