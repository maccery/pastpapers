@foreach ($reviews as $review)
    <ul class="list list-inline list-unstyled">
        <li>
            <h4>Version {{ $review->version->version }}</h4>
            <h3>"{{ $review->description }}"</h3>
            <h4>{{ $review->votes->sum('vote') }} votes</h4>
            <p>
                <small>By <a href="{{ route('view_user', $review->author->id) }}">{{ $review->author->name }}</a>
                </small>
            </p>
        </li>
    </ul>
@endforeach