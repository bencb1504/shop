<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ApiController extends Controller
{
    protected function responWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60,
        ]);
    }

    public function guard()
    {
        return Auth::guard('api');
    }

    protected function responWithValidationError(array $errors)
    {
        return $response()->json([
            'status' => false,
            'error' => $errors,
        ], 400);
    }

    protected function respondServerError()
    {
        return response()->json([
            'status' => false,
            'error' => trans('messages.server_error'),
        ], 500);
    }

    protected function respondErrorMessage($message, $statusCode = 400)
    {
        return response()->json([
            'status' => false,
            'error' => $message,
        ], $statusCode);
    }

    protected function respondWithData($data)
    {
        if ($data instanceof AnonymousResourceCollection) {
            $data = $data->resource;
        }

        return response()->json([
            'status' => true,
            'data' => $data,
        ]);
    }

    protected function respondWithNoData($message)
    {
        return response()->json([
            'status' => true,
            'data' => [],
            'message' => $message,
        ]);
    }

}