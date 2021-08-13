<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleNames = ['Admin', 'Manager', 'Employee', 'User'];
        foreach($roleNames as $name){
          Role::create([
            'name' => $name
          ]);
        }
    }
}
