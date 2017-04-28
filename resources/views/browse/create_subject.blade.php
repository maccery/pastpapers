@extends('layouts.app')
@section('content')
    <div class="content-row">
        <div class="container">
            <h1>Add a subject</h1>
            <p><small>e.g EXC</small></p>
            <ul class="breadcrumb">
                <li><a href="{{ route('browse') }}">Browse</a></li>
                <li class="active">Create subject</li>
            </ul>
            <div class="alert alert-warning">
                <p>If you add a subject to the platform users will be able to answer past papers for it. This is known as crowd-sourcing. You can read about how this works <a href="{{ route('process') }}">here</a>.</p>
            </div>
            <form method="POST" action="{{ route('post_create_subject') }}">
                <div class="form-group">
                    <input class="form-control" name="name" class="input-group input-lg" placeholder="Enter subject here (e.g EXC)">
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