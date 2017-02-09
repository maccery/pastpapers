<div class="text-center">
    <ul class="list list-unstyled">
        @if (Auth::User())
        <li><a class="{{ (isset($review->votedFor->vote) and $review->votedFor->vote == 1) ? 'voted' : 'not-voted' }}"
               href="{{ route('vote_review', ['votable_id' => $review->id, 'vote' => 1]) }}">
                <span class="glyphicon glyphicon-triangle-top"></span></a></li>
        @endif
        <li><h4>{{ $review->votes->sum('vote') }}</h4></li>
        @if (Auth::User())
        <li>
            <a class="{{ (isset($review->votedFor->vote) and $review->votedFor->vote == -1) ? 'voted' : 'not-voted' }}"
               href="{{ route('vote_review', ['votable_id' => $review->id, 'vote' => -1]) }}">
                <span class="glyphicon glyphicon-triangle-bottom"></span></a></li>
        @endif
    </ul>
</div>