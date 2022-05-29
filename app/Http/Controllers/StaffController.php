<?php

namespace App\Http\Controllers;

use App\Services\EmployeeManagement\Staff;
use App\Http\Utilities\HttpResponseUtility;

class StaffController extends Controller
{
    protected $staff;
    protected $httpResponseUtility;

    public function __construct(Staff $staff, HttpResponseUtility $httpResponseUtility)
    {
        $this->staff = $staff;
        $this->httpResponseUtility = $httpResponseUtility;
    }
    
    public function payroll()
    {
        return $this->httpResponseUtility->successResponse(['data'=> $this->staff->salary()]);
    }
}
