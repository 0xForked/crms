<?php

namespace App\Http\Traits;

use Illuminate\Http\Response;

trait ApiResponses
{

    /**
     * Build success response
     * @param string|array $data
     * @param string $description
     * @param int $code
     * @return Response|ResponseFactory
     */
    public static function successResponse(
        $data,
        $description = DEFAULT_RESPONSE_DESCRIPTION,
        $code = Response::HTTP_OK
    ) {
        return response([
            'code' => $code,
            'message' => Response::$statusTexts[$code],
            'description' => $description,
            'data' => $data,
        ], $code)->header('Content-Type', 'application/json');
    }

}
