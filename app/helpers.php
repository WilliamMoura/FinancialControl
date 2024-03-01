<?php

if (! function_exists('responseHTTP')) {
    function responseHTTP(int $statusCode, $message = null, $data = null): Illuminate\Http\JsonResponse
    {
        return response()->json([
            'status_code' => $statusCode,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}

if (! function_exists('currentUser')) {
    function currentUser()
    {
        // return (new GetCredentialsHeader (request()))->credentialUser();
    }
}
