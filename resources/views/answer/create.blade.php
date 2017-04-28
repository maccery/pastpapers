<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
@if($current_past_paper->canLeaveAnswer())
    @if (Auth::User())
        <h3>{{ Auth::User()->name }}, have your say</h3>
        <form method="POST" action="{{ route('post_answer') }}">
            <div class="form-group">
                <label for="title">Summarise your answer</label>
                <input type="hidden" name="past_paper_id" value="{{ $current_past_paper->id }}">
                <input class="form-control" id="title" name="title" class="input-group input-lg" placeholder="Answer title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">Answer body</label>
                <textarea class="form-control" rows="8" id="description" name="description" class="input-group input-lg" placeholder="Your answer here">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="title">What didn't you like?</label> Separate with commas
                <input class="form-control" name="negative" class="input-group input-lg" placeholder="Negative tags" value="{{ old('negative') }}">
            </div>
            <div class="form-group">
                <label for="title">What did you like?</label> Separate with commas
                <input class="form-control" name="positive" class="input-group input-lg" placeholder="Positive tags" {{ old('positive') }}">
            </div>
            @if (Auth::guest())
                <p><small><a href="{{ url('/register') }}">Register</a> to submit</small></p>
            @else
                <p><small>Submit as <b>{{ Auth::user()->name }}</b></small></p>
                <button class="btn btn-default">Answer</button>
            @endif
            {{ csrf_field() }}
        </form>
        <div class="padding">
            @include('errors.generic')
        </div>
    @else
        <h3>Have you done this past paper?</h3>
        <p>Meagle answers are provided by people like yourself: <a href="{{ route('register') }}">register</a> here to share your knowledge with the world.</p>
    @endif
@endif
<script>
    var simplemde = new SimpleMDE({ element: document.getElementById("description") });
</script>