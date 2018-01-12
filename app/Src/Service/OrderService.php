<?php

namespace App\Src\Service;


use App\Src\Repository\OrderRepository;

class OrderService
{
    public static function orderList($data)
    {
        $userId = array_get($data, 'userId', null);
        $orderRepository = app(OrderRepository::class);
        $form = $orderRepository->getOrderList($userId);
        return 1;
    }
}