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

if (!function_exists('get_order_id')) {
    /**
     * 根据订单ID或者用户ID获取数据库名
     * @param $userId
     * @return number
     * @throws Exception
     */
    function get_order_id($userId)
    {
        return \App\Support\Id\idClient::getInstance()->id($userId % 1024, rand(0, 4095));
    }
}