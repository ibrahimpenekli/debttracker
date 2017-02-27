@extends('users.layout')

@section('sub-header')
<style is="custom-style">
    iron-list {
        @apply(--layout-flex);
        width: 100%;
        height: 100%;
    }
    
    .purchased-list-item {
        @apply(--layout-horizontal);
        @apply(--layout-justified);
        height: 64px;
    }
    .purchased-list-item .avatar {
        width: 48px;
        height: 48px;  
        margin: 8px 16px 8px 16px;
    }
    
    .purchased-list-item .body {
        @apply(--layout-flex);
    }
    .purchased-list-item .body .description {
        @apply(--paper-font-body1);
        margin-top:4px;
    }
    .participant {
        display: inline-block;
    }
    .mini-avatar {
        width: 18px;
        height: 18px;
        margin: 2px;
    }
    
    .purchased-list-item .detail {
        margin: 16px;
        display: block;
    }
    .purchased-list-item:hover {
        background: #eaeaea; }
    .purchased-list-item .detail .price {
        @apply(--paper-font-body2);
    }
    .purchased-list-item .detail .when {
        font: var(--paper-font-caption);
        color: var(--secondary-text-color);
    }
    
    
</style>
@stop

@section('sub-content')
<template is="dom-bind">
    <iron-ajax url="http://localhost:8888/api/items" handle-as="json" last-response={{items}} auto></iron-ajax>
    <iron-ajax url="http://localhost:8888/stats" handle-as="json" last-response={{stats}} auto></iron-ajax>
    
    <div class="list-container">
        <iron-list items="[[items]]" as="item">
            <template>
                <div class="container purchased-list-item">
                    <iron-image class="avatar" alt="[[item.owner.username]]" sizing="contain" src="[[item.owner.avatar]]"></iron-image>
                    <div class="body">
                        <div class="description">[[item.description]]</div>
                        <div class="participants">
                            <template is="dom-repeat" items="{{item.participants}}" as="participant">
                                <div class="participant">
                                    <iron-image id="id_{{index}}" class="mini-avatar" alt="{{participant.username}}" sizing="contain" src="{{participant.avatar}}"></iron-image> 
                                    <paper-tooltip animation-delay="0" offset="0">{{participant.username}}</paper-tooltip>
                                </div>
                            </template>              
                        </div>
                    </div>
                    <div class="detail">
                        <div class="price">₺[[item.price]]</div>
                        <div class="when">[[item.when]]</div>
                    </div>
                </div>
            </template>
        </iron-list>
    </div>
</template>

<script>
    Polymer({
        is: 'people-list',
        properties: {
            items: {
                type: Array
            }
        },
        ready: function () {
            document.addEventListener("scroll", function () {
                // fire iron-resize event to trigger redraw of iron-list
                document.querySelector('iron-list').fire('iron-resize');
            });
        }
    });
</script>
	<!--<div class="grid fluid">
        <div class="row">
            <div class="span5 offset2">
                <h2><i class="icon-cart on-left"></i>Recently Purchased Items</h2>
                <table class="table bordered hovered">
                    <thead>
                        <tr>
                            <th class="text-left">Who</th>
                            <th class="text-left">Description</th>
                            <th class="text-left">Price (TRY)</th>
                            <th class="text-left">Date</th>
                            <th class="text-left">Participants</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->owner->username }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->diffForHumans() }}</td>
                            <td>@foreach ($item->getParticipants() as $p)
                                {{ $p->username }} 
                                @endforeach</td>
                        </tr>   
                    @endforeach
                    </tbody>
                </table>
                {{ $items->links() }}
            </div>
            <div class="span3">
                <h2><i class="icon-stats-2 on-left"></i>Stats</h2>
                <table class="table bordered hovered">
                    <thead>
                        <tr>
                            <th class="text-left">Who</th>
                            <th class="text-left">Total (TRY)</th>
                            <th class="text-left">How to Balance?</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stats as $username => $val)
                        <tr>
                            <td>{{ $val['name'] }}</td>
                            <td>{{ $val['total'] }}</td>
                            <td>
                                @if ($val['change'] > 0)
                                    <span class="fg-green"><strong><i class="icon-plus-2 on-left"></i>
                                @elseif($val['change'] < 0)
                                    <span class="fg-crimson"><strong><i class="icon-minus-2 on-left"></i>
                                @else
                                    <span class="fg-cyan"><strong><i class="icon-checkmark on-left"></i>
                                @endif
                                {{ str_replace('-', '', $val['change']) }}
                            </strong></span></td>
                        </tr>   
                        @endforeach
                        <tr>
                            <td><strong>Total:</strong></td>
                            <td><strong>{{ $totalItemPrice }}</strong></td>
                            <td></td>
                        </tr>   
                    </tbody>
                </table>
                {{ Form::open(array('action' => 'UsersController@postClosePeriodVote', 'method' => 'POST')) }}
                <a class="command-button default place-right" href="javascript:void(0)" onclick="$(this).closest('form').submit()">
                    <i class="icon-thumbs-up on-left"></i>
                    Close The Period ({{ $votes }} / {{ $users->count() }})
                    <small>
                    @if(Session::has('vote-message'))
                        {{ Session::get('vote-message') }}
                    @else
                        To start new period
                    @endif
                    </small>
                </a>
                {{ Form::close() }}
                
            </div>
        </div>
    </div>-->
@stop