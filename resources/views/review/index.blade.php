@extends('layouts.app')
@section('content')
    <h1>"{{ $review->title }}"</h1>
    <p>{{ $review->version->software->name }} {{ $review->version->version }} review</p>
    <ul class="list list-unstyled list-inline">
        <li><a href="{{ route('view_user', $review->author->id) }}">{{ $review->author->name }}</a></li>
        <li>
            @if($review->author->isTopUser())
                <span class="badge">Expert reviewer</span>
            @endif
        </li>
        <li>{{ $review->author->votes->sum('vote') }} points</li>
        <li>{{ $review->created_at->diffForHumans() }}</li>
    </ul>
    <hr>
    <p>{{ $review->description }}</p>
    <hr>
    <p>@include('segment.tags', ['tags' => $review->tags])</p>
@endsection


