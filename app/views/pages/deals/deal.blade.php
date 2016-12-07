@extends('layouts.default')


@section('content')

<div class="section" style="min-height:380px; max-width:100%;">
    <h2 class="text-center">{{ $deal->title }}</h2>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="accordion">
                <div class="panel-group" id="accordion1">
                    <div class="panel panel-default">
                        <div class="panel-heading active">
                            <h3 class="panel-title text-center">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                            {{ $deal->title }}
                            <i class="fa fa-angle-right pull-right"></i>
                            </a>
                            </h3>
                        </div>

                        <div id="collapseOne1" class="panel-collapse collapse in">
                            <div class="panel-body" >
                                <div class="media accordion-inner" style="max-height:250px">
                                    <div class="pull-left">
                                        <img class="img-responsive" src="{{ $deal->pic_url }}">
                                    </div>
                                    <div class="media-body">
                                        <p>{{ $deal->description }}</p>
                                        <h4>{{ $deal->price }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">
                              Bids
                              <i class="fa fa-angle-right pull-right"></i>
                            </a>
                          </h3>
                        </div>
                        <div id="collapseTwo1" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Top Bidder</th>
                                            <th>Bid</th>
                                            <th>Time</th>
                                            @if(Auth::check() and !Auth::user()->cantBid($deal))
                                            <th><a href="{{ url('bids/create/'.$deal->id) }}">Place a bid</a></th>
                                            @elseif(!Auth::check())
                                            <th><a data-toggle="modal" href="#signIn">Login </a>to place a bid</th>
                                            @else
                                            <th><a href=""></a></th>
                                            <th><a href=""></a></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($deal->getBids as $bid)
                                        <tr>
                                            <td>{{$bid->getUser->first_name}}</td>
                                            <td>{{ $bid->price }}</td>
                                            <td>{{ $bid->created_at }}</td>
                                            @if(Auth::check() and Auth::user()->id == $bid->getUser->id )
                                            <td>
                                            <a href="{{ route('edit_bid', $bid->id) }}">Edit Bid</a>
                                            </td>
                                            <td>
                                            <a href="{{ route('delete_bid', $bid->id) }}">Delete Bid</a>
                                            </td>
                                            @elseif(Auth::check() and Auth::user()->id == $bid->getDeal->getUser->id)
                                            <td>
                                            {{ Form::model($bid, ['method' => 'post', 'role' => 'form', 'url' => 'bid/'.$bid->id.'/accept']) }}
                                            <button type="submit" class="btn{{$bid->accepted?' disabled':''}}">{{$bid->accepted?'Accepted':'Accept Bid'}}
                                            </button>
                                            </td>
                                            {{ Form::close() }}
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--/#accordion1-->
            </div>
        </div>
    </div>
</div>

@stop