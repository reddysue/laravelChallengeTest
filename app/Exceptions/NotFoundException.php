<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'result' => null,
            'statusCode' => config('http_status.notFound'),
            'message' => empty($this->getMessage()) ? config('message.notFoundMsg') : $this->getMessage(),
        ], config('http_status.notFound'));
    }
}
