<ul class="list list-unstyled list-inline">
    @if (Auth::User())
    <li><a class="{{ (isset($version->votedFor->vote) and $version->votedFor->vote == 1) ? 'voted' : 'not-voted' }}"
           href="{{ route('vote_version', ['version_id' => $version->id, 'vote' => 1]) }}">Yes</a></li>
    @endif
    @if (Auth::User())
    <li>
        <a class="{{ (isset($version->votedFor->vote) and $version->votedFor->vote == -1) ? 'voted' : 'not-voted' }}"
           href="{{ route('vote_version', ['version_id' => $version->id, 'vote' => -1]) }}">No</a></li>
    @endif
</ul>