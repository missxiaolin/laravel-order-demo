<?php

namespace App\Src\Repository;

use App\Entity\Shop;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FormRepository
 * @package namespace App\Repository;
 */
class ShopRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Shop::class;
    }

    /**
     *
     * @param type $userId
     * @return FormRepository
     */
    public function table($userId)
    {
        $this->model
            ->setConnection('mysql_' . sprintf("%02d", $userId % 10))
            ->setTable('shop_' . sprintf("%02d", $userId % 10));
        return $this;
    }

    /**
     * @param $data
     * @return Shop
     */
    public static function setShop($data)
    {
        $userId = array_get($data,'userId',null);
        $name = array_get($data,'name','');
        $address = array_get($data,'address','');
        $model = new Shop();
        $model->user_id = $userId;
        $model->name = $name;
        $model->address = $address;
        $model->save();
        return $model;
    }
}