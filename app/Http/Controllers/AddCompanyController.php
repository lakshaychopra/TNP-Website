<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCompanyListRequest;   
use JWTAuth;
//use Exception;
use Excel;

use App\Models\CompanyList;
use App\Models\CompanyRegistration;
use DB;


class AddCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = DB::select('select company_name from companies');
        return $this->respondData($company);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CompanyList $company)
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
            $data = $request->only('company_name');
            $company = new CompanyList;
            $company->create($data);
            DB::commit();
            return $this->respondSuccess('Inserted',$company);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }
    public function download(CreateCompanyListRequest $request){
        $auth = JWTAuth::parseToken()->authenticate();
        $student=CompanyRegistration::select('univ_roll_no')->where('company_name',$request->input('company_name'))->get()->toArray();
        //$data=json_decode(json_encode($student),true); 
        $data=$student;
        //\Log::info($data);

             return Excel::create('registration_list', function($excel)  use ($data) 
             {
                 $excel->sheet('sheet name', function($sheet) use ($data)
                 {
                     $sheet->fromArray($data);
                 });

            })->download('xlsx');
           // return $this->respondSuccess('Inserted',$pe);
              

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyList $company)
    {
        return $this->respondData($company);
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
        $auth = JWTAuth::parseToken()->authenticate();
        $company = CompanyList::where('company_name',$id)->delete();        
        return response()->json(['message' => 'Company deleted!']);
    }
}
