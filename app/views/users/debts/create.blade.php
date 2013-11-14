@extends('users.layout')

@section('sub-content')
	<div class="grid fluid">
		<div class="row">
            <div class="span4 offset2">
                {{ Form::open(array('action' => 'UsersController@postAddDebt', 'method' => 'POST')) }}
                    <fieldset>
                        <legend data-hint="(*) Required" data-hint-position="left">Add Debt</legend>
                        {{ Form::label('payeeId', '*Whom:') }}
                        <div class="input-control select">
                            {{ Form::select('payeeId', $users) }}
                        </div>
                        {{ Form::label('description', '*Description:') }}
                        <div class="input-control text">
                            {{ Form::text('description', '', array('placeholder' => 'type a description')) }}
                            <button class="btn-clear"></button>
                        </div>
                        {{ Form::label('amount', '*Amount:') }}
                        <div class="input-control text">
                            {{ Form::text('amount', '', array('placeholder' => 'type the amount')) }}
                            <button class="btn-clear"></button>
                        </div>
                        {{ Form::submit('Add') }}
                        @if(Session::has('message'))
                            {{ Session::get('message') }}
                        @endif
                    </fieldset>
                {{ Form::close() }}
            </div>
		</div>
	</div>
@stop