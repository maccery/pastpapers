@if(!$version->confirmed_real)
<div class="alert alert-danger">
    <p>This software has not been confirmed as real yet. Software versions are crowd-sourced on Meagle. To find out
    more about the process of review, read <a href="{{ route('process') }}">here</a>.
</div>
<p>Does this version exist?</p>
@include('review.version_vote', ['voting_type' => 'version', 'version' => $version])
@elseif(!$version->confirmed_release_date)
<div class="alert alert-warning">
        <p>This software has not got a confirmed release date yet. Therefore no reviews can be left yet.</p>
</div>
@include('browse.suggest_date', ['version' => $version])
@elseif(!$version->isReleased())
<div class="alert alert-warning">
        <p>This software has not been released yet. Therefore no reviews can be left yet.</p>
</div>
@endif