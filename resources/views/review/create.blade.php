@if($current_version->canLeaveReview())
    @if (Auth::User())
        <h3>{{ Auth::User()->name }}, have your say</h3>
    @endif
    <form method="POST" action="{{ route('post_review') }}">
        <div class="form-group">
            <input type="hidden" name="version_id" value="{{ $current_version->id }}">
            <input class="form-control" name="title" class="input-group input-lg" placeholder="Review title">
            <textarea class="form-control" rows="5" name="description" class="input-group input-lg" placeholder="Your review here"></textarea>
        </div>
    @if (Auth::guest())
        <p><small><a href="{{ url('/register') }}">Register</a> to submit</small></p>
    @else
        <p><small>Submit as <b>{{ Auth::user()->name }}</b></small></p>
        <button class="btn btn-default">Review</button>
    @endif
        {{ csrf_field() }}
    </form>
    @include('errors.generic')
@endif