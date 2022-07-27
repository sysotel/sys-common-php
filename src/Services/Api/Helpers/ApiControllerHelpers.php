<?php

namespace SYSOTEL\APP\Common\Services\Api\Helpers;

use Alexanderpas\Common\HTTP\StatusCode;
use Illuminate\Http\JsonResponse;

trait ApiControllerHelpers
{
    /**
     * @param string $message
     * @return JsonResponse
     */
    public function successResponse(string $message): JsonResponse
    {
        return $this->response(compact('message'));
    }

    /**
     * @param array $data
     * @param StatusCode $code
     * @return JsonResponse
     */
    public function response(array $data, StatusCode $code = StatusCode::HTTP_200): JsonResponse
    {
        return response()->json($data, $code->value);
    }
}
