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
    Order::destroy($id);
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
  
  /*
  * Delete all orders, associated with given order type id.
  */
  public function deleteTypeOrders(int $id): void
  {
    Order::where('type_id', $id)->delete();
  }

  /*
  * Delete all orders, associated with given order status id.
  */
  public function deleteStatusOrders(int $id): void
  {
    Order::where('status_id', $id)->delete();
  }
  
}
