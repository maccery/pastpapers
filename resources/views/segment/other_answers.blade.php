<table class="table">
@foreach ($answers as $answer)
    <tr>
        <td>
            @include('answer.small_vote', ['answer' => $answer])
        </td>
        <td>
            <ul class="list list-unstyled list-inline small">
                <li>"{{ $answer->title }}"</li>
                <li><small><a href="{{ route('view_user', $answer->author->id) }}">{{ $answer->author->name }}</a></small></li>
                <li><small>{{ $answer->author->points }} points</small></li>
                <li><small>{{ $answer->created_at->diffForHumans() }}</small></li>
            </ul>
        </td>
    </tr>
@endforeach
</table>