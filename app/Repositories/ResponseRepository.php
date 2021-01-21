<?php


namespace App\Repositories;


class ResponseRepository
{
    /**
     * @param $errors
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function errorResponse($errors)
    {
        return response()->json([
            'message' => 'The given data was invalid.',
            'errors' => $errors
        ])->setStatusCode(422);
    }

    /**
     * @param $msg
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function successResponse($msg)
    {
        return response()->json([
            'status' => 'success',
            'data' => $msg
        ])->setStatusCode(200);
    }

}
