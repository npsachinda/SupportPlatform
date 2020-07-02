@extends('layouts.app')

@section('title', 'Create Ticket')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new ticket</div>
                <div class="panel-body">
                @include('includes.flash')
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('customer_name') ? ' has-error' : '' }}">
                            <label for="customer_name" class="col-md-4 control-label">Customer Name*</label>

                            <div class="col-md-6">
                                <input id="customer_name" type="text" class="form-control" name="customer_name" >

                                @if ($errors->has('customer_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('customer_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Category*</label>

                            <div class="col-md-6">
                                <select id="category" type="category" class="form-control" name="category">
                                	<option value="">Select Category</option>
                                	
									<option value="Prodcut">Product</option>
                                    <option value="Service">Service</option>
                                	
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Problem Description*</label>

                            <div class="col-md-6">
                          
                                <textarea rows="4", cols="54" class="form-control" id="description" name="description" style="resize:none, "></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address*</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
                            <label for="contact_number" class="col-md-4 control-label">Contact Number*</label>

                            <div class="col-md-6">
                                <input id="contact_number" type="text" class="form-control" name="contact_number" >

                                @if ($errors->has('contact_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <a style="color:red" class="col-md-4 control-label">* Required Fields </a>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> SAVE
                                </button>
                                <button type="reset" class="btn btn-warning">
                                    <i class="fa fa-btn fa-sign-in"></i> CLEAR
                                </button>

                                 </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
