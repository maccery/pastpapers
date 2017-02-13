@extends('layouts.no_header')
@section('content')
    <div class="content-row-black">
        <div class="container text-center">
            <img class="img-circle logo-large" src="{{ asset('images/logo.png') }}">

            @include('segment.search_box')
            <p>or <a href="{{ route('browse') }}">browse</a></p>
        </div>
    </div>
    <div class="content-row">
        <div class="container">
            <h2>Meagle is home to completely impartial software reviews</h2>
            <p>
                We’re a self-moderating community of reviews from the people who know the most.
            </p>
        </div>
    </div>

    <div class="content-row-grey">
        <div class="container">
            <h2>We mean impartial</h2>
            <p>We’re free and open-source. You can’t buy an advert on our website.
                Our reviews are totally free from sponsorship and advertising.
            </p>
        </div>
    </div>


    <div class="content-row">
        <div class="container">
            <h2>Meagle is home to completely impartial software reviews</h2>
            <p>
                We’re a self-moderating community of reviews from the people who know the most.
            </p>
        </div>
    </div>
@endsection