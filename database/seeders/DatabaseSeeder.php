<?php

namespace Database\Seeders;

use App\Models\Departament;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          DepartamentSeeder::class,
          RoleSeeder::class,
          PermissionSeeder::class,
          UserSeeder::class,
        ]);
    }
}
