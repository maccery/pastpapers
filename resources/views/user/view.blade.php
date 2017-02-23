@extends('layouts.app')
@section('content')
    <div class="content-row">
        <div class="container">
            <h1>{{ $user->name }}
                <small>{{ $user->points }} points, +{{ $user->voting_power }} voting power</small>
            </h1>
        </div>
    </div>
    @if($user->votes->sum('vote') < 1)
        <div class="content-row">
            <div class="container">
                <div class="alert alert-warning">
                    <p>This user has very few points. Be wary of reviews.</p>
                </div>
            </div>
        </div>
    @endif
    <div class="content-row">
        <div class="container">
            <h2>Reviews</h2>
            @include('segment.reviews', ['reviews' => $user->reviews->all()])
        </div>
    </div>
    <div class="content-row-grey">
        <div class="container">
            <h2>How my score was calculated</h2>
            @include('user.points_history', ['votes' => $user->votes])
        </div>
    </div>
@endsection
