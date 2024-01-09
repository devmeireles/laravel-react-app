<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    /**
     * Return a JSON response based on the result.
     *
     * @param array $result
     * @return JsonResponse
     */
    public function jsonResponse($result)
    {
        if ($result['success']) {
            return $this->successResponse($result['data']);
        } else {
            return $this->errorResponse($result['error'], $result['status'] ?? 500);
        }
    }

    /**
     * Return a success JSON response.
     *
     * @param mixed $data
     * @param int $status
     * @return JsonResponse
     */
    public function successResponse($data, $status = 200)
    {
        return response()->json(['data' => $data], $status);
    }

    /**
     * Return an error JSON response.
     *
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public function errorResponse($message, $status = 500)
    {
        return response()->json(['error' => $message], $status);
    }
}
