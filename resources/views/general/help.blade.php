@extends('layouts.app')
@section('title', 'Help | ')
@section('description', 'Get help or advice on how to use Meagle.')
@section('content')
    <div class="content-row">
        <div class="container">
            <h1>Help</h1>
            @foreach($questions as $question)
                <h2>{{ $question->question }}</h2>
                <?php $paragraphs = explode(PHP_EOL, $question->answer); ?>
                @foreach($paragraphs as $paragraph)
                    <p>{% $paragraph %}</p>
                @endforeach
                @if(!$question->confirmed_real)
                    <p><small>Is this a good question?</small></p>
                @endif
                @include('review.version_vote', ['voting_type' => 'question', 'version' => $question])
            @endforeach
        </div>
    </div>
    <div class="content-row-grey">
        <div class="container">
            @include('general.create_question')
        </div>
    </div>
@endsection