<form method="POST" action="{{ route('search') }}">
    <div class="form-group">
        <input class="form-control" name="query" class="input-group input-lg" placeholder="What do you want to find?">
    </div>
    {{ csrf_field() }}
</form>