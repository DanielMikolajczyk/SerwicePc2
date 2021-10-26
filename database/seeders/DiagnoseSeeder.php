<?php

namespace Database\Seeders;

use App\Models\Diagnose;
use Illuminate\Database\Seeder;

class DiagnoseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Diagnose::create([
      'name'  => 'asd',
      'description' => 'asd',
      'price' => 100,
      'type_id' => 1
    ]);

    Diagnose::create([
      'name'  => 'asd123',
      'description' => 'asd',
      'price' => 100,
      'type_id' => 1
    ]);
    Diagnose::create([
      'name'  => 'asd124134',
      'description' => 'asd',
      'price' => 100,
      'type_id' => 1
    ]);
    Diagnose::create([
      'name'  => 'asd124124124',
      'description' => 'asd',
      'price' => 100,
      'type_id' => 1
    ]);

    Diagnose::create([
      'name'  => 'asd2',
      'description' => 'asd',
      'price' => 101,
      'type_id' => 2
    ]);

    Diagnose::create([
      'name'  => 'asd3',
      'description' => 'asd',
      'price' => 102,
      'type_id' => 3
    ]);
  }
}
