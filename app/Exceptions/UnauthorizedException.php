<?php

namespace App\Exceptions;

use Exception;

class UnauthorizedException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'result' => null,
            'statusCode' => config('http_status.serverError'),
            'message' => empty($this->getMessage()) ? config('message.notFoundMsg') : $this->getMessage(),
        ], config('http_status.serverError'));
    }
}
