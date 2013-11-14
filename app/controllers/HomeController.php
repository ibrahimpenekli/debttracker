<?php

class HomeController extends BaseController {

	public function index() {
		$purchasedItems = PurchasedItem::orderBy('created_at', 'DESC')->paginate(25);
		return View::make('home.index', array('items' => $purchasedItems));
	}

}