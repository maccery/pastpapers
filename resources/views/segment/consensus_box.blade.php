<div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $votable->percentageComplete }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $votable->percentageComplete }}%;">
        {{ $votable->percentageComplete }}%
    </div>
</div>