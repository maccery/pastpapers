@extends('layouts.app')
@section('content')
    <div class="content-row">
        <div class="container">
            <div class="col-sm-9">
                <h1>{{ $software->name }} {{ $current_version->version }} reviews</h1>
                <ul class="breadcrumb">
                    <li><a href="{{ route('browse') }}">Browse</a></li>
                    <li><a href="{{ route('browse_name', ['software' => $software]) }}">{{ $software->name }}</a></li>
                    <li class="active">{{ $software->name }} {{ $current_version->version }}</li>
                </ul>
                @include('segment.confirmation_warnings', ['version' => $current_version])
                @if(isset($current_version) and $current_version->canLeaveReview())
                    <h4><b>Verdict</b>: {{ $current_version->verdict }}</h4>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" style="width: {{ $current_version->positive }}%">
                            <span class="sr-only">{{ $current_version->positive }}% positive</span>
                        </div>
                        <div class="progress-bar progress-bar-danger" style="width: {{ $current_version->negative }}%">
                            <span class="sr-only">{{ $current_version->negative }}% negative</span>
                        </div>
                    </div>
                    @include('segment.reviews', ['reviews' => $reviews->slice(0, 4)])
                    @include('segment.other_reviews', ['reviews' => $reviews->slice(4)])
                @endif
            </div>

            <div class="col-sm-3">
                @if(!$software->confirmed_real)
                    <p>Does this exist?</p>
                    @include('review.version_vote', ['voting_type' => 'software', 'version' => $software])
                @endif
                @if(isset($current_version) and !$current_version->canLeaveReview())
                    @include('segment.version_info', ['version' => $current_version])
                @else
                    @include('segment.tags', ['tags' => $current_version->topTags()])
                @endif
            </div>
        </div>
    </div>
    @if(isset($current_version) and $current_version->canLeaveReview())
        <div class="content-row-grey">
            <div class="container">
                @include('review.create', ['current_version' => $current_version])
            </div>
        </div>
    @endif
@endsection