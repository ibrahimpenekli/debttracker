@extends('users.layout')

@section('sub-content')
	<div class="grid fluid">
        <div class="row">
            <div class="span4 offset2">
                <h2><i class="icon-upload on-left"></i>My Debts</h2>
                @if(count($debts) > 0)
                    <table class="table bordered hovered">
                        <thead>
                            <tr>
                                <th class="text-left">Whom</th>
                                <th class="text-left">Description</th>
                                <th class="text-left">Amount (TRY)</th>
                                <th class="text-left">Date</th>
                                <th class="text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($debts as $debt)
                            <tr>
                                <td>{{ $debt->payee->username }}</td>
                                <td>{{ $debt->description }}</td>
                                <td>{{ $debt->amount }}</td>
                                <td>{{ Carbon::createFromFormat('Y-m-d H:i:s', $debt->created_at)->diffForHumans() }}</td>
                                <td><a href="{{ URL::action('DebtController@pay', array($debt->id)) }}"><strong>Pay</strong></a> | 
                                    <a href="{{ URL::action('DebtController@edit', array($debt->id)) }}"><strong>Edit</strong></a> | 
                                    <a href="{{ URL::action('DebtController@destroy', array($debt->id)) }}" data-method="delete"><strong>Delete</strong></a>
                                </td>
                            </tr>   
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Congratulations! You don't owe anybody.</p>
                @endif
            </div>
            <div class="span4">
                <h2><i class="icon-download on-left"></i>Incomes</h2>
                @if(count($incomes) > 0)
                    <table class="table bordered hovered">
                        <thead>
                            <tr>
                                <th class="text-left">From</th>
                                <th class="text-left">Description</th>
                                <th class="text-left">Amount (TRY)</th>
                                <th class="text-left">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($incomes as $income)
                            <tr>
                                <td>{{ $income->payer->username }}</td>
                                <td>{{ $income->description }}</td>
                                <td>{{ $income->amount }}</td>
                                <td>{{ Carbon::createFromFormat('Y-m-d H:i:s', $income->created_at)->diffForHumans() }}</td>
                            </tr>   
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>You don't have any income.</p>
                @endif
            </div>
        </div>
    </div>
@stop