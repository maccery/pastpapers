@extends('layouts.app')
@section('content')
<div class="content-row">
    <div class="container">
    <h1>{{ $version->software->name }} {{ $version->version }}</h1>
    <ul class="breadcrumb">
        <li><a href="{{ route('browse') }}">Browse</a></li>
        <li><a href="{{ route('browse_name', ['software' => $version->software]) }}">{{ $version->software->name }}</a></li>
        <li><a href="{{ route('browse_by_version', ['software' => $version->software, 'version' => $version]) }}">{{ $version->software->name }} {{ $version->version }}</a></li>
        <li class="active">Suggest release date</li>
    </ul>
    @if($version->confirmed_release_date)
        <p>Voting is closed on this version. We've got a confirmed release date.</p>
    @else
        <p>We're not sure which release date is right yet. Help us by voting below.</p>
        @include('browse.suggested_dates', ['suggested_dates' => $version->suggestedDates->all()])
    @endif
@include('browse.create_suggest', ['version' => $version])
    </div>
</div>
@endsection