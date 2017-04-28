@extends('layouts.app')
@section('content')
    <div class="content-row">
        <div class="container">
            <h1>"{{ $answer->title }}"</h1>
            <p>{{ $answer->past_paper->subject->name }} {{ $answer->past_paper->past_paper }} answer</p>
            <ul class="list list-unstyled list-inline">
                <li><a href="{{ route('view_user', $answer->author->id) }}">{{ $answer->author->name }}</a></li>
                <li>
                    @if($answer->author->isTopUser())
                        <span class="badge">Expert answerer</span>
                    @endif
                </li>
                <li>{{ $answer->author->votes->sum('vote') }} points</li>
                <li>{{ $answer->created_at->diffForHumans() }}</li>
            </ul>
            <hr>
            <p>{{ $answer->description }}</p>
            <hr>
            <p>@include('segment.tags', ['tags' => $answer->tags])</p>
        </div>
    </div>
@endsection


