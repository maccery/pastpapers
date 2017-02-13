@extends('layouts.app')
@section('content')
    <div class="content-row">
        <div class="container">
            <div class="col-sm-8">
                <h1>{{ $software->name }}</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ route('browse') }}">Browse</a></li>
                    <li><a href="{{ route('browse_name', ['software' => $software]) }}">{{ $software->name }}</a></li>
                    <li class="active">{{ $software->name }} {{ $current_version->version }}</li>
                </ul>
                @if(!$software->confirmed_real)
                    <div class="row">
                        <div class="container alert alert-danger">
                            <p>This software has not been confirmed as real yet. Software versions are crowd-sourced on
                                Meagle. To find out
                                more about the process of review, read <a href="">here</a>.
                        </div>
                    </div>
                    <p>Does this software exist?</p>
                    @include('review.version_vote', ['voting_type' => 'software', 'version' => $software])
                @endif
                @if(isset($current_version) and !$current_version->canLeaveReview())
                    @include('segment.version_info', ['version' => $current_version])
                    @include('segment.confirmation_warnings', ['version' => $current_version])
                @endif
                @if(isset($current_version) and $current_version->canLeaveReview())
                    @include('segment.reviews', ['reviews' => $reviews->slice(0, 4)])
                    @include('segment.other_reviews', ['reviews' => $reviews->slice(4)])
                @endif
            </div>

            <div class="col-sm-4">
                <div class="container">
                    <div class="row">
                        <b>Top tags</b>
                        <div>
                            @include('segment.tags', ['tags' => $current_version->topTags()])
                        </div>
                    </div>
                </div>

                <h3>Tom, have your say</h3>
                <p><small>Used this software? People want to know</small></p>
            </div>
        </div>
    </div>
@endsection