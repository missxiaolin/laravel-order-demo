<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\CodeException;
use App\Http\Controllers\Controller;
use App\Src\Basic\Filter;
use App\Src\Form\User\InfoForm;
use App\Src\Repository\UserTokenRepository;
use App\Src\Service\UserService;
use App\Support\Enums\ErrorCode;

class UserController extends Controller
{
    /**
     * 获取用户
     * @param Filter $filter
     * @param InfoForm $form
     * @return \json
     * @throws CodeException
     * @throws \ReflectionException
     * @throws \xiaolin\Enum\Exception\EnumException
     */
    public function info(Filter $filter, InfoForm $form)
    {
        $response = [];
        $data = $filter->getData();
        $form->validate($data);

        try {
            $response = UserService::getUserInfoId($data);
        } catch (\Exception $e) {
            throw new CodeException(ErrorCode::$ENUM_SYSTEM_ERROR);
        }

        return response_success($response);
    }

    /**
     * 模型分表获取用户测试
     * @param Filter $filter
     * @return \json
     */
    public function token(Filter $filter)
    {
        $response = [];
        $data = $filter->getData();
        $userId = array_get($data,'userId');
        $user = app(UserTokenRepository::class)->getUser($userId);

        return response_success($user);
    }
}