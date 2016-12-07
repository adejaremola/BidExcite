@extends('layouts.default')


@section('content')
  <div class="section">
      <div class="center" style="margin-bottom:-20px; margin-top:20px;">        
        <h2>
          @if($method == 'post')
          Place a Bid
          @elseif($method == 'put')
          Edit Your Bid
          @elseif($method == 'delete')
          Do You Really Want To Delete Bid?
          @endif
        </h2>
      </div>
      <div class="row"> 
        <div class="col-md-4 col-md-offset-4">
      {{ Form::model($bid, array('url' => 'bid/'.$bid->id, 'method' => $method, 'role' => 'form')) }}
          <div class="form-group">
            <label for="price">Your price:</label>
            {{ Form::number('price') }}
          </div>
          <div class="form-group">
            <input type="number" class="form-control sr-only" name="deal_id" value="{{ $deal->id }}">
          </div>
          <div class="form-group">
            @if($method == 'post')
              <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit Bid</button>
            @elseif($method == 'put')
              <button type="submit" name="submit" class="btn btn-primary btn-lg">Edit Bid</button>
            @elseif($method == 'delete')
              <button type="submit" name="submit" class="btn btn-primary btn-lg">Delete Bid</button>
            @endif
          </div>
      {{ Form::close() }} 
        </div>
      </div>
  </div><!--/.container-->
  
@stop