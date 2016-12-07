@extends('layouts.default')

@section('content')
<ul class="error">
    @foreach($errors->all() as $message)
        <li>{{ $message }}</li>
    @endforeach
</ul>
<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>
        <?php $check = 0; ?>
        <div class="carousel-inner">
            @foreach($deals as $deal )
            <?php $check++ ?>
            @if($check == 1)
            <div class="item active" style="background-image: url(images/slider/bg1.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">{{$deal->description}}</h1>
                                <h2 class="animation animated-item-2">{{$deal->price}}</h2>
                                <a class="btn-slide animation animated-item-3" href="{{ route('deal', $deal->id) }}">Bid</a>
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="{{ $deal->pic_url }}" class="img-responsive">
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--/.item-->
            @else
            <div class="item" style="background-image: url(images/slider/bg1.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">{{$deal->description}}</h1>
                                <h2 class="animation animated-item-2">{{$deal->price}}</h2>
                                <a class="btn-slide animation animated-item-3" href="{{ route('deal', $deal->id) }}">Bid</a>
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="{{ $deal->pic_url }}" class="img-responsive">
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--/.item-->
            @endif
            @endforeach
            
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="fa fa-chevron-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="fa fa-chevron-right"></i>
    </a>
</section><!--/#main-slider-->

<section id="feature" >
    <div class="container">
       <div class="center wow fadeInDown">
            <h2>Popular Blog Posts</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>

        <div class="row">
            <div class="features">
            @foreach($blogs as $blog)
                <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="feature-wrap">
                        <img src="{{ $blog->pic_url }}" class="img-responsive">
                        <h2><a href="{{ route('deal', $deal->id) }}">{{ $blog->title }}</a></h2>
                        <p>{{ $blog->content }}</p>
                    </div>
                </div><!--/.col-md-4-->
            @endforeach
            </div><!--/.services-->
        </div><!--/.row-->    
    </div><!--/.container-->
</section><!--/#feature-->
@stop