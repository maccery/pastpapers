@if(count($reviews) == 0)
    <p>There are no reviews yet</p>
@else
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
                            <li><a href="{{ route('view_user', $review->author->id) }}">{{ $review->author->name }}</a>
                            </li>
                            <li>
                                @if($review->author->isTopUser())
                                    <span class="badge">Expert reviewer</span>
                                @endif
                            </li>
                            <li>{{ $review->author->points }} points</li>
                            <li>{{ $review->created_at->diffForHumans() }}</li>
                            <li>
                                <img src="https://scontent-lht6-1.xx.fbcdn.net/v/t1.0-1/p64x64/15079088_10211110968194279_5027328034314049508_n.jpg?oh=77a092f10d284ecc2dea9407cced4dae&oe=593EEA05"
                                     class="img-circle"></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endif