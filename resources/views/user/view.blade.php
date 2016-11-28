@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="container">
            <h1>{{ $user->name }}</h1>
            <h2>{{ $user->votes->sum('vote') }} points</h2>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <h2>Reviews</h2>
            @include('segment.reviews', ['reviews' => $user->reviews->all()])
        </div>
    </div>
@endsection