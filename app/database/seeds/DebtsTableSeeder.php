<?php

class DebtsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('Debts')->truncate();

		Debt::create(
			array(
				'payerId' => 1,
				'payeeId' => 2,
				'description' => 'kira',
				'amount' => 180
			));
            
        Debt::create(
			array(
				'payerId' => 3,
				'payeeId' => 1,
				'description' => 'ne ola ki',
				'amount' => 459
			));
	}

}
