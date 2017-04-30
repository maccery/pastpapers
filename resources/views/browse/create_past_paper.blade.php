@extends('layouts.app')
@section('content')
<div class="content-row">
    <div class="container">
        <h1>Add a new past paper for {{ $subject->name }}</h1>
        <ul class="breadcrumb">
            <li><a href="{{ route('browse') }}">Browse</a></li>
            <li><a href="{{ route('browse_name', ['subject' => $subject]) }}">{{ $subject->name }}</a></li>
            <li class="active">Add past paper</li>
        </ul>
        <form method="POST" action="{{ route('post_create_past_paper') }}">
            <div class="form-group">
                <input type="hidden" name="subject_id" value="{{ $subject->id }}">
                <label for="past_paper_name">Paper name</label> e.g May 2016
                <input class="form-control" rows="5" name="past_paper_name" class="input-group input-lg" placeholder="Paper name">
            </div>
            <div class="form-group">
                <label for="title">URL of paper</label> From the university past paper website
                <input class="form-control"  name="url" class="input-group input-lg" placeholder="URL of past paper">
            </div>
            @if (Auth::guest())
                <p><small><a href="{{ url('/register') }}">Register</a> to submit</small></p>
            @else
                <p><small>Submit as <b>{{ Auth::user()->name }}</b></small></p>
                <button class="btn btn-default">Create</button>
            @endif
            {{ csrf_field() }}
        </form>
        @include('errors.generic')
    </div>
</div>
@endsection