<?php

/**
 *
 * @param array $data
 * @return json
 */
function response_success($data = [])
{
    $response = [
        'code' => 0,
        'message' => null,
        'data' => $data,
    ];
    return response()->json($response);
}

/**
 *
 * @param string $errorMessage
 * @param string $errorCode
 * @param array $error
 * @return json
 */
function response_error($errorMessage, $errorCode, $error = [])
{
    $response = [
        'code' => $errorCode,
        'message' => $errorMessage,
        'error' => $error,
    ];
    return response()->json($response);
}