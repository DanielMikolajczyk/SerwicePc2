<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      DepartamentSeeder::class,
      PermissionSeeder::class,
      RoleSeeder::class,
      UserSeeder::class,
      ClientTypeSeeder::class,
      ClientSeeder::class,
      OrderStatusSeeder::class,
      OrderTypeSeeder::class,
      OrderSeeder::class,
      AccessorySeeder::class
    ]);
  }
}
