@extends('layouts.app')

@section('title', 'All Tickets')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
	        <div class="panel panel-default">

			<form action="/search_customer" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search customers"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>

	        	<div class="panel-heading">
	        		<i class="fa fa-ticket"> Tickets</i>
	        	</div>

	        	<div class="panel-body">
	        		@if ($tickets->isEmpty())
						<p>There are no tickets.</p>
	        		@else
		        		<table class="table">
		        			<thead>
		        				<tr>
									<th>Customer Name</th>
		        					<th>Ticket Number</th>
									<th>Category</th>
		        					<th>Status</th>
		        					<th>Last Updated</th>
									<th>Agent Comment</th>
		        					<th style="text-align:center" colspan="2">Actions</th>
		        				</tr>
		        			</thead>
		        			<tbody>
		        			@foreach ($tickets as $ticket)
								<tr>
								<td>{{ $ticket->customer_name }}</td>
		        					<td>
		        						<a href="{{ url('tickets/'. $ticket->ticket_id) }}">
		        							{{ $ticket->ticket_id }}
		        						</a>
		        					</td>
									<td>{{ $ticket->category }}</td>									
		        					<td>
		        					@if ($ticket->status === 'Open')
		        						<span class="label label-success">{{ $ticket->status }}</span>
		        					@elseif ($ticket->status === 'Create')
		        						<span class="label label-danger">{{ $ticket->status }}</span>
										@else
		        						<span class="label label-warning">{{ $ticket->status }}</span>
		        					@endif
		        					</td>
		        					<td>{{ $ticket->updated_at }}</td>
									<td>{{ $ticket->agent_comment }}</td>

									@if ($ticket->status === 'Open')
								<td><a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary">Comment</a></td>
		        					<td>
		        						<form action="{{ url('close_ticket/' . $ticket->ticket_id) }}" method="POST">
		        							{!! csrf_field() !!}
		        							<button type="submit" class="btn btn-danger">Close</button>
		        						</form>
		        					</td>
									@elseif ($ticket->status === 'Create')
									<td></td>
		        					<td>
		        						<form action="{{ url('open_ticket/' . $ticket->ticket_id) }}" method="POST">
		        							{!! csrf_field() !!}
		        							<button type="submit" class="btn btn-success">Open</button>
		        						</form>
		        					</td>
									@endif
		        				</tr>
		        			@endforeach
		        			</tbody>
		        		</table>

		        		{{ $tickets->render() }}
		        	@endif
	        	</div>
	        </div>
	    </div>
	</div>
@endsection