<?php

namespace App\Services;

use App\Models\Client;
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
   return $this->clientRepository->create($data); 
  }

  public function update(int $id, array $data)
  {
    return $this->clientRepository->update($id,$data);
  }
}