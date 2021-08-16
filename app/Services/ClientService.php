<?php

namespace App\Services;

use App\Models\Client;
use App\Models\ClientType;
use App\Repositories\ClientRepository;

class ClientService
{
  protected $clientRepository;

  public function __construct(ClientRepository $clientRepository)
  {
    $this->clientRepository = $clientRepository;
  }

  public function create(array $data): Client
  {
    $client = Client::with('clientType')->get();
    dd($client->clientType);
    return Client::create(
      $data 
    );
  }

}