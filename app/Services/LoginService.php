<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Repositories\LoginRepository;

class LoginService
{
    protected $loginRepo;
    
    public function __construct(LoginRepository $loginRepo)
    {
        $this->loginRepo = $loginRepo;
    }

    public function login($request)
    {
        $user = $this->loginRepo->isAlreadyRegistered($request->email);
        if (!$user) {
            throw new NotFoundException(config('message.notFoundMsg'));
        }

        $result = $this->loginRepo->login($request, $user);
        if (!$result) {
            throw new NotFoundException(config('message.invalidCredential'));
        }

        return $result;
    }
}
