<table class="table">
@foreach($votes as $vote)
    <tr>
        <td>{{ $vote->vote }}</td>
        <td>{{ $vote->author->name }} voted this</td>
        <td>{{ $vote->created_at->diffForHumans() }}</td>
    </tr>
@endforeach
</table>