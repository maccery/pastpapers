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
                    <li class="active">{{ $subject->name }} {{ $current_past_paper->past_paper }}</li>
                </ul>
                @include('segment.confirmation_warnings', ['past_paper' => $current_past_paper])
                @if(isset($current_past_paper) and $current_past_paper->canLeaveAnswer())
                    @if ($current_past_paper->negative > 0 or $current_past_paper->positive > 0)
                    <h4><b>Verdict</b>: {{ $current_past_paper->verdict }}</h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" style="width: {{ $current_past_paper->percentagePositive }}%">
                            <span class="sr-only">{{ $current_past_paper->percentagePositive }}% positive</span>
                        </div>
                        <div class="progress-bar progress-bar-danger" style="width: {{ 100-$current_past_paper->percentagePositive }}%">
                            <span class="sr-only">{{ 100-$current_past_paper->percentagePositive }}% negative</span>
                        </div>
                    </div>
                    @endif
                    @include('segment.answers', ['answers' => $answers->slice(0, 4)])
                    @include('segment.other_answers', ['answers' => $answers->slice(4)])
                @endif
            </div>
            <div class="col-sm-3 hidden-xs">
                @if(!$subject->confirmed_real)
                    <p>Does this exist?</p>
                    @include('answer.past_paper_vote', ['voting_type' => 'subject', 'past_paper' => $subject])
                @endif
                @if(isset($current_past_paper) and !$current_past_paper->canLeaveAnswer())
                    @include('segment.past_paper_info', ['past_paper' => $current_past_paper])
                @else
                @endif
            </div>
        </div>
    </div>
    @if(isset($current_past_paper) and $current_past_paper->canLeaveAnswer())
        <div class="content-row-grey">
            <div class="container">
                @include('answer.create', ['current_past_paper' => $current_past_paper])
            </div>
        </div>
    @endif
@endsection