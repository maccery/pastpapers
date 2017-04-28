<div class="text-center">
    <ul class="list list-unstyled">
        @if (Auth::User())
        <li><a class="{{ (isset($answer->votedFor->vote) and $answer->votedFor->vote == 1) ? 'voted' : 'not-voted' }}"
               href="{{ route('vote_answer', ['type' => 'answer', 'votable_id' => $answer->id, 'vote' => 1]) }}">
                <span class="glyphicon glyphicon-triangle-top"></span></a></li>
        @endif
        @if (Auth::User())
        <li>
            <a class="{{ (isset($answer->votedFor->vote) and $answer->votedFor->vote == -1) ? 'voted' : 'not-voted' }}"
               href="{{ route('vote_answer', ['type' => 'answer', 'votable_id' => $answer->id, 'vote' => -1]) }}">
                <span class="glyphicon glyphicon-triangle-bottom"></span></a></li>
        @endif
    </ul>
</div>