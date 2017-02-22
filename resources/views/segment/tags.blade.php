@foreach ($tags as $tag)
    <div class="review-tag">
        <span class="label label-{{ $tag->badgeColor() }}">{{ $tag->name }}</span>
    </div>
@endforeach