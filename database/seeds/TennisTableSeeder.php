<?php

use Illuminate\Database\Seeder;
use App\Tennis;

class TennisTableSeeder extends Seeder {

  public function run()
  {
    DB::table('tennis')->delete();
    
    for($offset=0;$offset<7;$offset++){
      for ($i=1; $i <= 4; $i++) {
         Tennis::create([
          'name'   => '网球'.$i.'号场',
          'date'    => date('Y-m-d',strtotime('+'.$offset.' day')),
          'six2seven'    => 0,
          'seven2eight'    => 0,
          'eight2nine'    => 0,
        ]);
      }
    }
  }

}