@extends('layout.layout')
@section('content')
    <h1><a href="{{ route('browse') }}">Browse</a>: {{ $software->name }}</h1>
    <div class="col-sm-2">
        <ul class="list list-inline list-unstyled">
            @foreach ($versions as $version)
                <li>
                    <a href="{{ route('browse_by_version', [$software->id, $version->id]) }}">Version {{ $version->version }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-sm-10">
        @include('segment.reviews', ['reviews' => $reviews])
        @if(isset($version_id)):
        @include('review.create', ['version_id' => $version_id])
        @endif
    </div>
@endsection