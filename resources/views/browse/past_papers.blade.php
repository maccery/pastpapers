@extends('layouts.app')
@section('title', $subject->name . ' | ')
@section('description', 'Get impartial answers and advice about ' . $subject->name . '. Should you upgrade? Read what the experts are saying.')
@section('content')
    <div class="content-row">
        <div class="container">
            <h1>Browse</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('browse') }}">Browse</a></li>
                <li class="active">{{ $subject->name }}</li>
            </ul>
            @if(!$subject->confirmed_real)
                <div class="alert alert-danger">
                    <p>This subject has not been confirmed as real yet. Subjects are crowd-sourced on PastPaper. To find out
                        more about the process of answer, read <a href="{{ route('process') }}">here</a>.
                </div>
                <p>Does this subject exist?</p>
                @include('answer.past_paper_vote', ['voting_type' => 'subject', 'past_paper' => $subject])
            @else
            <p>Don't see the past paper of {{ $subject->name }} you're looking for? <a href="{{ route('create_past_paper', ['subject' => $subject]) }}">Add it</a></p>
            <table class="table">
                <th>Past paper</th>
                <th>Release date</th>
                @foreach ($past_papers as $past_paper)
                    <tr>
                        <td><a href="{{ route('browse_by_past_paper', ['subject' => $past_paper->subject->id, 'past_paper' => $past_paper->id]) }}">{{ $past_paper->subject->name }} {{ $past_paper->past_paper }}</a></td>
                        <td>{{ $past_paper->release_date or '' }}</td>
                    </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div>
@endsection
