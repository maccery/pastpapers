<h3>Suggest a different date</h3>
<form method="POST" action="{{ route('post_suggest_date') }}">
    <div class="form-group">
        <input type="hidden" name="version_id" value="{{ $version->id }}">
        <input class="form-control" rows="5" name="release_date" class="input-group input-lg" placeholder="Enter date here (mm/dd/yyyy)">
    </div>
@if (Auth::guest())
    <p><small><a href="{{ url('/register') }}">Register</a> to submit</small></p>
@else
    <p><small>Submit as <b>{{ Auth::user()->name }}</b></small></p>
    <button class="btn btn-default">Suggest</button>
@endif
    {{ csrf_field() }}
@include('errors.generic')
</form>