@extends('layouts.app')
@section('content')
    <div class="content-row">
        <div class="container">
            <div class="col-sm-8">
                <h1>{{ $software->name }} {{ $current_version->version }}</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ route('browse') }}">Browse</a></li>
                    <li><a href="{{ route('browse_name', ['software' => $software]) }}">{{ $software->name }}</a></li>
                    <li class="active">{{ $software->name }} {{ $current_version->version }}</li>
                </ul>
                @include('segment.confirmation_warnings', ['version' => $current_version])
                @if(isset($current_version) and $current_version->canLeaveReview())
                    @include('segment.reviews', ['reviews' => $reviews->slice(0, 4)])
                    @include('segment.other_reviews', ['reviews' => $reviews->slice(4)])
                    @include('review.create', ['current_version' => $current_version])
                @endif
            </div>

            <div class="col-sm-4">
                @if(!$software->confirmed_real)
                    <p>Does this exist?</p>
                    @include('review.version_vote', ['voting_type' => 'software', 'version' => $software])
                @endif
                @if(isset($current_version) and !$current_version->canLeaveReview())
                    @include('segment.version_info', ['version' => $current_version])
                @else
                    @include('segment.tags', ['tags' => $current_version->topTags()])
                    <h3>Have your say</h3>
                    <p><small>Used this software? People want to know</small></p>
                @endif
            </div>
        </div>
    </div>
@endsection