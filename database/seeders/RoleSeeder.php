<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Create Admin role with all permissions
    $admin = Role::create([
      'name' => 'Admin'
    ]);
    $permissions = Permission::all()->pluck('id')->toArray();
    $admin->permissions()->attach($permissions);

    $roleNames = ['Manager', 'Employee', 'User'];
    foreach ($roleNames as $name) {
      Role::create([
        'name' => $name
      ]);
    }
  }
}
