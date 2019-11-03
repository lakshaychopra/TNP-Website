<?php

namespace App\Http\Controllers;
use App\Models\CompanyRegistration;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompanyRegistrationRequest;


use JWTAuth;
use App\Services\CompanyRegistrationService;
use App\Repositories\CompanyRegistrationRepository;

class CompanyRegistrationController extends Controller
{
    public function __construct(CompanyRegistrationService $service,CompanyRegistrationRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }
    public function index()
    {
        $company = DB::table('registration_details')->distinct()->get(['company_name']);
        return $this->respondData($company);
    }
    public function show()
    {
        $company = DB::select('select * from registration_details');
        return $this->respondData($company);
    }
    public function store(CreateCompanyRegistrationRequest $request)
    {

        //$auth = JWTAuth::parseToken()->authenticate();
            $register = $request->all();
            $registrationCreate = $this->service->createRegistration($register);
            DB::commit();
            return $this->respondSuccess('Inserted', $registrationCreate);
       
    }
    

   
}
