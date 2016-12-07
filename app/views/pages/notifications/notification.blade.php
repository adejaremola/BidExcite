@extends('layouts.default')


@section('content')
<div class="section" style="min-height:400px;">
    <div class="text-center">
        <h2 class="text-center">Notifications</h2>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @foreach($unreadNotifications as $notification)
            <div>    
                <p class="subject">{{ $notification->subject }}</p>
                <p class="body">{{ $notification->body }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop