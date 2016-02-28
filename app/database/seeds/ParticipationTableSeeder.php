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
				'userId'		=> 2,
				'itemId' 	    => 1,
			));
            
        Participation::create(
			array(
				'userId'		=> 5,
				'itemId' 	    => 1,
			));
            
        Participation::create(
			array(
				'userId'		=> 2,
				'itemId' 	    => 2,
			));
            
        Participation::create(
			array(
				'userId'		=> 1,
				'itemId' 	    => 3,
			));
            
            Participation::create(
			array(
				'userId'		=> 4,
				'itemId' 	    => 3,
			));
            
       Participation::create(
			array(
				'userId'		=> 5,
				'itemId' 	    => 4,
			));
            
        Participation::create(
			array(
				'userId'		=> 5,
				'itemId' 	    => 5,
			));
            
        Participation::create(
			array(
				'userId'		=> 2,
				'itemId' 	    => 5,
			));
            
        Participation::create(
			array(
				'userId'		=> 3,
				'itemId' 	    => 6,
			));
            
        Participation::create(
			array(
				'userId'		=> 4,
				'itemId' 	    => 6,
			));
            
        Participation::create(
			array(
				'userId'		=> 5,
				'itemId' 	    => 6,
			));
        Participation::create(
			array(
				'userId'		=> 4,
				'itemId' 	    => 7,
			));		
            
        Participation::create(
			array(
				'userId'		=> 3,
				'itemId' 	    => 8,
			));		
	}

}