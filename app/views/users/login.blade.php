@extends('layout')

@section('content')
	<div class="grid fluid">
		<div class="row">
            <div class="span4 offset4">
                {{ Form::open(array('action' => 'UsersController@attempt', 'method' => 'POST')) }}
                    <fieldset>
                        <legend>User Login</legend>

                        <label for="username">Username:</label>
                        <div class="input-control text">
                            <input name="username" id="username" type="text" value="" placeholder="type username"/>
                            <button class="btn-clear"></button>
                        </div>
                        <label for="password">Password:</label>
                        <div class="input-control text">
                            <input name="password" id="password" type="password" value="" placeholder="type password"/>
                            <button class="btn-clear"></button>
                        </div>

                        <input type="submit" value="Login">
                        <div class="input-control checkbox">
                            <label>
                                <input name="rememberMe" id="rememberMe" type="checkbox" />
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