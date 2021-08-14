<?php

namespace Database\Seeders;

use App\Models\ClientType;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      $clientTypes = [
        'miły', 'kłótliwy', 'sympatyczy', 'problematyczny'
      ];

      foreach($clientTypes as $type){
        ClientType::create([
          'type' => $type,
          'description' => $faker->sentences(4,true)
        ]);
      }
    }
}
