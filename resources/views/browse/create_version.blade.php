@extends('layouts.app')
@section('content')
<div class="content-row">
    <div class="container">
        <h1>Add a new version of {{ $software->name }}</h1>
        <ul class="breadcrumb">
            <li><a href="{{ route('browse') }}">Browse</a></li>
            <li><a href="{{ route('browse_name', ['software' => $software]) }}">{{ $software->name }}</a></li>
            <li class="active">Add version</li>
        </ul>
        <form method="POST" action="{{ route('post_create_version') }}">
            <div class="form-group">
                <input type="hidden" name="software_id" value="{{ $software->id }}">
                <input class="form-control" rows="5" name="version_name" class="input-group input-lg" placeholder="Enter version name here">
            </div>
            @if (Auth::guest())
                <p><small><a href="{{ url('/register') }}">Register</a> to submit</small></p>
            @else
                <p><small>Submit as <b>{{ Auth::user()->name }}</b></small></p>
                <button class="btn btn-default">Create</button>
            @endif
            {{ csrf_field() }}
        </form>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @include('errors.generic')
    </div>
</div>
@endsection