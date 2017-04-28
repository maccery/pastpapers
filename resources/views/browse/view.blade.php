@extends('layouts.app')
@section('title', $subject->name . ' ' . $current_past_paper->past_paper . ' | ')
@section('description', 'Get impartial answers and advice about ' . $subject->name . ' ' . $current_past_paper->past_paper . '. Should you upgrade? Read what the experts are saying.')
@section('content')
    <div class="content-row">
        <div class="container">
            <div class="col-sm-9">
                <h1>{{ $subject->name }} {{ $current_past_paper->past_paper }}, Question {{ $paper_question->question }} answers</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ route('browse') }}">Browse</a></li>
                    <li><a href="{{ route('browse_name', ['subject' => $subject]) }}">{{ $subject->name }}</a></li>
                    <li><a href="{{ route('browse_by_past_paper', ['subject' => $subject, 'past_paper' => $current_past_paper]) }}">{{ $current_past_paper->past_paper }}</a></li>
                    <li class="active">{{ $paper_question->question }}</li>
                </ul>
                @include('segment.answers', ['answers' => $answers->slice(0, 4)])
                @include('segment.other_answers', ['answers' => $answers->slice(4)])
            </div>
            <div class="col-sm-3 hidden-xs">
                @include('segment.tags', ['tags' => $paper_question->topTags()])
            </div>
        </div>
    </div>
    @if(isset($current_past_paper) and $paper_question->canLeaveAnswer())
        <div class="content-row-grey">
            <div class="container">
                @include('answer.create', ['paper_question' => $paper_question])
            </div>
        </div>
    @endif
@endsection