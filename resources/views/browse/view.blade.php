@extends('layout.layout')
@section('content')
    <h1><a href="{{ route('browse') }}">Browse</a>: {{ $software->name }}</h1>
    <div class="col-sm-2">
        <ul class="list list-inline list-unstyled">
            @foreach ($versions as $version)
                <li>
                    <a href="{{ route('browse_by_version', [$software->name, $version->version]) }}">Version {{ $version->version }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-sm-10">
        <ul class="list list-inline list-unstyled">
            @foreach ($reviews as $review)
                <li>
                    <h4>Version {{ $review->version->version }}</h4>
                    <h3>"{{ $review->description }}"</h3>
                    <p>
                        <small>By {{ $review->author->name }}<br>
                            <b>Verified techcrunch.com</b>. 10,000 reviews. 190 Mekarma
                        </small>
                    </p>
                </li>
            @endforeach
        </ul>
        @if(isset($version_id)):
        @include('review.create', ['version_id' => $version_id])
        @endif
    </div>
@endsection