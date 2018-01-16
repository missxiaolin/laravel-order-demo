<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Src\Service\ShopService;
use App\Src\Service\UserService;

class ShopController extends Controller
{
    /**
     * 获取订单列表
     * @return \json
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
            return response_error('参数错误', 20000);
        }
        $response = [];

        try {
            $response = ShopService::create($data);
        } catch (\Exception $e) {
            return response_error($e->getMessage(), 20000);
        }
        return response_success($response);
    }

    /**
     * @return \json
     */
    public function shopList()
    {
        $data = request()->all();
        $rules = [
            'userId' => 'required',
        ];

        $validator = validator($data, $rules);
        if ($validator->fails()) {
            return response_error('参数错误', 20000);
        }
        $response = [];

        try {
            $response = UserService::getUserShop($data);
        } catch (\Exception $e) {
            return response_error($e->getMessage(), 20000);
        }
        return response_success($response);
    }
}