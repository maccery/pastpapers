@if(!$version->confirmed_real)
<div class="row">
    <div class="container alert alert-danger">
        <p>This software has not been confirmed as real yet. Software versions are crowd-sourced on Meagle. To find out
        more about the process of review, read <a href="">here</a>.
    </div>
</div>
@endif
@if(!$version->confirmed_release_date)
<div class="row">
    <div class="container alert alert-warning">
        <p>This software has not got a confirmed release date yet. Therefore no reviews can be left yet.</p>
    </div>
</div>
@endif
@if(!$version->isReleased())
<div class="row">
    <div class="container alert alert-warning">
        <p>This software has not been released yet. Therefore no reviews can be left yet.</p>
    </div>
</div>
@endif