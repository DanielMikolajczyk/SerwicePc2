<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $permissionNames = [
      'view order',
      'create order',
      'update order',
      'delete order',

      'view client',
      'create client',
      'update client',
      'delete client',

      'view order type',
      'create order type',
      'update order type',
      'delete order type',

      'view order status',
      'create order status',
      'update order status',
      'delete order status',

      'view client type',
      'create client type',
      'update client type',
      'delete client type',

      'view departament',
      'create departament',
      'update departament',
      'delete departament',

      'view user',
      'create user',
      'update user',
      'delete user',

      'view role',
      'create role',
      'update role',
      'delete role',
    ];
    
    foreach ($permissionNames as $name) {
      Permission::create([
        'name' => $name,
        'slug' => Str::slug($name)
      ]);
    }
  }
}
