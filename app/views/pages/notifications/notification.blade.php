@extends('layouts.default')


@section('content')
<section id="blog" class="container">
    <div class="blog">
        <h2 class="text-center">Notifications</h2>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($unreadNotifications as $notification)
                <div class="media comment_section">
                    <div class="media-body post_reply_comments">
                        <h3>{{ $notification->subject }}</h3>
                        <p>{{ $notification->body }}</p>
                        <a href="#">Reply</a>
                    </div>
                </div> 
                @endforeach
            </div><!--/.col-md-8-->
        </div><!--/.row-->
    </div>
</section><!--/#blog-->
@stop