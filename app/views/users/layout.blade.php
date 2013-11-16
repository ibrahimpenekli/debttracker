@extends('layout')

@section('content')
	<div class="grid fluid">
		<div class="row">
            <div class="span8 offset2">
                    <a class="button large info" href="{{ URL::action('UsersController@index') }}"><i class="icon-home on-left"></i>Home</a>
                    <a class="button large info" href="{{ URL::action('DebtController@index') }}"><i class="icon-coins on-left"></i>My Debts</a>
                    <a class="button large info" href="{{ URL::action('PurchasedItemController@index') }}"><i class="icon-cart-2 on-left"></i>My Purchased Items</a>
                    <a class="button large primary" href="{{ URL::action('PurchasedItemController@create') }}"><i class="icon-basket on-left"></i>Add Purchased Item</a>
                    <a class="button large primary" href="{{ URL::action('DebtController@create') }}"><i class="icon-dollar-2 on-left"></i>Add Debt</a>
                    <a class="button large place-right" href="{{ URL::action('UsersController@logout') }}"><i class="icon-exit on-left"></i>Logout ({{ $user->username }})</a>       	
            </div>
		</div>
	</div>
    @yield('sub-content')
@stop