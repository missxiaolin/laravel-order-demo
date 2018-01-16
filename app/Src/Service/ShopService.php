<?php

namespace App\Src\Service;

use App\Src\Repository\MainShopRepository;
use App\Src\Repository\ShopRepository;
use App\Src\Repository\UserRepository;

class ShopService
{
    /**
     * @param $data
     * @return \App\Entity\Shop
     * @throws \Exception
     */
    public static function create($data)
    {
        $userId = array_get($data, 'userId', '');
        $userTable = app(UserRepository::class);
        $model = $userTable->getUserId($userId);
        if (!$model){
            throw new \Exception('未找到改用户');
        }
        $shop_model = ShopRepository::setShop($data);
        $data['shopId'] = $shop_model->id;
        MainShopRepository::setMainShop($data);
        return $shop_model;
    }
}