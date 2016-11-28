@extends('layouts.app')
@section('content')
    <h1>Browse</h1>
    <ul class="list list-unstyled">
        @foreach ($softwares as $software)
            <li><a href="{{ route('browse_name', $software->id) }}">{{ $software->name }}</a></li>
        @endforeach
    </ul>
@endsection


