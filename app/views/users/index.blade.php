@extends('users.layout')

@section('sub-content')
	<div class="grid fluid">
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
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->owner->username }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->diffForHumans() }}</td>
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
                            <td>{{ $username }}</td>
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
                <a class="command-button default" href="javascript:void(0)" onclick="$(this).closest('form').submit()">
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
    </div>
@stop