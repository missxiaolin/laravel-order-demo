<?php

namespace App\Src\Service;

use App\Entity\User;
use App\Src\Repository\UserRepository;

class UserService
{
    /**
     * 获取用户
     * @param $data
     * @return array
     */
    public static function getUserInfoId($data)
    {
        $result = [];
        $userId = array_get($data, 'userId', '');
        $userTable = app(UserRepository::class);

        $model = $userTable->getUserId($userId);
        if ($model) {
            /** @var User $model */
            $result = $model->toArray();
        }

        return $result;

    }

    /**
     * @param $data
     * @return array
     */
    public static function getUserOrderList($data)
    {
        $result = [];
        $userId = array_get($data, 'userId', '');
        $userTable = app(UserRepository::class);

        $model = $userTable->getUserId($userId);
        if ($model) {
            /** @var User $model */
            $result['user'] = $model->toArray();
            $orders = $model->items();
            $result['rows'] = $orders->get()->toArray();
        }

        return $result;
    }
}