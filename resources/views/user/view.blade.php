@extends('layouts.app')
@section('content')
    <div class="content-row">
        <div class="container">
            <h1>{{ $user->name }}
                <small><span data-toggle="tooltip" title="Users gain points for doing positive things on Meagle and lose points for doing negative things. The more points a user has, the more trusted they are.">{{ $user->points }} points</span>, <span data-toggle="tooltip" title="Every time this user votes, it counts for {{ $user->voting_power }} votes. The higher the voting power, the more influence they have on Meagle.">+{{ $user->voting_power }} voting power</span>
                    <span class="label label-default">Level {{ $user->level[0] }}/{{ $user->level[1] }}</span></small>
            </h1>
        </div>
    </div>
    @if($user->votes->sum('vote') < 1)
    <div class="content-row">
        <div class="container">
            <div class="alert alert-warning">
                <p>This user has very few points. Be wary of answers.</p>
            </div>
        </div>
    </div>
    @endif
    <div class="content-row">
        <div class="container">
            <h2>Answers</h2>
            @include('segment.answers', ['answers' => $user->answers->all()])
        </div>
    </div>
    <div class="content-row-grey">
        <div class="container">
            <h2>How my points were calculated</h2>
            @include('user.points_history', ['votes' => $user->votes])
        </div>
    </div>
@endsection
