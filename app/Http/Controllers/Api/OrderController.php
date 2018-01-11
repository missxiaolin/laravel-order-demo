<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Src\Service\UserService;

class OrderController extends Controller
{
    public function orderList()
    {
        $data = request()->all();
        $rules = [
            'userId' => 'required',
        ];

        $validator = validator($data, $rules);
        if ($validator->fails()) {
            return response_error('参数错误', 20000);
        }

        try {
            $response = UserService::getUserOrderList($data);
        } catch (\Exception $e) {
            return response_error($e->getMessage(), 20000);
        }
        return response_success($response);
    }
}