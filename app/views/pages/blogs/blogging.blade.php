@extends('layouts.default')


@section('content')
<div class="section">
  <div class="text-center">
    @if($method == 'post')
      <h2 class="text-center">Create New Post</h2>
    @elseif($method == 'put')
      <h2 class="text-center">Edit Post</h2>
    @else
      <h2 class="text-center">Delete Post</h2>
    @endif
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      {{ Form::model($blog, array('method' => $method, 'url' => 'blogs/'.$blog->id, 'files' => 'true', 'class' => 'form-horizontal')) }}
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
          {{ Form::label('content', 'Content', ['class' => 'control-label col-sm-2']) }}
          <div class="col-sm-10">
            {{ Form::textarea('content', '', ['id' => 'content', 'class' => 'form-control', 'required' => 'true']) }}
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