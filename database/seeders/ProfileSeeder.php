<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run()
  {
    $users = User::all();
    foreach($users as $user){
      Profile::create([
        'user_id' => $user->id
      ]);
    }
  }
}
