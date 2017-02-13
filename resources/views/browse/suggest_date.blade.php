@if($version->confirmed_release_date)
    <p>Voting is closed on this version. We've got a confirmed release date.</p>
@else
    <p>We're not sure which release date is right yet. Help us by voting below.</p>
    @include('browse.suggested_dates', ['suggested_dates' => $version->suggestedDates->all()])
    @include('browse.create_suggest', ['version' => $version])
@endif