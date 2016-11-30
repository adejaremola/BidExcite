@extends('layouts.default')

@section('content')
<div class="section" style="margin-top:15px">
	<div class="container">
	    <div class="center">        
	        <h2>Edit Profile</h2>
	    </div> 
	    <div class="row contact-wrap" style="margin-top:-15px"> 
	        {{ Form::open(array('url' =>  'profile/'.Auth::user()->id, 'name' =>  'contact-form', 'id' =>  'main-contact-form',)) }}
	            <div class="col-sm-4 col-sm-offset-2">
	                <div class="form-group">
	                    <label>First Name *</label>
	                    <input type="text" name="first_name" class="form-control" value="{{Auth::user()->first_name}}" required>
	                </div>
	                <div class="form-group">
	                    <label>Last Name *</label>
	                    <input type="text" name=last_name" class="form-control" value="{{Auth::user()->last_name}}" required>
	                </div>
	                <div class="form-group">
	                    <label>Email</label>
	                    <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" required>
	                </div>
	                <div class="form-group">
	                    <label>Phone Number</label>
	                    <input type="number" name="phone" class="form-control" value="{{Auth::user()->getsProfile->phone? : ''}}" required>
	                </div>                        
	            </div>
	            <div class="col-sm-4">
	                <div class="form-group">
	                    <label>Address</label>
	                    <input type="text" name="address" class="form-control" value="{{Auth::user()->getsProfile->address? : ''}}">
	                </div>
	                <div class="form-group">
	                    <label>City</label>
	                    <input type="text" name="city" class="form-control" value="{{Auth::user()->getsProfile->city? : ''}}">
	                </div>                        
	                <div class="form-group">
	                    <label>State</label>
	                    <input type="text" name="state" class="form-control" value="{{Auth::user()->getsProfile->state? : ''}}">
	                </div>                        
	                <div class="form-group">
	                    <button type="submit" name="submit" class="btn btn-primary btn-lg" required>Submit Message</button>
	                </div>
	            </div>
	        {{ FOrm::close() }} 
	    </div><!--/.row-->
	</div><!--/.container-->
</div><!--/#contact-page-->
	
@stop