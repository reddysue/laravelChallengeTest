<?php
namespace App\Http\Utilities;

class HttpResponseUtility
{
    public function jsonResponse($data, $statusCode, $message)
    {
        return response()->json([
            'result' => $data,
            'statusCode' => $statusCode,
            'message'=> $message
        ], $statusCode);
    }

    public function successResponse($data = null, $message = null)
    {
        return $this->jsonResponse($data, config('http_status.success') , $message ?? config('message.successMsg'));
    }
}
