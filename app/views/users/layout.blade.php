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
<link rel="import" href="/bower_components/paper-tooltip/paper-tooltip.html">
<link rel="import" href="/bower_components/paper-fab/paper-fab.html">

<style is="custom-style">
    .title {
        @apply(--paper-font-title);
    }

    paper-drawer-panel {
        --paper-drawer-panel-left-drawer-container: {
            background-color: white;
            @apply(--shadow-elevation-2dp);
        };
    }

    paper-icon-item {
        --paper-item-selected: {
          background-color: var(--paper-grey-200);  
          color: var(--accent-color); 
        };
        cursor: pointer;
    }
    
    #avatar {
        margin: 16px;
        width: 72px;
        height: 72px;
        background: #ddd;
    }
    
    .user-info {
        @apply(--layout-horizontal);
        @apply(--layout-center);
    }
    
     .fab-add {
        position: fixed;
        top: 100px;
        right: 36px;
    }
    
    .left-toolbar {
        @apply(--layout-horizontal);
        @apply(--layout-end);
        background-color: var(--paper-indigo-600);
        padding-bottom: 16px; 
    }
    
    paper-material.content-page {
        background-color: white;
        margin-top: 64px;;
        width: 70%;
        box-sizing: border-box;
        border-radius: 2px;
        margin-bottom: 16px;
    }
    
    paper-material.content-page paper-toolbar {
        --paper-toolbar-color: var(--light-theme-text-color);
        --paper-toolbar-background: white;
        box-sizing: border-box;
        border-radius: 2px;
        border-bottom: 1px solid var(--divider-color);
    }
    
    .content-page-container {
        @apply(--layout-horizontal);
        @apply(--layout-center-justified);
        height: 100%;
    }
    
</style>

@yield('sub-header')
@stop

@section('content')
	<paper-drawer-panel>
           <!-- Left Menu -->
            <paper-header-panel drawer mode="seamed">
                <paper-toolbar class="left-toolbar medium-tall">
                    <div class="container user-info">
                        <div><iron-image sizing="contain" id="avatar" alt="<%$user->username%>" src="<%$user->avatar%>"></iron-image></div>
                        <div class="bottom title"><%$user->username%></div>
                    </div>
                </paper-toolbar>
                
                <paper-menu selected="0">
                    <paper-icon-item onclick="onMenuItemSelected('<%URL::action('UsersController@index')%>')">
                        <iron-icon icon="dashboard" item-icon></iron-icon>
                        Dashboard
                    </paper-icon-item>
                    <paper-icon-item onclick="onMenuItemSelected('<%URL::action('PurchasedItemController@index')%>')">
                        <iron-icon icon="shopping-basket" item-icon></iron-icon>
                        My Shopping List
                    </paper-icon-item>
                    <paper-icon-item onclick="onMenuItemSelected('<%URL::action('DebtController@index')%>')">
                        <iron-icon icon="receipt" item-icon></iron-icon>
                        My Debt
                    </paper-icon-item>
                    <paper-icon-item onclick="onMenuItemSelected('<%URL::action('UsersController@logout')%>')">
                        <iron-icon icon="exit-to-app" item-icon></iron-icon>
                        Logout
                    </paper-icon-item>
                </paper-menu>
            </paper-header-panel>
            
            <!-- Main Content -->
            <paper-header-panel main mode="cover">
                <paper-toolbar class="medium-tall">
                    <!-- Empty -->
                </paper-toolbar>
                
                <div class="content-page-container container">
                    <paper-material elevation="1" class="content-page cover">
                        <paper-toolbar>
                            <paper-icon-button icon="menu" paper-drawer-toggle></paper-icon-button>
                            <div class="title">Dashboard</div>
                            <paper-icon-button icon="refresh"></paper-icon-button>
                        </paper-toolbar>
                        <div class="content">
                            @yield('sub-content')
                        </div>
                    </paper-material>
                    </div>
            </paper-header-panel>
    </paper-drawer-panel>
    
    <paper-fab icon="add" class="fab-add"></paper-fab>
<script>
    function onMenuItemSelected(url) {
        window.location.assign(url);
    }
</script>
@stop