<?php

namespace App\Services;

use App\Models\OrderType;

class OrderTypeService
{
  public function create(array $data): OrderType
  {
    return OrderType::create($data);
  }

  public function update(int $id, array $data): void
  {
    OrderType::findOrFail($id)->update($data);
  }

  public function destroy(int $id): void
  {
    OrderType::findOrFail($id)->delete();
  }
}