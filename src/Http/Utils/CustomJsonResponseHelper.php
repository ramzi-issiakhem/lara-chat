<?php

namespace Ramzi\LaraChat\Http\Utils;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomJsonResponseHelper
{

    /**
     * Return a JSON response with a success message
     * @param int $code
     * @param mixed $data
     * @return JsonResponse
     */
    public static function successResponse(int $code = 200, mixed $data = []): JsonResponse
    {
        $response = [
            'status' => 'success',
            'data' => $data,
        ];

        return response()->json($response, $code);
    }

    /**
     * Return a JSON response with an error message
     * @param string $message
     * @param int $code
     * @param array|null $errors
     * @return JsonResponse
     */
    public static function errorResponse(string $message = 'Error', int $code = 500, array $errors = null): JsonResponse
    {
        $response = [
            'status' => 'error',
            'message' => $message
        ];

        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }


}
