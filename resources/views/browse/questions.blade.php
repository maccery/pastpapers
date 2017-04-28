@extends('layouts.app')
@section('title', 'Browse | ')
@section('content')
    <div class="content-row">
        <div class="container">
            <h1>Browse</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('browse') }}">Browse</a></li>
                <li><a href="{{ route('browse_name', ['subject' => $subject]) }}">{{ $subject->name }}</a></li>
                <li class="active">{{ $subject->name }} {{ $current_past_paper->past_paper }}</li>
            </ul>
            @if(!$current_past_paper->confirmed_real)
                <p>Does this exist?</p>
                @include('answer.past_paper_vote', ['voting_type' => 'past_paper', 'past_paper' => $current_past_paper])
            @else
            <p>Don't see the question you want? <a href="{{ route('create_paper_question', ['past_paper' => $current_past_paper]) }}">Add it</a></p>
            <table class="table table-responsive">
                @foreach($current_past_paper->paper_questions as $paper_question)
                <tr>
                    <td><a href="{{ route('browse_answers', ['subject' => $subject, 'past_paper' => $current_past_paper, 'paper_question' => $paper_question]) }}">{{ $paper_question->question }}</a></td>
                </tr>
                @endforeach

            </table>
            @endif
        </div>
    </div>
@endsection
