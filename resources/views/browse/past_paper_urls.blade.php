<ul class="list list-unstyled list-inline">
    @if($past_paper->url)
        <li>
            <a target="_blank" href="{{ $past_paper->url }}"><button class="btn btn-primary">View past paper</button></a>
        </li>
    @endif
    @if($past_paper->solutions_url)
        <li>
            <a target="_blank" href="{{ $past_paper->solutions_url }}"><button class="btn btn-primary">View official solutions</button></a>
        </li>
    @endif
</ul>