<?php

namespace App\Http\Responses;

class ApiResponse
{
    /**
     * Formatear una respuesta exitosa
     * 
     * @param string $message
     * @param mixed $data
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public static function formatSuccess(int $statusCode = 200, string $message = null, $data = null)
    {
        $response = [
            'statusCode' => $statusCode,
        ];

        if ($message !== null) {
            $response['message'] = $message;
        }

        if ($data !== null) {
            $response['data'] = $data;
        }
        return response()->json($response, $statusCode);
    }

    /**
     * Formatear una respuesta de error
     * 
     * @param string $message
     * @param int $statusCode
     * @param mixed $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public static function formatError(int $statusCode = 500, string $message = 'Internal Server Error', $errors = null)
    {
        $response = [
            'statusCode' => $statusCode,
            'message' => $message,
        ];

        if ($errors !== null) {
            $response['errors'] = $errors;
        }
        return response()->json($response, $statusCode);
    }
}
