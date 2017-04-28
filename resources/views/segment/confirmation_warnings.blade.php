@if(!$past_paper->confirmed_real)
<div class="alert alert-danger">
    <p>This subject has not been confirmed as real yet and therefore answers can't be added  yet. Past papers are crowd-sourced on Meagle. To find out
    more about the process of answer, read <a href="{{ route('process') }}">here</a>.
</div>
<p>Does this subject exist?</p>
@include('answer.past_paper_vote', ['voting_type' => 'past_paper', 'past_paper' => $past_paper])
@endif