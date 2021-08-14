<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientType;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $clientTypes = ClientType::all();
      Client::factory(20)->create()->each(function ($client) use ($clientTypes){
        $client->update(['client_type_id' => $clientTypes->random()->id]);
      });
    }
}
