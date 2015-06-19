<?php

use Illuminate\Database\Seeder;
use App\BadmintonState;

class BadmintonTableSeeder extends Seeder {

  public function run()
  {
    DB::table('badminton_states')->delete();
    
    for($offset=0;$offset<7;$offset++){
      for ($i=0; $i < 10; $i++) {
          BadmintonState::create([
          'name'   => '羽毛球场'.$i,
          'date'    => date('Y-m-d',strtotime('+'.$offset.' day')),
          'morning'    => false,
          'afternoon'    => false,
          'evening'    => false,
        ]);
      }
    }
  }

}