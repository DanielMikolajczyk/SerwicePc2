<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\ClientType;

class ClientRepository
{

  protected $model;

  public function __construct(Client $model)
  {
    $this->model = $model;
  }

  public function create(array $data): Client
  {
    return $this->model::create($data);
  }

  public function update(int $id, array $data)
  {
    $this->model::findOrFail($id)->update($data);
  }
}