<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Order;
use App\Models\OrderType;
use App\Repositories\OrderRepository;

class OrderService
{
  public function create(array $data): Order
  {
    $orderCode = $this->generateOrderCode();

    return Order::create($data + [
      'code'          => $orderCode,
      'status_id'     => 1,
      'paid'          => 0
    ]);
  }

  public function update(int $id, array $data): Order
  {
    return Order::findOrFail($id)->update($data);
  }

  public function destroy(int $id): void
  {
    Order::findOrFail($id)->destroy($id);
  }
    
  /*
  * Generate new order code.
  */
  public function generateOrderCode(): int
  {
    return Order::all()->sortByDesc('id')->first()->id;
  }

  /*
  * Delete all orders, associated with given client id.
  */
  public function deleteClientOrders(int $id): void
  {
    Order::where('client_id', $id)->delete();
  }
}