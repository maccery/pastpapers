@foreach ($reviews as $review)
    <ul class="list list-inline list-unstyled">
        <li>
            <h4>Version {{ $review->version->version }}</h4>
            <h3>"{{ $review->description }}"</h3>
            <p>
                <small>By <a href="{{ route('view_user', $review->author->id) }}">{{ $review->author->name }}</a><br>
                    <b>Verified techcrunch.com</b>. 10,000 reviews. 190 Mekarma
                </small>
            </p>
        </li>
    </ul>
@endforeach