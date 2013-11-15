@extends('layout')

@section('content')
	<div class="grid fluid">
		<div class="row">
            <div class="span8 offset2">
            	<div class="toolbar">
                    <a class="button info" href="{{ URL::action('UsersController@index') }}"><i class="icon-home on-left"></i>Home</a>
                    <a class="button info" href="{{ URL::action('UsersController@getDebts') }}"><i class="icon-coins on-left"></i>My Debts</a>
                    <a class="button info" href="{{ URL::action('UsersController@purchasedItems') }}"><i class="icon-cart on-left"></i>My Purchased Items</a>
                    <a class="button primary" href="{{ URL::action('UsersController@getAddPurchasedItem') }}"><i class="icon-basket on-left"></i>Add Purchased Item</a>
                    <a class="button primary" href="{{ URL::action('UsersController@getAddDebt') }}"><i class="icon-dollar-2 on-left"></i>Add Debt</a>
                    <a class="button" href="{{ URL::action('UsersController@logout') }}"><i class="icon-exit on-left"></i>Logout ({{ $user->username }})</a>
            	</div>
            </div>
		</div>
	</div>
    @yield('sub-content')
@stop