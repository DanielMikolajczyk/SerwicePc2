<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderType;

class OrderService
{
  public function create(array $data): Order
  {
    $orderCode = $this->generateOrderCode();
    $orderTypeId = $this->getOrderTypeIdByName($data['type']);

    return Order::create($data + [
      'order_type_id' => $orderTypeId,
      'code'          => $orderCode,
      'status_id'     => 1,
      'paid'          => 0
    ]);
  }
    
  public function getOrderTypeIdByName(string $type): int
  {
    return OrderType::where('type', $type)->pluck('id')->first();
  }

  public function generateOrderCode(): int
  {
    return Order::all()->sortByDesc('id')->first()->id;
  }
}