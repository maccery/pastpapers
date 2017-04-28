@extends('layouts.app')
@section('content')
    <div class="content-row">
        <div class="container">
            <h1>How crowd-sourcing works on Meagle</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Users contribute data</h3>
                </div>
                <div class="panel-body">
                    This can be in the form of a answer, a new piece of subject or a data point (such
                    as when a piece of subject was released)
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Other users vote on this</h3>
                </div>
                <div class="panel-body">
                    Users can then vote for or against this contribution. Once it reaches a certain amount of votes (either
                    for or against) it will either be confirmed or removed.
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Rewarding / punishing</h3>
                </div>
                <div class="panel-body">
                    Users who voted the correct way (i.e the way the community has confirmed) get rewarded (with points)
                    and those who voted the wrong way get punished (by losing points). These show up as points rewarded by the System user.
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Voting power means everything</h3>
                </div>
                <div class="panel-body">
                    The more points you have, the more voting power you have. These are staggered into different levels.
                    If you have a voting power of 5, every vote you make counts for 5. This means power users have more influence on the system.
                    Users who have negative points have no voting power whatsoever.
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Transparency is key</h3>
                </div>
                <div class="panel-body">
                    A user's voting power, their points, and how their points were calculated, is shown clearly on their profile.
                </div>
            </div>
        </div>
    </div>
@endsection


