@extends('users.layout')

@section('sub-content')
	<div class="grid fluid">
		<div class="row">
            <div class="span4 offset2">
                {{ Form::open(array('action' => 'UsersController@postAddPurchasedItem', 'method' => 'POST')) }}
                    <fieldset>
                        <legend data-hint="(*) Required" data-hint-position="left">Add Purchased Item</legend>
                        {{ Form::label('description', '*Description:') }}
                        <div class="input-control text">
                            {{ Form::text('description', '', array('placeholder' => 'type a description')) }}
                            <button class="btn-clear"></button>
                        </div>
                        {{ Form::label('price', '*Price:') }}
                        <div class="input-control text">
                            {{ Form::text('price', '', array('placeholder' => 'type the price')) }}
                            <button class="btn-clear"></button>
                        </div>

                        <input type="submit" value="Add">
                        @if(Session::has('message'))
                            {{ Session::get('message') }}
                        @endif
                    </fieldset>
                {{ Form::close() }}
            </div>
		</div>
	</div>
@stop