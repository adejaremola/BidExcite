@extends('layouts.default')


@section('content')
<div class="section">
  <div class="text-center">
    @if($method == 'post')
      <h2 class="text-center">Create New Deal</h2>
    @elseif($method == 'put')
      <h2 class="text-center">Edit Deal</h2>
    @else
      <h2 class="text-center">Delete Deal</h2>
    @endif
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($deal, array('method' => $method, 'url' => 'deal/'.$deal->id, 'files' => 'true', 'class' => 'form-horizontal')) }}
        <div class="form-group">
          {{ Form::label('pic_url', 'Upload Picture', ['class' => 'control-label col-sm-2']) }}
          <div class="col-sm-10">
            {{ Form::file('pic_url', '', ['id' => 'pic_url', 'class' => 'form-control', 'required' => 'true']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('title', 'Title', ['class' => 'control-label col-sm-2']) }}
          <div class="col-sm-10">
          {{ Form::text('title', '', ['id' => 'title', 'class' => 'form-control', 'required' => 'true']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('description', 'Description', ['class' => 'control-label col-sm-2']) }}
          <div class="col-sm-10">
            {{ Form::textarea('description', '', ['id' => 'description', 'class' => 'form-control', 'rows' => 5, 'required' => 'true']) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('price', 'Price', ['class' => 'control-label col-sm-2']) }}
          <div class="col-sm-10">
            {{ Form::number('price', '', ['id' => 'price', 'class' => 'form-control', 'required' => 'true']) }}
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            @unless($method == 'delete')
            <button type="submit" class="btn btn-default btn-success"><span class="glyphicon glyphicon-off"></span>Save Deal</button>
            @else
            <button type="submit" class="btn btn-default btn-danger"><span class="glyphicon glyphicon-off"></span>Delete Deal</button>
            @endif
          </div>
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@stop