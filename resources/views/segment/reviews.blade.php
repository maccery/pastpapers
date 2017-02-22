@if(count($reviews) == 0)
    <p>There are no reviews yet</p>
@else
    <table class="table">
        @foreach ($reviews as $review)
            <tr>
                <td>
                    @include('review.vote', ['review' => $review])
                </td>
                <td class="review">
                    <a href="{{ route('review', ['review' => $review]) }}"><h3>"{{ $review->title }}"</h3></a>
                    <h4>- written by <a href="{{ route('view_user', $review->author->id) }}">{{ $review->author->name }}</a>,
                        @if($review->author->isTopUser())
                            {{ $review->author->isTopUser() }}
                        @else
                            {{ $review->author->points }} points
                        @endif
                    <small>{{ $review->created_at->diffForHumans() }}</small></h4>
                    <?php $paragraphs = explode(PHP_EOL, $review->description); ?>
                    @foreach($paragraphs as $paragraph)
                        <p>{{{ $paragraph }}}</p>
                    @endforeach
                    <p>@include('segment.tags', ['tags' => $review->tags])</p>
                </td>
            </tr>
        @endforeach
    </table>
@endif