@extends('layouts.no_header')
@section('content')
    <div class="content-row-black">
        <div class="container text-center">
            <img class="img-circle logo-large" src="{{ secure_asset_production('images/logo.png') }}">
            <p>Find software reviews about...</p>
            @include('segment.search_box')
            <p>or <a href="{{ route('browse') }}">browse software</a></p>
        </div>
    </div>
    <div class="content-row">
        <div class="container">
            <h2>Meagle is home to completely impartial software reviews</h2>
            <p>
                We’re a self-moderating community of reviews about pieces of software.
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
            <h2>How it works</h2>
            <p>Write a review on a piece of software you've used recently. Or browse recent reviews. Can't find something? Then add it.
            </p>
        </div>
    </div>
    <div class="content-row-grey">
        <div class="container">
            <h2>Crowd-sourced</h2>
            <p>
                Everything on the platform is crowd-sourced: top users are rewarded with more voting power and bad users / contributions are removed.
            </p>
        </div>
    </div>

@endsection