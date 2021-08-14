<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $permissionNames = [
        'browse', 'create', 'update', 'edit' //TODO...
      ];
      foreach($permissionNames as $name){
        Permission::create([
          'name' => $name,
          'slug' => Str::slug($name)
        ]);
      }
    }
}
