<?php

class ParticipationTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('Participations')->truncate();
		
		Participation::create(
			array(
				'userId'		=> 1,
				'itemId' 	    => 1,
			));
            
        Participation::create(
			array(
				'userId'		=> 1,
				'itemId' 	    => 2,
			));
            
        Participation::create(
			array(
				'userId'		=> 2,
				'itemId' 	    => 1,
			));
            
       Participation::create(
			array(
				'userId'		=> 3,
				'itemId' 	    => 2,
			));
            
        Participation::create(
			array(
				'userId'		=> 2,
				'itemId' 	    => 3,
			));
		
	}

}