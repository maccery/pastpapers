@if($past_paper->confirmed_release_date)
    <p>Voting is closed on this past paper. We've got a confirmed release date.</p>
@else
    <p>We're not sure which release date is right yet. Help us by voting below.</p>
    @include('browse.suggested_dates', ['suggested_dates' => $past_paper->suggestedDates->all()])
    @include('browse.create_suggest', ['past_paper' => $past_paper])
@endif