@extends('users.layout')

@section('sub-content')
	<div class="grid fluid">
		<div class="row">
            <div class="span5 offset2">
            	<h2><i class="icon-cart-2 on-left"></i>My Purchased Items</h2>
            	@if(Session::has('message'))
                    {{ Session::get('message') }}
                @endif
                @if(count($items) > 0)
	            	<table class="table bordered hovered">
						<thead>
							<tr>
								<th class="text-left">Description</th>
								<th class="text-left">Price (TRY)</th>
								<th class="text-left">Date</th>
								<th class="text-left">Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($items as $item)
		 					<tr>
		 						<td>{{ $item->description }}</td>
		 						<td>{{ $item->price }}</td>
		 						<td>{{ Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->diffForHumans() }}</td>
		 						<td><a href="{{ URL::action('PurchasedItemController@edit', array($item->id)) }}"><strong>Edit</strong></a> | 
			 						<a href="{{ URL::action('PurchasedItemController@destroy', array($item->id)) }}" data-method="delete"><strong>Delete</strong></a>
			 					</td>
		 					</tr>	
						@endforeach
						</tbody>
					</table>
					{{ $items->links() }}
				@else
                    <p>You don't have any purchased item.</p>
                @endif
            </div>
		</div>
	</div>
@stop