<?php

class PurchasedItemsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('PurchasedItems')->truncate();
		
		PurchasedItem::create(
			array(
				'userId'		=>	1,
				'description' 	=> 'Ekmek çekyat',
				'price' 		=> 100.5
			));
		PurchasedItem::create(
			array(
				'userId'		=>	1,
				'description' 	=> 'Süt yumurta',
				'price' 		=> 15.75
			));
	}

}