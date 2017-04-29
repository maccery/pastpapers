<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
@if($paper_question->canLeaveAnswer())
    @if (Auth::User())
        <h3>{{ Auth::User()->name }}, answer this question</h3>
        <form method="POST" action="{{ route('post_answer') }}">
            <div class="form-group">
                <input type="hidden" name="paper_question_id" value="{{ $paper_question->id }}">
                <label for="description">Answer body</label> <small>You can use Markdown. Hit the preview icon before submitting</small>
                <textarea class="form-control" rows="8" id="description" name="description" class="input-group input-lg" placeholder="Your answer here">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="title">Question tags</label> Separate with commas
                <input class="form-control" name="tags" class="input-group input-lg" placeholder="Tags" value="{{ old('negative') }}">
            </div>
            @if (Auth::guest())
                <p><small><a href="{{ url('/register') }}">Register</a> to submit</small></p>
            @else
                <p><small>Submit as <b>{{ Auth::user()->name }}</b></small></p>
                <button class="btn btn-default" onclick="simplemde.togglePreview(); return false;">Preview answer</button>
                <button class="btn btn-primary">Answer</button>
            @endif
            {{ csrf_field() }}
        </form>
        <div class="padding">
            @include('errors.generic')
        </div>
    @else
        <h3>Have you done this past paper?</h3>
        <p>PastPaper answers are provided by people like yourself: <a href="{{ route('register') }}">register</a> here to share your knowledge with the world.</p>
    @endif
@endif
<script>
    var simplemde = new SimpleMDE({
        element: document.getElementById("description"),
        toolbar: ["bold", "italic", "strikethrough",  "heading", "|", "code", "quote", "unordered-list", "ordered-list", "table", "link", "image", "preview"],
        promptURLs: true,
        spellChecker: false,
    });
</script>