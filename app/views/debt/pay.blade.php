@extends('users.layout')

@section('sub-content')
	<div class="grid fluid">
		<div class="row">
            <div class="span4 offset2">
                <h2><i class="icon-coins on-left"></i>You owe {{ $debt->amount }} TRY to {{ $debt->payee->username }}. ({{ $debt->description }})</h2>
                {{ Form::open(array('action' => array('DebtController@checkout', $debt->id), 'method' => 'PUT')) }}
                    <fieldset>
                        {{ Form::label('amount', 'How much you want to pay?') }}
                        <div class="input-control text">
                            {{ Form::text('amount', '', array('placeholder' => 'type the amount')) }}
                            <button class="btn-clear"></button>
                        </div>
                        {{ Form::submit('Checkout', array('class' => 'default')) }}
                        @if(Session::has('message'))
                            {{ Session::get('message') }}
                        @endif
                    </fieldset>
                {{ Form::close() }}
            </div>
		</div>
	</div>
@stop