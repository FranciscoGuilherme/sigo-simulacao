<?php

namespace App\Services;

class OrdersService
{
    public function orders()
    {
        return include('/app/config/storage/orders.php');
    }
}