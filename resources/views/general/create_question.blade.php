<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
@if (Auth::User())
    <h3>{{ Auth::User()->name }}, add an unanswered question</h3>
    <form method="POST" action="{{ route('post_question') }}">
        <div class="form-group">
            <label for="title">Title of the question</label>
            <input class="form-control" id="question" name="question" class="input-group input-lg" placeholder="Question here?" value="{{ old('question') }}">
        </div>
        <div class="form-group">
            <label for="description">Answer</label>
            <textarea class="form-control" rows="8" id="answer" name="answer" class="input-group input-lg" placeholder="Answer to question here">{{ old('answer') }}</textarea>
        </div>
        <p><small>Submit as <b>{{ Auth::user()->name }}</b></small></p>
        <button class="btn btn-default">Answer</button>
        {{ csrf_field() }}
    </form>
    <div class="padding">
        @include('errors.generic')
    </div>
@else
    <h3>Know the answer to an unanswered question?</h3>
    <p>This page is crowd-sourced. You can contribute to it by <a href="{{ route('register') }}">registering</a>.</p>
@endif
<script>
    var simplemde = new SimpleMDE({ element: document.getElementById("answer") });
</script>