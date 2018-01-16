<?php

namespace App\Src\Repository;

use App\Entity\UserMainShop;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FormRepository
 * @package namespace App\Repository;
 */
class MainShopRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserMainShop::class;
    }

    /**
     * @param $data
     * @return UserMainShop
     */
    public static function setMainShop($data)
    {
        $userId = array_get($data, 'userId', null);
        $shopId = array_get($data, 'shopId', null);
        $model = new UserMainShop();
        $model->user_id = $userId;
        $model->shop_id = $shopId;
        $model->save();
        return $model;
    }
}