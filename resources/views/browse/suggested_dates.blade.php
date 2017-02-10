<table class="table">
    @foreach ($suggested_dates as $suggested_date)
    <tr>
        <td>
            @include('review.release_date_vote', ['suggested_date' => $suggested_date])
        </td>
        <td>
            <a href="">{{ $suggested_date->release_date }}</a>
        </td>
        <td>
            @include('segment.consensus_box', ['votable' => $suggested_date])
        </td>
    </tr>
    @endforeach
</table>