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
            ->setTable('user_' . sprintf("%02d", $userId % 10));
        return $this;
    }

    public function getOrderList()
    {

    }

}