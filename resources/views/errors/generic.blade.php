@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Auth::user() and Auth::user()->voting_power == 0):
    <div class="alert alert-danger">
        You have a voting power of <b>0</b>. This means you cannot vote on things on the site.
    </div>
@endif