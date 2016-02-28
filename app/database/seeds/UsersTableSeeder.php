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
                'avatar'   => 'avatar-01.svg',
				'closePeriodVote' => false
			));

		User::create(
			array(
				'password' => Hash::make('123456'),
				'username' => 'ahmet',
                'avatar'   => 'avatar-02.svg',
				'closePeriodVote' => true
			));
            
        User::create(
			array(
				'password' => Hash::make('123456'),
				'username' => 'furkan',
                'avatar'   => 'avatar-03.svg',
				'closePeriodVote' => true
			));
            
        User::create(
			array(
				'password' => Hash::make('123456'),
				'username' => 'muzaffer',
                'avatar'   => 'avatar-04.svg',
				'closePeriodVote' => true
			));
            
        User::create(
			array(
				'password' => Hash::make('123456'),
				'username' => 'burak',
                'avatar'   => 'avatar-05.svg',
				'closePeriodVote' => true
			));

	}

}
