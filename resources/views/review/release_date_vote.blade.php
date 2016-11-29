<ul class="list list-unstyled list-inline">
    @if (Auth::User())
    <li><a class="{{ (isset($suggested_date->votedFor->vote) and $suggested_date->votedFor->suggested_release_date_id == $suggested_date->id) ? 'voted' : 'not-voted' }}"
           href="{{ route('vote_suggested_date', ['suggested_date' => $suggested_date->id, 'vote' => 1]) }}">Yes</a></li>
    @endif
</ul>