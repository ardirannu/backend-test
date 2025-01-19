<?php

namespace App\Helpers;

class Response
{
    public static function success($data = [], $message, $statusCode = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    public static function error($message = 'Error', $statusCode = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $statusCode);
    }

    public static function fromException(\Exception $exception, $statusCode = 500)
    {
        return response()->json([
            'status' => 'error',
            'message' => $exception->getMessage(),
        ], $statusCode);
    }
}
