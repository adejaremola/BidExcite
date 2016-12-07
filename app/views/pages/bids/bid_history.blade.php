@extends('layouts.default')


@section('content')

<div class="section" style="min-height:380px; margin-top:50px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="accordion">
                <div class="panel-group" id="accordion1">
                    <div class="panel panel-default">
                        <div class="panel-heading active">
                            <h3 class="panel-title text-center">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                            Active Bids
                            <i class="fa fa-angle-right pull-right"></i>
                            </a>
                            </h3>
                        </div>

                        <div id="collapseOne1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="media accordion-inner">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Deal</th>
                                                <th>Top Bid</th>
                                                <th>My Bid</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bids as $bid)
                                            @if($bid->isActive)
                                            <tr class="{{ $bid->isTop? 'success':'warning' }}">
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
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/#accordion1-->
            </div>
        </div>
    </div>
</div>

@stop