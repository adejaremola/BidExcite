@extends('layouts.default')

@section('content')

<section id="feature">
    <div class="container" style="margin-top: -10px;">
        <div class="center wow fadeInDown">
            @if($for == "my_deals")
            <h2>My Deals</h2>
            @else
            <h2>Deals</h2>
            @endif
        </div>

        <div class="row">
            <div class="features">
                @if($for == "my_deals")
                    @foreach($deals as $deal)
                        <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                            <div class="feature-wrap" >
                                <img src="{{ $deal->pic_url }}" class="img-responsive">
                                <h2>{{ $deal->title }}</h2>
                                <h3><p>{{ $deal->description }}</p></h3>
                                <h3><p>{{ $deal->price }}</p></h3>
                                <a class="btn btn-slide animation animated-item-3" href="{{ route('deal', $deal->id) }}">View Bids</a>
                                <a class="btn btn-slide animation animated-item-3" href="{{ route('edit_deal', $deal->id) }}">Edit</a>
                                <a class="btn btn-slide animation animated-item-3" href="{{ route('delete_deal', $deal->id) }}">Delete</a>
                            </div>
                        </div><!--/.col-md-4-->
                    @endforeach
                @elseif($for == "all_deals")
                    @foreach($deals as $deal)
                        @if(!Auth::check() or $deal->user_id != Auth::user()->id)
                        <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                            <div class="feature-wrap">
                                <img src="{{ $deal->pic_url }}" class="img-responsive">
                                <h2>{{ $deal->title }}</h2>
                                <h3>{{ $deal->description }}</h3>
                                <h3><p>{{ $deal->price }}</p></h3>
                                @if($deal->available == 1)
                                <a class="btn btn-slide animation animated-item-3" href="{{ route('deal', $deal->id) }}">View Bids</a>
                                @else
                                <a class="btn btn-slide animation animated-item-3 disabled" href="{{ route('deal', $deal->id) }}">CLOSED!!</a>
                                @endif
                            </div>
                        </div><!--/.col-md-4-->
                        @endif
                    @endforeach
                @endif
            </div><!--/.services-->
        </div><!--/.row-->    
    </div><!--/.container-->
</section><!--/#feature-->
  

@stop
