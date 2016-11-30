@extends('layouts.default')

@section('content')
<div class="panel panel-default text-center">
    <div class="panel-heading">
        <h2>Active Bids</h2>
    </div>
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Deal</th>
                    <th>Start Price</th>
                    <th>Bid Price</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user->hasBids as $bid)
                <tr>
                    <td><a href="{{ route('deal', $bid->getDeal->id) }}">{{ $bid->getDeal->title }}</a></td>
                    <td>{{ $bid->getDeal->price }}</td>
                    <td>{{ $bid->price }}</td>
                    <td><a href="">Edit</a></td>
                    <td><a href="">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>   

@stop
