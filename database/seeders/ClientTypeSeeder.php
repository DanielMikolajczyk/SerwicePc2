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

      $typesNames = [
        'miły', 'kłótliwy', 'sympatyczy', 'problematyczny'
      ];

      foreach($typesNames as $name){
        ClientType::create([
          'name'        => $name,
          'description' => $faker->sentences(4,true)
        ]);
      }
    }
}
