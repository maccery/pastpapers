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
                <div class="alert alert-warning">
                <p>Does this subject exist? <small>Voting helps us remove spam</small></p>
                @include('answer.past_paper_vote', ['voting_type' => 'subject', 'past_paper' => $subject])
                </div>
            @endif

            <p>Don't see the past paper of {{ $subject->name }} you're looking for? <a href="{{ route('create_past_paper', ['subject' => $subject]) }}">Add it</a></p>
            <table class="table">
                <th>Past paper</th>
                @foreach ($past_papers as $past_paper)
                    <tr>
                        <td><a href="{{ route('browse_by_past_paper', ['subject' => $past_paper->subject->id, 'past_paper' => $past_paper->id]) }}">{{ $past_paper->past_paper }}</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
