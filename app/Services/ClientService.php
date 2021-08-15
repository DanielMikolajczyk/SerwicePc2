<?php

namespace App\Services;

use App\Models\Client;
use App\Models\ClientType;

class ClientService
{
  public function create(array $data): Client
  {
    $clientTypeId = $this->getClientTypeIdByName($data['type']);
    return Client::create(
      $data + ['client_type_id' => $clientTypeId]
    );
  }

  public function getClientTypeIdByName(string $type): int
  {
    return ClientType::where('type', $type)->pluck('id')->first();
  }
}