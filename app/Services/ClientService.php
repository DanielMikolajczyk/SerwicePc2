<?php

namespace App\Services;

use App\Models\Client;
use App\Repositories\ClientRepository;

class ClientService
{
  public function create(array $data): Client
  {
   return Client::create($data);
  }

  public function update(int $id, array $data): Client
  {
    Client::findOrFail($id)->update($data);
    return Client::findOrFail($id);
  }

  public function delete(int $id): void
  {
    Client::findOrFail($id)->delete();
  }

  public function deleteTypeClient(int $id): void
  {
    Client::where('type_id',$id)->delete();
  }
}