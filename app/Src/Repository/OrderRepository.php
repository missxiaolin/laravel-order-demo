<?php

namespace App\Src\Repository;

use App\Entity\UserOrder;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FormRepository
 * @package namespace App\Repository;
 */
class OrderRepository extends BaseRepository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserOrder::class;
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
            ->setTable('user_order_' . sprintf("%02d", $userId % 10));
        return $this;
    }

    /**
     * @param $userId
     */
    public function getOrderList($userId)
    {
        $order = new UserOrder();
        $model = $order->setTableName($userId)->where(['user_id'=>$userId])->first();
        $res = $model->load('user');
        dd($res->toArray());
    }

}