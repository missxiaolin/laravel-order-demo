<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\CodeException;
use App\Http\Controllers\Controller;
use App\Src\Service\ShopService;
use App\Src\Service\UserService;
use App\Support\Enums\ErrorCode;

class ShopController extends Controller
{
    /**
     * 获取订单列表
     * @return \json
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function create()
    {
        $data = request()->all();
        $rules = [
            'userId' => 'required',
            'name' => 'required',
            'address' => 'required',
        ];

        $validator = validator($data, $rules);
        if ($validator->fails()) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_PARAM_ERROR);
        }
        $response = [];

        try {
            $response = ShopService::create($data);
        } catch (\Exception $e) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_ERROR);
        }
        return response_success($response);
    }

    /**
     * @return \json
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function shopList()
    {
        $data = request()->all();
        $rules = [
            'userId' => 'required',
        ];

        $validator = validator($data, $rules);
        if ($validator->fails()) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_PARAM_ERROR);
        }
        $response = [];

        try {
            $response = UserService::getUserShop($data);
        } catch (\Exception $e) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_ERROR);
        }
        return response_success($response);
    }
}