@extends('users.layout')

@section('sub-content')
	<div class="grid fluid">
        <div class="row">
            <div class="span5 offset2">
                <h2><i class="icon-cart on-left"></i>Recently Purchased Items</h2>
                <table class="table hovered">
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
                            <td>{{ $item->created_at }}</td>
                        </tr>   
                    @endforeach
                    </tbody>
                </table>
                {{ $items->links() }}
            </div>
        </div>
    </div>
@stop