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
    
    public function store(CreateCompanyRegistrationRequest $request)
    {

        //$auth = JWTAuth::parseToken()->authenticate();
            $register = $request->all();
            $registrationCreate = $this->service->createRegistration($register);
            DB::commit();
            return $this->respondSuccess('Inserted', $registrationCreate);
       
    }
    

   
}
