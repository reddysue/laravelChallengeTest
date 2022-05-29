<?php

namespace App\Http\Controllers;

use App\Services\IspService;
use App\Http\Utilities\HttpResponseUtility;
use Illuminate\Http\Request;

class InternetServiceProviderController extends Controller
{
    protected $ispService;
    protected $httpResponseUtility;

    public function __construct(IspService $ispService, HttpResponseUtility $httpResponseUtility)
    {
        $this->httpResponseUtility = $httpResponseUtility;
        $this->ispService = $ispService;
    }

    public function getMptInvoiceAmount(Request $request)
    {
        $result = $this->ispService->getMptAmount($request->get('month'));
        return $this->httpResponseUtility->successResponse(['data'=>$result]);
    }
    
    public function getOoredooInvoiceAmount(Request $request)
    {
        $result = $this->ispService->getOoredooAmount($request->get('month'));
        return $this->httpResponseUtility->successResponse(['data'=>$result]);
    }
}
