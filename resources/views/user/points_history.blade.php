<table class="table table-responsive">
    <tr>
        <th>Points rewarded</th>
        <th>Rewarded by</th>
        <th>Rewarded on</th>
        <th>Rewarded for</th>
        <th>Time</th>
    </tr>
@foreach($votes as $vote)
    <tr>
        <td>{{ $vote->vote }}</td>
        <td><a href="{{ $vote->author->route }}">{{ $vote->author->name }}</a></td>
        <td>
            @if(isset($vote->votable) and $vote->votable)
                <a href="{{ $vote->votable->route }}">
                    {{ $vote->votable->fullName }}
                </a>
            @else
                <i>This has been deleted</i>
            @endif
        </td>
        <td>
            @if(isset($vote->votable))
                {{ $vote->votable->rewardedFor }}
            @endif
        </td>
        <td>{{ $vote->created_at->diffForHumans() }}</td>
    </tr>
@endforeach
</table>