@foreach ($tags as $tag)
    <span class="label label-{{ $tag->badgeColor() }}">{{ $tag->name }}</span>
@endforeach