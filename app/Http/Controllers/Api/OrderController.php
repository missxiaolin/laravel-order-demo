<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\CodeException;
use App\Http\Controllers\Controller;
use App\Src\Service\OrderService;
use App\Src\Service\UserService;
use App\Support\Enums\ErrorCode;

class OrderController extends Controller
{
    /**
     * 获取订单列表
     * @return \json
     * @throws CodeException
     */
    public function orderList()
    {
        $data = request()->all();
        $rules = [
            'userId' => 'required',
        ];

        $validator = validator($data, $rules);
        if ($validator->fails()) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_PARAM_ERROR);
        }

        try {
            $response = UserService::getUserOrderList($data);
        } catch (\Exception $e) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_ERROR);
        }
        return response_success($response);
    }

    /**
     * with 用法
     * @return \json
     * @throws CodeException
     */
    public function lists()
    {
        $data = request()->all();
        $rules = [
            'userId' => 'required',
        ];
        $validator = validator($data, $rules);
        if ($validator->fails()) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_PARAM_ERROR);
        }

        try {
            $response = OrderService::orderList($data);
        } catch (\Exception $e) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_ERROR);
        }
        return response_success($response);
    }
}