<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      $statuesNames = [
        'przyjęty', 'diagnoza', 'w trakie naprawy', 'zakończony' //TODO...
      ];

      foreach($statuesNames as $name){
        OrderStatus::create([
          'name'         => $name,
          'description'  => $faker->sentences(2,true)
        ]);
      }
    }
}
