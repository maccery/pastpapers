@extends('layouts.no_header')
@section('header')
    <div class="content-row-black">
        <div class="container">
            <ul class="list list-inline">
                <li><a href="{{ route('about') }}">What is Meagle?</a></li>
                <li class="pull-right">
                    <a href="{{ route('register') }}">{{ (Auth::user()) ? '' : 'Register'}}</a>
                </li>
                <li class="pull-right">
                    <a href="{{ route('login') }}">{{ (Auth::user()) ? Auth::user()->name : 'Login'}}</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="content-row-black">
        <div class="container text-center">
            <img class="img-circle logo-large" src="{{ secure_asset_production('images/logo.png') }}">
            <p>Find past paper solutions for...</p>
            @include('segment.search_box')
            <p>or <a href="{{ route('browse') }}">browse past papers</a></p>
        </div>
    </div>
    <div class="content-row">
        <div class="container">
            <h2>Meagle is home to crowdsourced subject answers</h2>
            <p>
                We’re a self-moderating community of answers to past paper questions
            </p>
        </div>
    </div>
    <div class="content-row-grey">
        <div class="container">
            <h2>How it works</h2>
            <p>Write an answer on a past paper you've done recently. Or browse recent answers. Can't find something? Then add it.
            </p>
        </div>
    </div>
    <div class="content-row">
        <div class="container">
            <h2>Crowd-sourced</h2>
            <p>
                Everything on the platform is crowd-sourced: top users are rewarded with more voting power and bad users / contributions are removed.
            </p>
        </div>
    </div>

@endsection