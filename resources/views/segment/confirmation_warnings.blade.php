@if(!$past_paper->confirmed_real)
<div class="alert alert-danger">
    <p>This subject has not been confirmed as real yet and therefore answers can't be added  yet. Past papers are crowd-sourced on Meagle. To find out
    more about the process of answer, read <a href="{{ route('process') }}">here</a>.
</div>
<p>Does this subject exist?</p>
@include('answer.past_paper_vote', ['voting_type' => 'past_paper', 'past_paper' => $past_paper])
@elseif(!$past_paper->confirmed_release_date)
<div class="alert alert-warning">
        <p>This past paper has not got a confirmed release date yet. Therefore no answers can be left yet. Release dates are crowd-sourced on Meagle. To find out
            more about the process of answer, read <a href="{{ route('process') }}">here</a>.</p>
</div>
@include('browse.suggest_date', ['past_paper' => $past_paper])
@elseif(!$past_paper->isReleased())
<div class="alert alert-warning">
        <p>This past paper has not been released yet. Therefore no answers can be left yet.</p>
</div>
@endif