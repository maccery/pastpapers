@if(!$past_paper->confirmed_real)
@if (Auth::User())
<ul class="list list-unstyled list-inline">
    <li><a class="{{ (isset($past_paper->votedFor->vote) and $past_paper->votedFor->vote >= 1) ? 'voted' : 'not-voted' }}"
           href="{{ route('vote_answer', ['type' => $voting_type, 'votable_id' => $past_paper->id, 'vote' => 1]) }}">Yes</a></li>
    <li>
        <a class="{{ (isset($past_paper->votedFor->vote) and $past_paper->votedFor->vote <= -1) ? 'voted' : 'not-voted' }}"
           href="{{ route('vote_answer', ['type' => $voting_type, 'votable_id' => $past_paper->id, 'vote' => -1]) }}">No</a></li>
</ul>
@else
<p><small><a href="{{ url('/register') }}">Register</a> to vote</small></p>
@endif
@include('segment.consensus_box', ['votable' => $past_paper])
@endif