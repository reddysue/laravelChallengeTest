<?php

namespace App\Http\Controllers;

use App\Services\EmployeeManagement\Applicant;
use App\Http\Utilities\HttpResponseUtility;

class JobController extends Controller
{
    protected $applicant;
    protected $httpResponseUtility;
    
    public function __construct(Applicant $applicant, HttpResponseUtility $httpResponseUtility)
    {
        $this->applicant = $applicant;
        $this->httpResponseUtility = $httpResponseUtility;
    }
    
    public function apply()
    {
        return $this->httpResponseUtility->successResponse(['data'=> $this->applicant->applyJob()]);
    }
}
