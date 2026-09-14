<?php

/**
 * Success Response Helper
 *
 * @param string $message
 * @param mixed $data
 * @param int $code
 * @return \Illuminate\Http\JsonResponse
 */
if (!function_exists('successResponse')) {
    function successResponse($message = 'Success', $data = null, $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}

/**
 * Error Response Helper
 *
 * @param string $message
 * @param mixed $data
 * @param int $code
 * @return \Illuminate\Http\JsonResponse
 */
if (!function_exists('errorResponse')) {
    function errorResponse($message = 'Error', $data = null, $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}

/**
 * Validation Error Response Helper
 *
 * @param array $errors
 * @param string $message
 * @return \Illuminate\Http\JsonResponse
 */
if (!function_exists('validationErrorResponse')) {
    function validationErrorResponse($errors, $message = 'Validation failed')
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ], 422);
    }
}

/**
 * Paginated Response Helper
 *
 * @param object $paginated
 * @param string $message
 * @return \Illuminate\Http\JsonResponse
 */
if (!function_exists('paginatedResponse')) {
    function paginatedResponse($paginated, $message = 'Success')
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $paginated->items(),
            'pagination' => [
                'total' => $paginated->total(),
                'per_page' => $paginated->perPage(),
                'current_page' => $paginated->currentPage(),
                'last_page' => $paginated->lastPage(),
                'from' => $paginated->firstItem(),
                'to' => $paginated->lastItem(),
            ],
        ], 200);
    }
}
