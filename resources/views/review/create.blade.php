<textarea class="input-group input-lg" placeholder="Your review here"></textarea>
@if (Auth::guest())
    <p><small><a href="{{ url('/register') }}">Register</a> to submit</small></p>
@else
    <p><small>Submit as <b>{{ Auth::user()->name }}</b></small></p>
    <button class="btn btn-danger">Review</button>
@endif
