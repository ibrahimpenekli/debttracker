@extends('layout')

@section('content')
	<div class="grid fluid">
		<div class="row">
            <div class="span4 offset4">
                <h1>Debt Tracker</h1>
                {{ Form::open(array('action' => 'UsersController@attempt', 'method' => 'POST')) }}
                    <fieldset>
                        <h2><i class="icon-enter on-left"></i>User Login</h2>
                        {{ Form::label('username', 'Username:') }}
                        <div class="input-control text">
                            {{ Form::text('username', '', array('placeholder' => 'type username')) }}
                            <button class="btn-clear"></button>
                        </div>
                        {{ Form::label('password', 'Password:') }}
                        <div class="input-control password">
                            {{ Form::password('password', array('placeholder' => 'type password')) }}
                            <button class="btn-reveal"></button>
                        </div>

                        {{ Form::submit('Login', array('class' => 'default')) }}
                        <div class="input-control checkbox">
                            <label>
                                {{ Form::checkbox('rememberMe') }}
                                <span class="check"></span>
                                Remember me
                            </label>
                        </div>
                        @if(Session::has('message'))
                            <p>{{ Session::get('message') }}</p>
                        @endif
                    </fieldset>
                {{ Form::close() }}
            </div>
		</div>
	</div>
@stop