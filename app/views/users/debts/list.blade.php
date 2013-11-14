@extends('users.layout')

@section('sub-content')
	<div class="grid fluid">
		<div class="row">
            <div class="span4 offset2">
            	<h2><i class="icon-upload on-left"></i>My Debts</h2>
            	@if(count($debts) > 0)
	            	<table class="table hovered">
						<thead>
							<tr>
								<th class="text-left">Whom</th>
								<th class="text-left">Description</th>
								<th class="text-left">Amount (TRY)</th>
								<th class="text-left">Date</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($debts as $debt)
		 					<tr>
		 						<td>{{ $debt->payee->username }}</td>
		 						<td>{{ $debt->description }}</td>
		 						<td>{{ $debt->amount }}</td>
		 						<td>{{ $debt->created_at }}</td>
		 					</tr>	
						@endforeach
						</tbody>
					</table>
				@else
					<p>Congratulations! You do not owe anybody.</p>
				@endif
            </div>
            <div class="span4">
            	<h2><i class="icon-download on-left"></i>Incomes</h2>
            	@if(count($incomes) > 0)
	            	<table class="table hovered">
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
		 						<td>{{ $income->created_at }}</td>
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