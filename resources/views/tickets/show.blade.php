@extends('layouts.app')

@section('title', 'View Ticket')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
	        <div class="panel panel-default">
	        	<div class="panel-heading">
	        		{{ $ticket->customer_name }} - #{{ $ticket->ticket_id }}
	        	</div>

	        	<div class="panel-body">
	        		@include('includes.flash')
	        		
	        		<div class="ticket-info">
	        			<p>{{ $ticket->message }}</p>
		        		<p>Categry: {{ $ticket->category }}</p>
						<p>Description: {{ $ticket->description }}</p>
						
		        		<p>
	        			@if ($ticket->status === 'Open')
    						Status: <span class="label label-success">{{ $ticket->status }}</span>
    					@else
    						Status: <span class="label label-danger">{{ $ticket->status }}</span>
    					@endif
		        		</p>
						<p>Agent Comment: {{ $comments }}</p>
		        		<p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
	        		</div>
					@if (Auth::guest())
					<button type="button" class="btn btn-warning" onclick="window.location='{{ url("/tickets") }}'">Back to Search</button>
					@else

	        		<div class="comment-form">
		        		<form action="{{ url('comment') }}" method="POST" class="form">
		        			{!! csrf_field() !!}
							@if ($ticket->status === 'Open')
		        			<input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

		        			<div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <textarea rows="10" id="comment" class="form-control" name="comment" >{{ $comments }}</textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
	                        </div>

	                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
								<button type="reset" class="btn btn-warning">Clear</button>
								@endif
								<button type="button" class="btn btn-danger" onclick="window.location='{{ url("/home") }}'">Back to list</button>
	                        </div>
		        		</form>
	        	</div>

					@endif					

	        </div>
	    </div>
	</div>
@endsection