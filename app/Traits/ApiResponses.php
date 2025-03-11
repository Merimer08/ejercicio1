<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponses
{
    protected function errorResponse($message = 'Problemas de la web', $code = Response::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'success' => false,
            'message' => $message
        ], $code);
    }

    protected function successResponse($data, $message = null, $code = Response::HTTP_OK)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}