@foreach ($tags as $tag)
    <div class="answer-tag">
        <span class="label label-{{ $tag->badgeColor() }}">{{ $tag->name }}</span>
    </div>
@endforeach