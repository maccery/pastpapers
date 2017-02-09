<table class="table">
@foreach ($reviews as $review)
    <tr>
        <td>
            @include('review.vote', ['review' => $review])
        </td>
        <td>
            <a href="{{ route('review', ['review' => $review]) }}"><h3>"{{ $review->title }}"</h3></a>
            <p>{{ $review->description }}</p>
            <p>@include('segment.tags', ['tags' => $review->tags])</p>
            <div class="pull-right">
                <ul class="list list-unstyled list-inline small">
                    <li><a href="{{ route('view_user', $review->author->id) }}">{{ $review->author->name }}</a></li>
                    <li>
                        @if($review->author->isTopUser())
                            <span class="badge">Expert reviewer</span>
                        @endif
                    </li>
                    <li>{{ $review->author->points }} points</li>
                    <li>{{ $review->created_at->diffForHumans() }}</li>
                </ul>
            </div>
        </td>
    </tr>
@endforeach
</table>