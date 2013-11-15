<?php

class UsersController extends BaseController {

	private $user;

	public function __construct() 
	{
		$this->user = Auth::user();
   	}

	public function index()
	{
        $purchasedItems = PurchasedItem::orderBy('created_at', 'DESC')->paginate(25);
        $users = User::all();
        $stats = array();

        $totalItemPrice = PurchasedItem::sum('price');
        $votes = User::sum('closePeriodVote');
        foreach ($users as $user) {
            $stats["$user->username"] = array('total' => number_format($user->getTotalItemsPrice(), 2),
                                              'change' => number_format($user->getTotalItemsPrice() - ($totalItemPrice / $users->count()), 2),);
        }
        arsort($stats);

        $totalItemPrice = number_format($totalItemPrice, 2);
		return View::make('users.index', array('user' => $this->user,
                                               'users' => $users,
                                               'items' => $purchasedItems,
                                               'stats' => $stats,
                                               'votes' => $votes,
                                               'totalItemPrice' => $totalItemPrice));
	}

    public function purchasedItems() 
    {
        $purchasedItems = $this->user->purchasedItems()->paginate(25);
        return View::make('users.purchases.list', array('user'   => $this->user,
                                                        'items'  => $purchasedItems));
    }

    public function postClosePeriodVote() {
        if($this->user->closePeriodVote) {
            return Redirect::action('UsersController@index')
                           ->with('vote-message', 'Already voted.');
        }
        $this->user->closePeriodVote = true;
        if ($this->user->push()) {
            $votes = User::sum('closePeriodVote');
            if($votes == User::count('id')) {
                $this->closePeriod();
                return Redirect::action('UsersController@index')
                               ->with('vote-message', 'New period has been opened!');
            } 
            return Redirect::action('UsersController@index')
                           ->with('vote-message', 'Voted!');
        }
        return Redirect::action('UsersController@index')
                       ->with('vote-message', 'Vote failed.');
    }

    private function closePeriod() {
        return DB::transaction(function() {
            DB::table('Users')->update(array('closePeriodVote' => false));
            DB::table('PurchasedItems')->update(array('deleted_at' => Carbon::now()->toDateTimeString()));
        });
    }

    public function getDebts() {
        $debts = $this->user->debts;
        $incomes =$this->user->incomes;
        return View::make('users.debts.list', array('user'   => $this->user,
                                                    'debts'  => $debts,
                                                    'incomes'  => $incomes));
    }

    public function getAddDebt() {
        $allUsers = User::all();
        $users = array();
        foreach($allUsers as $user) {
            if($user->id != $this->user->id) {
                $users["$user->id"] = $user->username;
            }
        }
        return View::make('users.debts.create', array('user' => $this->user,
                                                      'users' => $users));
    }

    public function postAddDebt() {
        $debt = new Debt();
        $debt->payerId = $this->user->id;
        $debt->payeeId = (int) Input::get('payeeId');
        $debt->description = Input::get('description');
        $debt->amount = Input::get('amount');
        
        $validator = Validator::make($debt->toArray(), Debt::$rules);
        if($validator->passes() && $debt->push()) {
            return Redirect::action('UsersController@getAddDebt')
                           ->with('message', 'Debt has been added.');
        }
        return Redirect::action('UsersController@getAddDebt')
                       ->with('message', 'Debt not added.')
                       ->withInput();
    }

    public function getAddPurchasedItem() {
        return View::make('users.purchases.create', array('user' => $this->user));
    }

    public function postAddPurchasedItem() {
        $purchasedItem = new PurchasedItem();
        $purchasedItem->userId = $this->user->id;
        $purchasedItem->description = Input::get('description');
        $purchasedItem->price = Input::get('price');
        $validator = Validator::make($purchasedItem->toArray(), PurchasedItem::$rules);
        if($validator->passes() && $purchasedItem->push()) {
            return Redirect::action('UsersController@getAddPurchasedItem')
                           ->with('message', 'Item has been added.');
        }
        return Redirect::action('UsersController@getAddPurchasedItem')
                       ->with('message', 'Item not added.')
                       ->withInput();
    }

	public function login() 
	{
        if(Auth::guest()) {
            return View::make('users.login');  
        }
        return Redirect::action('UsersController@index');
	}

	public function attempt() {
		// Get all the inputs
        $user = array(
            'username'  => Input::get('username'),
            'password'  => Input::get('password')
        );

        $rememberMe = Input::get('rememberMe') == 'on' ? true : false;

        // Validate the inputs.
        $validator = Validator::make($user, User::$rules);
        if($validator->passes()) {
            if(Auth::attempt($user, $rememberMe)) {
                return Redirect::action('UsersController@index')
                			   ->with('message', 'You have logged successfully.');
            }
        }
        return Redirect::action('UsersController@login')
        			   ->with('message', 'Wrong username or password.')
        			   ->withInput(Input::except('password'));
	}

	public function logout() 
	{
        if(Auth::check()) {
            Auth::logout();
            return Redirect::action('UsersController@login')
                           ->with('message', 'You have logged out.');
        }
        return Redirect::action('UsersController@login')
                       ->with('message', 'You logged out already.');
	}

}