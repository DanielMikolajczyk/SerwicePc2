<?php

namespace App\Services;

use App\Models\OrderStatus;

class OrderStatusService
{
  public function create(array $data): OrderStatus
  {
    return OrderStatus::create($data);
  }

  public function update(int $id, array $data): void
  {
    OrderStatus::findOrFail($id)->update($data);
  }

  public function destroy(int $id): void
  {
    OrderStatus::findOrFail($id)->delete();
  }
}