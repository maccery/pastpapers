@extends('layouts.app')
@section('content')
<div class="col-sm-8">
    <h1>{{ $version->software->name }}</h1>
    <h2>{{ $version->version }}</h2>
    @if($version->confirmed_release_date)
        <p>Voting is closed on this version. We've got a confirmed release date.</p>
    @else
        <p>We're not sure which release date is right yet. Help us by voting below.</p>
        @include('browse.suggested_dates', ['suggested_dates' => $version->suggestedDates->all()])
    @endif
@endsection