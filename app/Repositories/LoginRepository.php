<?php

namespace App\Repositories;

use App\Models\User;
use Auth;

class LoginRepository extends BaseRepository
{
    protected $model;
    
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function isAlreadyRegistered($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function login($request, $data)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!$token = Auth::attempt($login)) {
            return false;
        }

        return ['data' => $data, 'token' => $data->createToken('User-Token')->plainTextToken];
    }
}
