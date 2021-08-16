<?php

namespace App\Repositories;

use App\Models\Client;
use App\Models\ClientType;

class ClientRepository
{

  protected $client;

  public function __construct(Client $client)
  {
    $this->client = $client;
  }


  public function getClientTypeIdByName(string $type): int
  {
    return ClientType::where('type', $type)->first()->id;
  }
}