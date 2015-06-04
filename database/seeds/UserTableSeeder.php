<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {

  public function run()
  {
    DB::table('users')->delete();

    
      User::create([
        'name'   => '吴雷',
        'email'    => '201211211016@mail.bnu.edu.cn',
        'password'    => '201211211016',
        'studentid' => '201211211016',
      ]);
    
  }

}