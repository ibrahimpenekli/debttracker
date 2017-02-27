<?php

class DebtController extends UserDependController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$debts = $this->user->debts;
        $incomes = $this->user->incomes;
        return View::make('debt.index', array('user'   => $this->user,
                                              'debts'  => $debts,
                                              'incomes'  => $incomes));
	}
    
    public function debts() {
        $debts = $this->user->debts->toArray();
        $incomes = $this->user->incomes->toArray();
            
        return Response::json(array("debts"  => $debts,
                                    "incomes"  => $incomes));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$allUsers = User::all();
        $users = array();
        foreach($allUsers as $user) {
            if($user->id != $this->user->id) {
                $users["$user->id"] = $user->username;
            }
        }
        return View::make('debt.create', array('user' => $this->user,
                                               'users' => $users));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$debt = new Debt();
        $debt->payerId = $this->user->id;
        $debt->payeeId = (int) Input::get('payeeId');
        $debt->description = Input::get('description');
        $debt->amount = Input::get('amount');
        
        $validator = Validator::make($debt->toArray(), Debt::$rules);
        if($validator->passes() && $debt->push()) {
            return Redirect::action('DebtController@create')
                           ->with('message', 'Debt has been saved.');
        }
        return Redirect::action('DebtController@create')
                       ->with('message', 'Debt not saved.')
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
		return $this->index();
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$allUsers = User::all();
        $users = array();
        foreach($allUsers as $user) {
            if($user->id != $this->user->id) {
                $users["$user->id"] = $user->username;
            }
        }
        return View::make('debt.edit', array('user' => $this->user,
        									 'debt' => Debt::find($id),
                                             'users' => $users));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$debt = Debt::find($id);
		$debt->payerId = $this->user->id;
        $debt->payeeId = (int) Input::get('payeeId');
        $debt->description = Input::get('description');
        $debt->amount = Input::get('amount');
        $validator = Validator::make($debt->toArray(), Debt::$rules);
        if($validator->passes() && $debt->push()) {
            return Redirect::action('DebtController@edit', array($id))
                           ->with('message', 'Debt has been saved.');
        }
        return Redirect::action('DebtController@edit', array($id))
                       ->with('message', 'Debt not saved.')
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
		$debt = Debt::find($id);
        if($debt) {
            $debt->forceDelete();
            return Redirect::action('DebtController@index')
                           ->with('message', 'Debt has been deleted.');
        }
        return Redirect::action('DebtController@index')
                       ->with('message', 'Debt not deleted.');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function pay($id) {
		return View::make('debt.pay', array('user' => $this->user,
        									'debt' => Debt::find($id)));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function checkout($id) {
		$debt = Debt::find($id);
		$paid = Input::get('amount');
		$debt->amount -= $paid;
		if($debt->amount <= 0.00) {
			$debt->delete();
			return Redirect::action('DebtController@index')
                       ->with('message', 'Whole debt has paid.');
		}
		if($debt->push()) {
			return Redirect::action('DebtController@pay', array($id))
                       ->with('message', 'Part of debt has paid.');
		}
		return Redirect::action('DebtController@pay', array($id))
                       ->with('message', 'Debt not paid.');
	}

}