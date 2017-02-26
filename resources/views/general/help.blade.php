@extends('layouts.app')
@section('title', 'Help | ')
@section('description', 'Get help or advice on how to use Meagle.')
@section('content')
    <div class="content-row">
        <div class="container">
            <h1>Help</h1>
            <h2>What do you mean by "crowd-sourcing"?</h2>
            <p>This answer is detailed on our <a href="{{ route('process') }}">crowd-sourcing process</a> page.</p>
            <h2>How can I see how many points I have?</h2>
            <p>In the <a href="{{ route('user_area') }}">user area</a>.</p>
            <h2>How can I find a piece of software?</h2>
            <p>By entering a search in the search box at the top or by <a href="{{ route('browse') }}">browsing</a> by
                the software name.</p>
            <h2>Why has my review been deleted?</h2>
            <p>Reviews are voted on by other users. When a review reaches a certain (unspecified) amount of negative
                votes, it is deleted.</p>
            <h2>How can I gain more points?</h2>
            <ul class="list">
                <li><b>Contributing</b>. Simply contribute a piece of data (such as a new piece of software) or by
                    writing a review. Every time a user upvotes your contribution, you gain points.
                </li>
                <li><b>Voting</b>. If you vote on other users contributions you can gain points too. When a piece of
                    data is confirmed, all users who voted the same way as the majority are rewarded with more points.
                </li>
            </ul>
            <h2>My voting power is 0. How can I increase it?</h2>
            <p>You must contribute data which other users then upvote. When you reach a certain level of positive
                points, your voting power will increase again.</p>
        </div>
    </div>
@endsection