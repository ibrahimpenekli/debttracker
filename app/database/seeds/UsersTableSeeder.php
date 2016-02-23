<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('Users')->truncate();

		User::create(
			array(
				'password' => Hash::make('123456'),
				'username' => 'ibrahim',
				'closePeriodVote' => false
			));

		User::create(
			array(
				'password' => Hash::make('123456'),
				'username' => 'ahmet',
				'closePeriodVote' => true
			));
            
        User::create(
			array(
				'password' => Hash::make('123456'),
				'username' => 'furkan',
				'closePeriodVote' => true
			));

	}

}
