@extends('layouts.app')
@section('title', $subject->name . ' ' . $current_past_paper->past_paper . ' | ')
@section('description', 'Get impartial answers and advice about ' . $subject->name . ' ' . $current_past_paper->past_paper . '. Should you upgrade? Read what the experts are saying.')
@section('content')
    <div class="content-row">
        <div class="container">
            <div class="col-sm-9">
                <h1>{{ $subject->name }} {{ $current_past_paper->past_paper }} answers</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ route('browse') }}">Browse</a></li>
                    <li><a href="{{ route('browse_name', ['subject' => $subject]) }}">{{ $subject->name }}</a></li>
                    <li><a href="{{ route('browse_by_past_paper', ['subject' => $subject, 'past_paper' => $current_past_paper]) }}">{{ $current_past_paper->past_paper }}</a></li>
                    <li class="active">{{ $paper_question->question }}</li>
                </ul>
                @include('segment.confirmation_warnings', ['past_paper' => $current_past_paper])
                @if(isset($current_past_paper) and $paper_question->canLeaveAnswer())
                    @if ($current_past_paper->negative > 0 or $paper_question->positive > 0)
                    <h4><b>Verdict</b>: {{ $paper_question->verdict }}</h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" style="width: {{ $paper_question->percentagePositive }}%">
                            <span class="sr-only">{{ $paper_question->percentagePositive }}% positive</span>
                        </div>
                        <div class="progress-bar progress-bar-danger" style="width: {{ 100-$paper_question->percentagePositive }}%">
                            <span class="sr-only">{{ 100-$paper_question->percentagePositive }}% negative</span>
                        </div>
                    </div>
                    @endif
                    @include('segment.answers', ['answers' => $answers->slice(0, 4)])
                    @include('segment.other_answers', ['answers' => $answers->slice(4)])
                @endif
            </div>
            <div class="col-sm-3 hidden-xs">
                @if(!$paper_question->confirmed_real)
                    <p>Does this exist?</p>
                    @include('answer.past_paper_vote', ['voting_type' => 'subject', 'past_paper' => $subject])
                @endif
                @if(isset($current_past_paper) and !$paper_question->canLeaveAnswer())
                    @include('segment.past_paper_info', ['past_paper' => $current_past_paper])
                @else
                    @include('segment.tags', ['tags' => $paper_question->topTags()])
                @endif
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