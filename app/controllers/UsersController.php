<?php

class UsersController extends UserDependController {
 
    public function users() { 
        return User::all()->toJson();
    }
    
    public function items() {
        $users = User::all()->toArray(); 
        $items = PurchasedItem::orderBy('created_at', 'DESC')->get()->toArray();
        foreach ($items as &$item) {
            $item["owner"] = $users[array_search($item["userId"], array_column($users, "id"))];
            $item["when"] = Carbon::createFromFormat('Y-m-d H:i:s', $item["created_at"])->diffForHumans();
            
            // Add participant users
            $participants = Participation::where('itemId', "=", $item["id"])->get();
            $item["participants"] = array();
            foreach ($participants as $participant) {
                $idx = array_search($participant->userId, array_column($users, "id"));
                array_push($item["participants"], $users[$idx]);
            }
        }
        return Response::json($items);
    }
    
    public function stats() {
        $users = User::all();
        $stats = array();
        foreach ($users as $user) {
            array_push($stats, array("id" => $user->id, 
                                     "total" => 0, 
                                     "change" => 0, 
                                     "username" => $user->username, 
                                     "avatar" => $user->avatar));
        }
        
        
        $items = PurchasedItem::all();
        foreach ($items as $item) {
            // Add item price to user's total who bought this item
            $idx = array_search($item->owner->id, array_column($stats, "id"));
            $stats[$idx]["total"] += $item->price;
            
            // Item price for each participant
            $participants = $item->getParticipants();
            $itemPriceEach = $item->price / count($participants);
            foreach ($participants as $participant) {
                $idx2 = array_search($item->owner->id, array_column($stats, "id"));
                $stats[$idx2]["change"] -= $itemPriceEach;
            }
        }
        
        // Update change stats 
        foreach ($stats as &$stat) {
            $stat["change"] += $stat["total"]; 
            $stat["total"] = number_format($stat["total"], 2); 
            $stat["change"] = number_format($stat["change"], 2); 
        }
        
        arsort($stats);
        
        $allStats["total"] = number_format(PurchasedItem::sum('price'), 2);
        $allStats["userStats"] = array_values($stats);
        return Response::json($allStats);
    }

	public function index()
	{
        $purchasedItems = PurchasedItem::orderBy('created_at', 'DESC')->paginate(25);
        $users = User::all();
        $stats = array();

        foreach ($users as $user) {
            $stats[$user->id] = array("total" => 0, "change" => 0, "name" => $user->username);
        }

        $allPurchasedItems = PurchasedItem::all();
        foreach ($allPurchasedItems as $item) {
            // Add item price to user's total who bought this item
            $owner = $item->owner;
            $stats[$owner->id]["total"] += $item->price;
            
            $participants = $item->getParticipants();
            
            // Item price for each participant
            $itemPriceEach = $item->price / count($participants);
            foreach ($participants as $participant) {
                $stats[$participant->id]["change"] -= $itemPriceEach;
            }
        }
        
        // Update change stats 
        foreach ($users as $user) {
            $stats[$user->id]["change"] += $stats[$user->id]["total"];
            $stats[$user->id]["total"] = number_format($stats[$user->id]["total"], 2); 
            $stats[$user->id]["change"] = number_format($stats[$user->id]["change"], 2); 
        }
        arsort($stats);
        
        $votes = User::sum('closePeriodVote');
        $totalItemPrice = number_format(PurchasedItem::sum('price'), 2);
		return View::make('users.index', array('user' => $this->user,
                                               'users' => $users,
                                               'items' => $purchasedItems,
                                               'stats' => $stats,
                                               'votes' => $votes,
                                               'totalItemPrice' => $totalItemPrice));
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