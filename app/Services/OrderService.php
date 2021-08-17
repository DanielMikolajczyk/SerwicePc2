<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderType;
use App\Repositories\OrderRepository;

class OrderService
{
  protected $orderRepository;

  public function __construct(OrderRepository $orderRepository)
  {
    $this->orderRepository = $orderRepository;
  }

  public function create(array $data)
  {
    $orderCode = $this->generateOrderCode();

    $this->orderRepository->create($data + [
      'code'          => $orderCode,
      'status_id'     => 1,
      'paid'          => 0
    ]);
  }

  public function update(int $id, array $data)
  {
    $this->orderRepository->update($id, $data);
  }

  public function destroy(int $id)
  {
    $this->orderRepository->destroy($id);
  }
    
  public function generateOrderCode(): int
  {
    return $this->orderRepository->getLastOrderId();
  }
}