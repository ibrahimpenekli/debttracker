<?php

class PurchasedItemController extends UserDependController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$items = $this->user->purchasedItems()->paginate(25);
        return View::make('purchasedItem.index', array('user'   => $this->user,
                                                       'items'  => $items));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('purchasedItem.create', array('user' => $this->user));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $item = new PurchasedItem();
        $item->userId = $this->user->id;
        $item->description = Input::get('description');
        $item->price = Input::get('price');
        $validator = Validator::make($item->toArray(), PurchasedItem::$rules);
        if($validator->passes() && $item->push()) {
            return Redirect::action('PurchasedItemController@create')
                           ->with('message', 'Item has been added.');
        }
        return Redirect::action('PurchasedItemController@create')
                       ->with('message', 'Item not added.')
                       ->withInput();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// Ignore
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('purchasedItem.edit', array('user' => $this->user,
													  'item' => PurchasedItem::find($id)));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$item = PurchasedItem::find($id);
        $item->userId = $this->user->id;
        $item->description = Input::get('description');
        $item->price = Input::get('price');
        $validator = Validator::make($item->toArray(), PurchasedItem::$rules);
        if($validator->passes() && $item->push()) {
            return Redirect::action('PurchasedItemController@edit', array($id))
                           ->with('message', 'Item has been saved.');
        }
        return Redirect::action('PurchasedItemController@edit', array($id))
                       ->with('message', 'Item not saved.')
                       ->withInput();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$item = PurchasedItem::find($id);
        if($item) {
            $item->forceDelete();
            return Redirect::action('PurchasedItemController@index')
                           ->with('message', 'Item has been deleted.');
        }
        return Redirect::action('PurchasedItemController@index')
                           ->with('message', 'Item not deleted.');
	}

}