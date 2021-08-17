<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{

  protected $model;

  public function __construct(Order $model)
  {
    $this->model = $model;
  }

  public function create(array $data)
  {
    $this->model::create($data);
  }

  public function update(int $id, array $data)
  {
    $this->model::findOrFail($id)->update($data);
  }

  public function destroy(int $id)
  {
    $this->model::findOrFail($id)->delete($id);
  }

  public function getLastOrderId(): int
  {
    return $this->model::all()->sortByDesc('id')->first()->id;
  }
}