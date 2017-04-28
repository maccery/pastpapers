<div class="text-center">
    <ul class="list list-unstyled">

        <li>@if (Auth::User())
                <a class="{{ (isset($answer->votedFor->vote) and $answer->votedFor->vote >= 1) ? 'voted' : 'not-voted' }}"
                   href="{{ route('vote_answer', ['type' => 'answer', 'votable_id' => $answer->id, 'vote' => 1]) }}">
                    @endif
                    <span data-toggle="tooltip" title="{{ ((Auth::User()) ? 'Upvote this' : 'You must be logged in to vote') }}" class="glyphicon glyphicon-triangle-top"></span>
                    @if (Auth::User())
                </a>
            @endif
        </li>
        <li><h4>{{ $answer->votes->sum('vote') }}</h4></li>
        <li>
            @if (Auth::User())
                <a
                        class="{{ (isset($answer->votedFor->vote) and $answer->votedFor->vote <= -1) ? 'voted' : 'not-voted' }}"
                        href="{{ route('vote_answer', ['type' => 'answer', 'votable_id' => $answer->id, 'vote' => -1]) }}">
                    @endif
                    <span data-toggle="tooltip" title="{{ ((Auth::User()) ? 'Downvote this' : 'You must be logged in to vote') }}" class="glyphicon glyphicon-triangle-bottom"></span>
                    @if (Auth::User())
                </a>
            @endif</li>

    </ul>
</div>