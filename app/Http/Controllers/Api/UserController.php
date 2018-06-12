<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\CodeException;
use App\Http\Controllers\Controller;
use App\Src\Service\UserService;
use App\Support\Enums\ErrorCode;

class UserController extends Controller
{
    /**
     * 获取用户
     * @return \json
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function info()
    {
        $response = [];
        $data = request()->all();

        $rules = [
            'userId' => 'required',
        ];

        $validator = validator($data, $rules);
        if ($validator->fails()) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_API_PARAM_ERROR);
        }
        try {
            $response = UserService::getUserInfoId($data);
        } catch (\Exception $e) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_ERROR);
        }

        return response_success($response);
    }
}