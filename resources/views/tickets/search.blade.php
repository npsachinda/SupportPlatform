@extends('layouts.app')

@section('title', 'Create Ticket')

@section('content')
<div class="container">
    <div class="row">

    <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Check ticket status</div>
                <div class="panel-body">

    <form method="POST" action="/search">
{{csrf_field()}}

<div class="form-group{{ $errors->has('ref_no') ? ' has-error' : '' }}">
        
 <input type="text" class="form-control" name="ref_no" placeholder="Enter your Ticket Reference Number">

                                @if ($errors->has('ref_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ref_no') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

</br>
<input type="submit" class="btn btn-primary" value="SEARCH">
<input type="reset" class="btn btn-warning" value="CLEAR">
</form>

</div>
</div>
</div>
</div>
    </div>
</div>
@endsection
