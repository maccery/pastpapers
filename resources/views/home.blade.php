@extends('layouts.app')
@section('content')
    <? $user = Auth::user() ?>
    <div class="content-row">
        <div class="container">
            <h1>Welcome, {{ $user->name }}
            </h1>
        </div>
    </div>
    <div class="content-row">
        <div class="container">
            <div class="alert alert-info">
                <p><b>You have {{ $user->points }} points</b></p>
                <p>
                    <small>Users gain points for doing positive things on PastPaper and lose points for doing negative
                        things. The more points a user has, the more trusted they are.
                    </small>
                </p>
            </div>
            <div class="alert alert-info">
                <p><b>You have +{{ $user->voting_power }} voting power</b></p>
                <p>
                    <small>Every time you vote on something it counts for {{ $user->voting_power }} votes. The more
                        points you have, the greater your voting power and ultimately your influence on the platform.
                    </small>
                </p>
            </div>
            <div class="alert alert-info">
                <p><b>You are level {{ $user->level[0] }}/{{ $user->level[1] }}</b></p>
                <p>
                    <small>This is how far you have climbed to the top of the PastPaper ladder! The greater your level, the
                        more voting power you have.
                    </small>
                </p>
            </div>
            <p><a href="{{ route('view_user', ['user' => $user]) }}">How were my points calculated?</a></p>
        </div>
    </div>
@endsection
