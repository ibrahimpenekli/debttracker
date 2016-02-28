<?php

class PurchasedItemsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('PurchasedItems')->truncate();
		
		PurchasedItem::create(
			array(
				'userId'		=>	1,
				'description' 	=> 'soğan patates ekmek çikolata sallama çay',
				'price' 		=> 49.52
			));
		PurchasedItem::create(
			array(
				'userId'		=>	2,
				'description' 	=> '2 gong, portakal, muz, çerez, süt, t. kağıdı',
				'price' 		=> 46.59
			));
            
        PurchasedItem::create(
            array(
                'userId'		=>	1,
                'description' 	=> 'soda ekmek kaşar',
                'price' 		=> 25.75
            ));
        PurchasedItem::create(
            array(
                'userId'		=>	5,
                'description' 	=> 'cips t.ekmegi soda yağ krispi icecek kaşar nutella potokalr',
                'price' 		=> 53
            ));
        PurchasedItem::create(
            array(
                'userId'		=>	5,
                'description' 	=> 'şeker ekmek patates gazoz sucuk',
                'price' 		=> 32
            ));
        PurchasedItem::create(
			array(
				'userId'		=>	3,
				'description' 	=> 'soda bez sucuk peynir ekmek yumurta',
				'price' 		=> 23.52
			));
            
        PurchasedItem::create(
			array(
				'userId'		=>	4,
				'description' 	=> 'soda bez sucuasdasadsad peyniasdsaddar ekmek yumurta',
				'price' 		=> 43.5
			));
            
        PurchasedItem::create(
			array(
				'userId'		=>	3,
				'description' 	=> 'asdsa bez sucuasdasadsad asdsa ekmek yumurta',
				'price' 		=> 32.7
			));
	}

}