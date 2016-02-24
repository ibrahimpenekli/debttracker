@extends('layout')

@section('header')
<link rel="import" href="/bower_components/iron-form/iron-form.html">
<link rel="import" href="/bower_components/paper-input/paper-input.html">
<link rel="import" href="/bower_components/paper-button/paper-button.html">
<link rel="import" href="/bower_components/paper-checkbox/paper-checkbox.html">
<link rel="import" href="/bower_components/paper-input/paper-input.html">

<style is="custom-style">
    body {
        @apply(--layout-horizontal);
        @apply(--layout-center-justified);
    }
    paper-material {
        width: 400px;
        padding: 32px;
        margin-top: 96px;
        background: white;
    }

    paper-button.custom {
        --paper-button-ink-color: var(--paper-pink-a200);
        /* These could also be individually defined for each of the
            specific css classes, but we'll just do it once as an example */
        --paper-button-flat-keyboard-focus: {
            background-color: var(--paper-pink-a200);
            color: white !important;
        };
        --paper-button-raised-keyboard-focus: {
            background-color: var(--paper-pink-a200) !important;
            color: white !important;
        };
    }
    paper-button.custom:hover {
        background-color: var(--paper-indigo-400);
    }
    paper-button.indigo {
        background-color: var(--paper-indigo-500);
        color: white;
        --paper-button-raised-keyboard-focus: {
            background-color: var(--paper-pink-a200) !important;
            color: white !important;
        };
    }
</style>
@stop

@section('content')
<paper-material elevation="1" class="flex-center-justified">
    <h1>Debt Tracker v2</h1>
    <form is="iron-form" id="form" method="post" action="<%URL::action('UsersController@attempt')%>">
        <paper-input name="username" label="Username" required></paper-input>
        <paper-input name="password" label="Password" type="password" required></paper-input>
        <paper-checkbox name="rememberMe" value="rememberMe">Remember Me</paper-checkbox><br><br><br>
        <paper-button raised class="custom indigo" onclick="submitForm()">Login</paper-button>
    </form>
    
    @if(Session::has('message'))
        <p><% Session::get('message') %></p>
    @endif
</paper-material>
@stop

@section('script')
<script>
    function submitForm() {
        document.getElementById('form').submit();
        window.location.reload();
    }
</script>
@stop