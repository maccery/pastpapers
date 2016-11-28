@extends('layouts.app')
@section('content')
<div class="col-sm-8">
    <h1>{{ $software->name }}</h1>
    <ul class="list list-inline list-unstyled">
        @foreach ($versions as $version)
            <li>
                <a class="{{ (isset($version_id) and $version->id == $version_id) ? 'voted' : 'not-voted' }}" href="{{ route('browse_by_version', [$software->id, $version->id]) }}">Version {{ $version->version }}</a>
            </li>
        @endforeach
    </ul>
    @include('segment.reviews', ['reviews' => $reviews->slice(0, 4)])

    <h2>Other reviews</h2>
    @include('segment.other_reviews', ['reviews' => $reviews->slice(4)])
</div>
<div class="col-sm-4">
    @if(isset($version_id))
        @include('review.create', ['version_id' => $version_id])
    @endif
</div>
@endsection