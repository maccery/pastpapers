@extends('layout.layout')
@section('content')
    <div class="container">
        <h1>welcome to <b>meagle.org</b></h1>
        <h2>impartial software advice</h2>
        <h3><a href="{{ route('browse') }}">browse >></a></h3>
        <input type="text" class="input input-lg" placeholder="iOS 10">
    </div>
@endsection


