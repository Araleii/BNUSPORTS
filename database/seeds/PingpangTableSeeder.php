<?php

use Illuminate\Database\Seeder;
use App\Pingpang;

class PingpangTableSeeder extends Seeder {

  public function run()
  {
    DB::table('pingpangs')->delete();
    
      for ($i=1; $i <= 16; $i++) {
         Pingpang::create([
          'name'   => '乒乓球'.$i.'号台',
          'date'    => date('Y-m-d'),
          'six2seven'    => 0,
          'seven2eight'  => 0,
          'eight2nine'   => 0,
        ]);
      }
    }

}