@extends('layouts.app')
@section('content')
    <div class="content-row">
        <div class="container">
            <h3>Add a piece of software</h3>
            <form method="POST" action="{{ route('post_create_software') }}">
                <div class="form-group">
                    <input class="form-control" name="name" class="input-group input-lg" placeholder="Enter software name here">
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