@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-8">
            <h1>{{ $software->name }}</h1>
            <ul class="list list-inline list-unstyled">
                @foreach ($versions as $version)
                    <li>
                        <a class="{{ (isset($version_id) and $version->id == $version_id) ? 'voted' : 'not-voted' }}"
                           href="{{ route('browse_by_version', [$software->id, $version->id]) }}">Version {{ $version->version }}</a>
                    </li>
                @endforeach
                <li>
                    <a href="{{ route('unconfirmed_versions', ['software' => $software]) }}">Other</a>
                </li>
                <li>
                    <a href="{{ route('create_version', ['software' => $software]) }}"><span
                                class="glyphicon glyphicon-plus"></span></a>
                </li>
            </ul>
            @if(isset($current_version) and !$current_version->canLeaveReview())
                @include('segment.version_info', ['version' => $current_version])
                @include('segment.confirmation_warnings', ['version' => $current_version])
            @endif
            @if(isset($current_version) and $current_version->canLeaveReview())
                <div class="container">
                    <div class="row">
                        <b>Top tags</b>
                        <div>
                            @include('segment.tags', ['tags' => $current_version->topTags()])
                        </div>
                    </div>
                </div>
                @include('segment.reviews', ['reviews' => $reviews->slice(0, 4)])
                @include('segment.other_reviews', ['reviews' => $reviews->slice(4)])
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-8">
            @if(isset($current_version))
                @include('review.create', ['current_version' => $current_version])
            @endif
        </div>
    </div>
@endsection