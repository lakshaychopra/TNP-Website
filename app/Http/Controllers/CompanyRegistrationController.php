<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $auth = JWTAuth::parseToken()->authenticate();
        try {
            DB::beginTransaction();
            if (!$auth) {
                return $this->respondUnauthorized('Failed');
            }
            $register = $request->all();
            $registrationCreate = $this->service->createRegistration($register);
            DB::commit();
            return $this->respondSuccess('Inserted', $registrationCreate);
        }
        catch (Exception $e) {
            DB::rollback();
            return $this->respondException($e);
        }
    }

   
}
