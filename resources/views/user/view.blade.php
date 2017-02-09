@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="container">
            <h1>{{ $user->name }}</h1>
            <h2>{{ $user->points }} points</h2>
        </div>
    </div>
@if($user->votes->sum('vote') < 1)
<div class="row">
    <div class="container alert alert-warning">
        <p>This user has very few points. Be wary of reviews.</p>
    </div>
</div>
@endif
    <div class="row">
        <div class="container">
            <h2>Reviews</h2>
            @include('segment.reviews', ['reviews' => $user->reviews->all()])
        </div>
    </div>
@endsection