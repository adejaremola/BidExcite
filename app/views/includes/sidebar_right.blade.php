<div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
    <h4>Popular Deals</h4>
</div>
<br>
@foreach($deals as $deal)
    @if(!Auth::user() or $deal->user_id != Auth::user()->id)
    <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
            <img src="{{ $deal->pic_url }}" alt="Forest" style="height:80px; width:100%;">
            <p><a href="{{ route('deal', $deal->id) }}"><strong>{{ $deal->title }}</strong></a></p>
            <p>{{ $deal->description }}</p>
            <p><strong>{{ $deal->price }}</strong></p>
        </div>
    </div>
    <br>
    @endif  
@endforeach


