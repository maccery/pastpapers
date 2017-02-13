@extends('layouts.app')
@section('content')
    <div class="content-row">
        <div class="container">
            <h1>Browse</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('browse') }}">Browse</a></li>
                <li class="active">{{ $software->name }}</li>
            </ul>
            <p>Don't see the version you want? <a href="{{ route('create_version', ['software' => $software]) }}">Add it</a></p>
            <table class="table">
                <th>Name</th>
                <th>Release date</th>
                <th>Confirmed</th>
                @foreach ($versions as $version)
                    <tr>
                        <td><a href="{{ route('browse_by_version', ['software' => $version->software->id, 'version' => $version->id]) }}">{{ $version->software->name }} {{ $version->version }}</a></td>
                        <td>{{ $version->release_date or '' }}</td>
                        <td>{{ ($version->confirmed_real) ? '' : 'Pending review' }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
