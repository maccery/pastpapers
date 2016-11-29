@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>welcome to <b>meagle.org</b></h1>
        <h3><a href="{{ route('browse') }}">browse >></a></h3>

        <h2>How it works</h2>
        <p><b>Stage 1</b> A piece of software is published</p>
        <p><b>Stage 2</b> This is crowd-sourced into our system</p>
        <p><b>Stage 3</b> The community can review it</p>
        <p><b>Stage 4</b> Reviews are curated by other users' votes</p>

        <h2>Why it works</h2>
        <p><b>Top contributors</b> (those with lots of points) have more power when voting. Every post they make also starts
        with a higher amount of points.</p>
        <p>Those with high-quality email addresses such as {!! '@techcrunch.com, @wired.com' !!} are considered top contributors.</p>
    </div>
@endsection