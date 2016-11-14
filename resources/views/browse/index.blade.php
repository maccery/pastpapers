@extends('layout.layout')
@section('content')
<h1>Software</h1>
<ul class="list list-unstyled">
@foreach ($softwares as $software)
    <li><a href="{{ route('browse_name', $software->name) }}">{{ $software->name }}</a></li>
@endforeach
</ul>
@endsection