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

      $orderTypes = [
        'laptop', 'komputer', 'xbox', 'playStation', 'radio'
      ];

      foreach($orderTypes as $type){
        OrderType::create([
          'type' => $type,
          'description' => $faker->sentences(2,true)
        ]);
      }
    }
}
