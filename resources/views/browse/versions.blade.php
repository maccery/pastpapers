@extends('layouts.app')
@section('title', $software->name . ' | ')
@section('description', 'Get impartial reviews and advice about ' . $software->name . '. Should you upgrade? Read what the experts are saying.')
@section('content')
    <div class="content-row">
        <div class="container">
            <h1>Browse</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('browse') }}">Browse</a></li>
                <li class="active">{{ $software->name }}</li>
            </ul>
            @if(!$software->confirmed_real)
                <div class="alert alert-danger">
                    <p>This software has not been confirmed as real yet. Software versions are crowd-sourced on Meagle. To find out
                        more about the process of review, read <a href="{{ route('process') }}">here</a>.
                </div>
                <p>Does this version exist?</p>
                @include('review.version_vote', ['voting_type' => 'software', 'version' => $software])
            @else
            <p>Don't see the version you want? <a href="{{ route('create_version', ['software' => $software]) }}">Add it</a></p>
            <table class="table">
                <th>Name</th>
                <th>Release date</th>
                <th>Confirmed</th>
                @foreach ($versions as $version)
                    <tr>
                        <td><a href="{{ route('browse_by_version', ['software' => $version->software->id, 'version' => $version->id]) }}">{{ $version->software->name }} {{ $version->version }}</a></td>
                        <td>{{ $version->release_date or '' }}</td>
                        <td>{{ ($version->confirmed_real) ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div>
@endsection
