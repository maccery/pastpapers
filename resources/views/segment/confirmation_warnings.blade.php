@if(!$past_paper->confirmed_real)
<div class="alert alert-danger">
    <p>Does this subject exist?</p>
    @include('answer.past_paper_vote', ['voting_type' => 'past_paper', 'past_paper' => $past_paper])
</div>
@endif