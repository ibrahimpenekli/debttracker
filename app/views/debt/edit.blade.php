@extends('users.layout')

@section('sub-content')
	<div class="grid fluid">
		<div class="row">
            <div class="span4 offset2">
                {{ Form::open(array('action' => array('DebtController@update', $debt->id), 'method' => 'PUT')) }}
                    <fieldset>
                        <legend data-hint="(*) Required" data-hint-position="left">Edit the Debt</legend>
                        {{ Form::hidden('id', $debt->id); }}
                        {{ Form::label('payeeId', '*Whom:') }}
                        <div class="input-control select">
                            {{ Form::select('payeeId', $users, $debt->payeeId) }}
                        </div>
                        {{ Form::label('description', '*Description:') }}
                        <div class="input-control text">
                            {{ Form::text('description', $debt->description, array('placeholder' => 'type a description')) }}
                            <button class="btn-clear"></button>
                        </div>
                        {{ Form::label('amount', '*Amount:') }}
                        <div class="input-control text">
                            {{ Form::text('amount', $debt->amount, array('placeholder' => 'type the amount')) }}
                            <button class="btn-clear"></button>
                        </div>
                        {{ Form::submit('Save', array('class' => 'default')) }}
                        @if(Session::has('message'))
                            {{ Session::get('message') }}
                        @endif
                    </fieldset>
                {{ Form::close() }}
            </div>
		</div>
	</div>
@stop