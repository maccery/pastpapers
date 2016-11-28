<h4>{{ $review->votes->sum('vote') }} votes
@if (Auth::User())
    <a class="{{ (isset($review->votedFor->vote) and $review->votedFor->vote == -1) ? 'votedFor' : '' }}" href="{{ route('vote_review', ['review_id' => $review->id, 'vote' => -1]) }}">Downvote</a>
    <a class="{{ (isset($review->votedFor->vote) and $review->votedFor->vote == 1) ? 'votedFor' : '' }}" href="{{ route('vote_review', ['review_id' => $review->id, 'vote' => 1]) }}">Upvote</a>
@endif
</h4>