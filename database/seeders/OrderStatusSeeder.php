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

      $data = [
        ['name' => 'przyjęty',                    'stage_number' => 1],
        ['name' => 'Oczekuje na transport',       'stage_number' => 1],
        ['name' => 'diagnoza',                    'stage_number' => 2],
        ['name' => 'oczekuje na decyzje klienta', 'stage_number' => 3],
        ['name' => 'w trakie naprawy',            'stage_number' => 4],
        ['name' => 'zakończony',                  'stage_number' => 5]
      ];

      foreach($data as $row){
        OrderStatus::create([
          'name'         => $row['name'],
          'stage_number' => $row['stage_number'],
          'description'  => $faker->sentences(2,true)
        ]);
      }
    }
}
