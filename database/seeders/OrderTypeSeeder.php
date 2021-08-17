<?php

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderTypeSeeder extends Seeder
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
        'laptop', 'komputer', 'xbox', 'playStation', 'radio'
      ];

      foreach($typesNames as $name){
        OrderType::create([
          'name' => $name,
          'description' => $faker->sentences(2,true)
        ]);
      }
    }
}
