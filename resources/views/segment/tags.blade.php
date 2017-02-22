@foreach ($tags as $tag)
    <span class="review-tag label label-{{ $tag->badgeColor() }}">{{ $tag->name }}</span>
@endforeach