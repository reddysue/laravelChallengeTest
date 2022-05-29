<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use App\Http\Resources\LoginResource;
use App\Http\Utilities\HttpResponseUtility;

class LoginController extends Controller
{
    protected $loginService;
    protected $httpResponseUtility;

    public function __construct(LoginService $loginService, HttpResponseUtility $httpResponseUtility)
    {
        $this->httpResponseUtility = $httpResponseUtility;
        $this->loginService = $loginService;
    }

    public function login(LoginRequest $request)
    {
        $result = $this->loginService->login($request);
        return $this->httpResponseUtility->successResponse(['data'=>new LoginResource($result['data']), 'accessToken' => $result['token']]);
    }
}
