@extends('layout')

@section('header')
<link rel="import" href="/bower_components/paper-drawer-panel/paper-drawer-panel.html">
<link rel="import" href="/bower_components/paper-header-panel/paper-header-panel.html">
<link rel="import" href="/bower_components/paper-toolbar/paper-toolbar.html">
<link rel="import" href="/bower_components/paper-icon-button/paper-icon-button.html">
<link rel="import" href="/bower_components/iron-component-page/iron-component-page.html">
<link rel="import" href="/bower_components/paper-material/paper-material.html">
<link rel="import" href="/bower_components/iron-list/iron-list.html">
<link rel="import" href="/bower_components/paper-menu/paper-menu.html">
<link rel="import" href="/bower_components/paper-item/paper-item.html">
<link rel="import" href="/bower_components/paper-item/paper-icon-item.html">

<style is="custom-style">
    .title {
        @apply(--paper-font-title);
    }

    paper-toolbar {
        background-color: var(--paper-indigo-500);
    }

    paper-drawer-panel {
        --paper-drawer-panel-main-container: {
            background-color: #eaeaea;
        };
    }

    paper-drawer-panel {
        --paper-drawer-panel-left-drawer-container: {
            background-color: white;
        };
    }

    paper-icon-item {
        cursor: pointer;
    }
    iron-list {
        @apply(--layout-fit);
    }
    .item {
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }
    paper-menu a {
        color: var(--paper-grey-900);
        text-decoration: none;
    }
    
</style>
@stop

@section('content')
	<paper-drawer-panel class="flex">
           <!-- Left Menu -->
            <paper-header-panel drawer>
                <paper-toolbar></paper-toolbar>
                <paper-menu selected="0">
                    <a href="<%URL::action('UsersController@index')%>">
                    <paper-icon-item>
                        <iron-icon icon="dashboard" item-icon></iron-icon>
                        Dashboard
                    </paper-icon-item></a>
                    <a href="<%URL::action('PurchasedItemController@index')%>">
                    <paper-icon-item>
                        <iron-icon icon="shopping-basket" item-icon></iron-icon>
                        Shopping List
                    </paper-icon-item></a>
                    <a href="<%URL::action('DebtController@index')%>">
                    <paper-icon-item>
                        <iron-icon icon="receipt" item-icon></iron-icon>
                        Debt
                    </paper-icon-item></a>
                    <a href="<%URL::action('UsersController@logout')%>">       	
                    <paper-icon-item>
                        <iron-icon icon="exit-to-app" item-icon></iron-icon>
                        Logout
                    </paper-icon-item></a>
                </paper-menu>
            </paper-header-panel>
            
            <!-- Main Content -->
            <paper-header-panel main>
            <paper-toolbar>
                <paper-icon-button icon="menu" paper-drawer-toggle></paper-icon-button>
                <span class="title">Dashboard</span>
                <paper-icon-button icon="refresh"></paper-icon-button>
            </paper-toolbar>
            
            @yield('sub-content')
            </paper-header-panel>
        </paper-drawer-panel>
@stop