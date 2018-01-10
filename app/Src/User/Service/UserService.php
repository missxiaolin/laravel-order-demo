<?php

namespace App\Src\User\Service;

use App\Entity\User;
use App\Src\User\Repository\UserRepository;

class UserService
{
    /**
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
}