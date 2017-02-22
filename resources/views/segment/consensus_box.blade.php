<div class="progress">
    <div data-toggle="tooltip" title="This bar shows how close we are to reaching a concensus before confirming this data" class="progress-bar" role="progressbar" aria-valuenow="{{ $votable->percentageComplete }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $votable->percentageComplete }}%;">
        {{ $votable->percentageComplete }}%
    </div>
</div>