<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $departaments = [
      'D' => 'Dominikowice',
      'B' => 'Biecz'
    ];
    foreach ($departaments as $code => $name) {
      Departament::create([
        'name' => $name,
        'code' => $code,
      ]);
    }
  }
}
