<?php

namespace App\Services;

use App\Models\ClientType;

class ClientTypeService
{
  public function create(array $data): ClientType
  {
    return ClientType::create($data);
  }

  public function update(int $id, array $data): void
  {
    ClientType::findOrFail($id)->update($data);
  }

  public function destroy(int $id): void
  {
    ClientType::findOrFail($id)->delete();
  }
}